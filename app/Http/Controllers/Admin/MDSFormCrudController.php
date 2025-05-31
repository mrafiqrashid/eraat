<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\CheckProjectSession;
use App\Http\Requests\MDSFormRequest;
use App\Models\MDSForm;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;

/**
 * Class MDSFormCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MDSFormCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\MDSForm::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/mdsForm');
        CRUD::setEntityNameStrings('MDS form', 'MDS forms');
    }
    public function __construct()
    {
        parent::__construct();
        $this->middleware(CheckProjectSession::class);
    }
    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::button('back')->stack('top')->view('crud::buttons.goToProject')->position('end');
        view()->share([
            'print_BTN' => [
                'list1' => [
                    'dataValue' => 'mdsForm_pdf_001',
                    'dataValue2' => 'PDF',
                    'display' => 'Self Assessment Musculoskeletal Pain / Discomfort Survey Form (PDF)',
                ],
                'list2' => [
                    'dataValue' => 'mdsForm_excel_001',
                    'dataValue2' => 'Excel',
                    'display' => 'Self Assessment Musculoskeletal Pain / Discomfort Survey Form (Excel)',
                ],
            ],
            'route' => 'mdsForm_export',
        ]);
        CRUD::removeButton('update');
        CRUD::button('check')->stack('line')->view('crud::buttons.check')->position('beginning');
        CRUD::button('print')->stack('line')->view('crud::buttons.print')->position('beginning');
        CRUD::orderButtons('line', ['check', 'print', 'show', 'delete']);


        CRUD::column([
            'name' => 'project.name',
            'label' => 'Project',
            'type' => 'text'
        ]);
        CRUD::column([
            'name' => 'employee.name',
            'label' => 'Employee',
            'type' => 'text'
        ]);
        CRUD::column([
            'name' => 'task.name',
            'label' => 'Task',
            'type' => 'text'
        ]);
        CRUD::column([
            'name' => 'created_at',
            'label' => 'Created At',
            'type' =>  'text'
        ]);

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        if (session('filtered_project_id') == null) {
            return redirect()->route('project.index');
        }
        CRUD::setValidation(MDSFormRequest::class);
        CRUD::addField([
            'name' => 'project_id',
            'type' => 'hidden',
            'value' => session('filtered_project_id'),
            'label' => 'Project test',
        ]);
        CRUD::addField([
            'name' => 'project_name',
            'type' => 'text',
            'default' => Project::find(session('filtered_project_id'))->name,
            'wrapper' => [
                'class' => 'form-group col-md-12 mb-5',
                'readonly' => 'readonly'
            ],
            'attributes' => [
                'disabled' => 'disabled'
            ],
        ]);

        CRUD::field([
            'name' => 'employee_id',
            'type' => 'select_from_array',
            'options' => Employee::where('project_id', session('filtered_project_id'))
                ->pluck('name', 'id')
                ->toArray(),
        ]);

        CRUD::field([
            'name' => 'task_id',
            'type' => 'select_from_array',
            'options' => Task::where('project_id', session('filtered_project_id'))
                ->pluck('name', 'id')
                ->toArray(),
        ]);


        CRUD::addField([
            'name'  => 'mdsForm_title',
            'type'  => 'custom_html',
            'value' => '<h1 class="fw-bolder">APPENDIX 1: SELF ASSESSMENT MUSCULOSKELETAL PAIN / DISCOMFORT SURVEY FORM</h1>',
            'wrapper' => [
                'class' => 'form-group col-md-12'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'mdsForm_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'mdsForm_rw',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/mdsForm/bodyPart.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'mdsForm_spacer_2',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'mdsForm_header_1_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name' => 'mdsForm_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">A</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'mdsForm_header_3',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">B</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'mdsForm_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Body Parts</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name' => 'mdsForm_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">I have pain/discomfort in the following body parts.</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'mdsForm_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">I think the pain/discomfort comes from work.</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);


        // CRUD::addField([
        //     'name' => 'fe_ll_question_1_subHeader_1',
        //     'type'  => 'custom_html',
        //     'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
        //     'wrapper' => [
        //         'class' => 'form-group col-md-4 d-flex align-self-center'
        //     ],
        //     'tab' => 'Forceful Exertion'
        // ]);

        // CRUD::field([   // Checkbox
        //     'name'  => 'fe_ll_applicable_1a',
        //     'label' => 'Applicable?',
        //     'type'  => 'checkbox',
        //     'wrapper' => [
        //         'class' => 'form-group d-flex align-self-center col-md-1'
        //     ],
        //     'attributes' => [
        //         'id' => 'fe_ll_applicable_1a',
        //         'name' => 'fe_ll_applicable_1a',
        //     ],
        // ])->tab('Forceful Exertion');




        CRUD::addField([
            'name'  => 'mdsForm_neck_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Neck</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 align-self-center'
            ],
            'tab' => 'MDS Form'
        ]);

        // CRUD::addField([
        //     'name'  => 'neck_a',
        //     'label' => false,
        //     'type'        => 'select_from_array',
        //     'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
        //     'allows_null' => false,
        //     'default'     => 0,
        //     'wrapper' => [
        //         'class' => 'form-group d-flex align-self-start col-md-4'
        //     ],
        //     'attributes' => [
        //         'id' => 'neck_a',
        //         'name' => 'neck_a',
        //     ],
        //     'tab' => 'MDS Form'
        // ]);

        CRUD::field([   // Checkbox
            'name'  => 'neck_a',
            'label' => 'Yes',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'mdsForm_neck_left_a',
                'name' => 'mdsForm_neck_left_a',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'neck_b',
            'label' => 'Yes',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'neck_b',
                'name' => 'neck_b',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'mdsForm_shoulder_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Shoulder</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'shoulder_a',
            'label' => 'Yes',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'shoulder_a',
                'name' => 'shoulder_a',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'shoulder_b',
            'label' => 'Yes',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'shoulder_b',
                'name' => 'shoulder_b',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'mdsForm_upperBack_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Upper Back</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'upperBack_a',
            'label' => 'Yes',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'upperBack_a',
                'name' => 'upperBack_a',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'upperBack_b',
            'label' => 'Yes',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'upperBack_b',
                'name' => 'upperBack_b',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);



        CRUD::addField([
            'name'  => 'mdsForm_upperArm_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Upper Arm</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'upperArm_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'upperArm_a_left',
                'name' => 'upperArm_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'upperArm_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'upperArm_a_right',
                'name' => 'upperArm_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'upperArm_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'upperArm_b_left',
                'name' => 'upperArm_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'upperArm_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'upperArm_b_right',
                'name' => 'upperArm_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'mdsForm_elbow_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Elbow</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'elbow_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'elbow_a_left',
                'name' => 'elbow_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'elbow_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'elbow_a_right',
                'name' => 'elbow_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'elbow_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'elbow_b_left',
                'name' => 'elbow_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'elbow_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'elbow_b_right',
                'name' => 'elbow_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);



        CRUD::addField([
            'name'  => 'mdsForm_lowerArm_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Lower Arm</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'lowerArm_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'lowerArm_a_left',
                'name' => 'lowerArm_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'lowerArm_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'lowerArm_a_right',
                'name' => 'lowerArm_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'lowerArm_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'lowerArm_b_left',
                'name' => 'lowerArm_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'lowerArm_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'lowerArm_b_right',
                'name' => 'lowerArm_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'mdsForm_wrist_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Wrist</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'wrist_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'wrist_a_left',
                'name' => 'wrist_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'wrist_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'wrist_a_right',
                'name' => 'wrist_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'wrist_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'wrist_b_left',
                'name' => 'wrist_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'wrist_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'wrist_b_right',
                'name' => 'wrist_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'mdsForm_hand_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Hand</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'hand_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'hand_a_left',
                'name' => 'hand_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'hand_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'hand_a_right',
                'name' => 'hand_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'hand_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'hand_b_left',
                'name' => 'hand_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'hand_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'hand_b_right',
                'name' => 'hand_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'mdsForm_lowerBack_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Lower Back</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'lowerBack_a',
            'label' => 'Yes',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'lowerBack_a',
                'name' => 'lowerBack_a',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'lowerBack_b',
            'label' => 'Yes',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'lowerBack_b',
                'name' => 'lowerBack_b',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);



        CRUD::addField([
            'name'  => 'mdsForm_thigh_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Thigh</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'thigh_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'thigh_a_left',
                'name' => 'thigh_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'thigh_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'thigh_a_right',
                'name' => 'thigh_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'thigh_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'thigh_b_left',
                'name' => 'thigh_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'thigh_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'thigh_b_right',
                'name' => 'thigh_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'mdsForm_knee_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Knee</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'knee_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'knee_a_left',
                'name' => 'knee_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'knee_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'knee_a_right',
                'name' => 'knee_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'knee_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'knee_b_left',
                'name' => 'knee_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'knee_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'knee_b_right',
                'name' => 'knee_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'mdsForm_calf_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Calf</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'calf_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'calf_a_left',
                'name' => 'calf_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'calf_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'calf_a_right',
                'name' => 'calf_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'calf_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'calf_b_left',
                'name' => 'calf_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'calf_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'calf_b_right',
                'name' => 'calf_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);



        CRUD::addField([
            'name'  => 'mdsForm_ankle_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Ankle</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'ankle_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'ankle_a_left',
                'name' => 'ankle_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'ankle_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'ankle_a_right',
                'name' => 'ankle_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'ankle_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'ankle_b_left',
                'name' => 'ankle_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'ankle_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'ankle_b_right',
                'name' => 'ankle_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);


        CRUD::addField([
            'name'  => 'mdsForm_feet_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0 text-center">Feet</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'feet_a_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'feet_a_left',
                'name' => 'feet_a_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'feet_a_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'feet_a_right',
                'name' => 'feet_a_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::addField([
            'name'  => 'feet_b_left',
            'label' => 'Yes, my left side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'feet_b_left',
                'name' => 'feet_b_left',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);
        CRUD::addField([
            'name'  => 'feet_b_right',
            'label' => 'Yes, my right side',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group col-md-2 d-flex justify-content-center'
            ],
            'attributes' => [
                'id' => 'feet_b_right',
                'name' => 'feet_b_right',
                'value' => 1, // Value when checked
            ],
            'default' => 0, // Value when unchecked
            'tab' => 'MDS Form'
        ]);

        CRUD::field([
            'name' => 'created_by',
            'type' => 'hidden',
            'value' => backpack_auth()->user()->id
        ]);


        CRUD::setCreateView('vendor.backpack.crud.custom.mdsForm.create');
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function export(Request $request)
    {
        // try {
        $collection = collect();
        // dd($request->all());
        // retrieve data operation
        if (
            isset($request->report_id) &&
            ($request->report_id == 'mdsForm_pdf_001' || $request->report_id == 'mdsForm_excel_001')
        ) {
            $collection = MDSForm::with(['employee', 'task'])->find($request->entry_id);

            $request->merge([
                'view' => 'reports.mdsForm.mdsForm_rpt_001',
                'titleReport' => __('Self Assessment Musculoskeletal Pain / Discomfort Survey Form'),
            ]);
        }
        // report type operation
        if ($request->report_id == 'mdsForm_pdf_001' || $request->report_id == 'mdsForm_pdf_002') {
            $request->merge([
                'reportType' => 'pdf',
            ]);
            $pdf = SnappyPdf::loadView($request['view'], [
                'data' => $collection,
                'request' => $request,
                'imageLink' => 'data:image/png;base64,' . base64_encode(file_get_contents('../public/favicon.ico')),
            ]);

            $pdf->setPaper('a4', 'portrait')
                ->setOption('footer-right', '[page]')
                ->setOrientation('portrait');
            return $pdf->inline('Expense Report -' . now() . '.pdf');
        }
        dd($request->all());

        // elseif ($request->report_id == 'mdsForm_excel_001' || $request->report_id == 'ageDebtor_excel_002') {
        //     $request->merge([
        //         'reportType' => 'xlsx',
        //     ]);
        //     return Excel::download(new ExcelExport($request, $collection), 'Self Assessment Musculoskeletal Pain / Discomfort Survey Form.xlsx');
        // } else {
        //     return redirect()->back()->with('error');
        // }
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }
}
