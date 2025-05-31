<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\CheckProjectSession;
use App\Http\Requests\CMDQuestionnaireRequest;
use App\Models\CMDQuestionnaire;
use App\Models\Employee;
use App\Models\Project;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class CMDQuestionnaireCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CMDQuestionnaireCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CMDQuestionnaire::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cmdQuestionnaire');
        CRUD::setEntityNameStrings('cmd questionnaire', 'cmd questionnaires');
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
                    'dataValue' => 'cmdQuestionnaire_pdf_001',
                    'dataValue2' => 'PDF',
                    'display' => 'Cornell Musculoskeletal Discomfort Questionnaires (PDF)',
                ],
                'list2' => [
                    'dataValue' => 'cmdQuestionnaire_excel_001',
                    'dataValue2' => 'Excel',
                    'display' => 'Cornell Musculoskeletal Discomfort Questionnaires (Excel)',
                ],
            ],
            'route' => 'cmdQuestionnaire_export',
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
            'name' => 'created_at',
            'label' => 'Created At',
            'type' =>  'text'
        ]);

        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('text');
         */
    }


    public function setupShowOperation()
    {
        $this->setupUpdateOperation(); // This loads all update fields

        // Make all fields read-only
        foreach ($this->crud->fields() as $field) {
            $this->crud->modifyField($field['name'], ['readonly' => true]);
        }

        $this->crud->setOperationSetting('view', 'crud::custom.cmdQuestionnaire.show');
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
        CRUD::setValidation(CMDQuestionnaireRequest::class);

        CRUD::field([
            'name' => 'project_id',
            'type' => 'hidden',
            'value' => session('filtered_project_id'),
            'label' => 'Project test',
        ]);
        CRUD::field([
            'name' => 'project_name',
            'type' => 'text',
            'default' => Project::find(session('filtered_project_id'))->name,
            'wrapper' => [
                'class' => 'form-group col-12 mb-5',
                'readonly' => 'readonly'
            ],
            'attributes' => [
                'readonly' => 'readonly'
            ],
        ]);

        CRUD::field([
            'name' => 'employee_id',
            'type' => 'select_from_array',
            'options' => ['' => 'Select an employee'] + Employee::where('project_id', session('filtered_project_id'))
                ->pluck('name', 'id')
                ->toArray(),
        ]);


        CRUD::addField([
            'name'  => 'cmdQuestionnaire_rw',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/cmdQuestionnaire/musculoskeletal.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-12',
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([   // CustomHTML
            'name'  => 'separator_1',
            'type'  => 'custom_html',
            'value' => '<hr>',

            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'instruction_1',
            'type'  => 'custom_html',
            'value' => 'The diagram below shows the approximate position of the body parts referred to in the questionnaire. Please answer by marking the appropriate box.',
            'wrapper' => [
                'class' => 'form-group col-12 h4 mb-2 text-start'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name'  => 'header_1_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-1',
            ],
            'tab' => 'CMD Questionnaire'
        ]);
        CRUD::field([
            'name'  => 'header_1',
            'type'  => 'custom_html',
            'value' => 'During the last work week how often did you experience ache, pain, discomfort in:',
            'wrapper' => [
                'class' => 'form-group col-4 h4 mb-0 text-start ps-3'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name'  => 'header_2',
            'type'  => 'custom_html',
            'value' => 'If you experienced ache, pain, discomfort, how uncomfortable was this?',
            'wrapper' => [
                'class' => 'form-group col-3 h4 mb-0 text-start'
            ],
            'tab' => 'CMD Questionnaire'
        ]);
        CRUD::field([
            'name' => 'header_3',
            'type'  => 'custom_html',
            'value' => 'If you experienced ache, pain discomfort, did this interfere with your ability to work?',
            'wrapper' => [
                'class' => 'form-group col-3 h4 mb-0 text-start ps-6'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name'  => 'header_4_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-1',
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name'  => 'header_4_spacer_2',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-1',
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'header_4',
            'type' => 'custom_html',
            'value' => '
            <div class="d-flex flex-wrap justify-content-center align-items-stretch mb-4 gap-2 px-0">
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">Never</h5>
                </div>
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">1-2 times last week</h5>
                </div>
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">3-4 times last week</h5>
                </div>
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">Once every day</h5>
                </div>
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">Several times every day</h5>
                </div>
            </div>
        ',
            'wrapper' => [
                'class' => 'form-group col-4',
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'header_5',
            'type' => 'custom_html',
            'value' => '
            <div class="d-flex flex-wrap justify-content-start align-items-stretch mb-4 gap-6">
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">Slightly uncomfortable</h5>
                </div>
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">Moderately uncomfortable</h5>
                </div>
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">Very uncomfortable</h5>
                </div>
            </div>
        ',
            'wrapper' => [
                'class' => 'form-group col-3',
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'header_6',
            'type' => 'custom_html',
            'value' => '
            <div class="d-flex flex-wrap justify-content-center align-items-stretch mb-4 gap-4 px-1">
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">Not at all</h5>
                </div>
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">Slightly interfered</h5>
                </div>
                <div class="text-justify p-0 border rounded col-12 col-sm-6 col-md-4 col-lg-2">
                    <h5 class="mb-0 small">Substantially interfered</h5>
                </div>
            </div>
        ',
            'wrapper' => [
                'class' => 'form-group col-3',
            ],
            'tab' => 'CMD Questionnaire'
        ]);





        CRUD::field([
            'name' => 'header_7',
            'type'  => 'custom_html',
            'value' => 'Score',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mt-2 text-center'
            ],
            'tab' => 'CMD Questionnaire'
        ]);



        CRUD::field([
            'name' => 'neck_header',
            'type'  => 'custom_html',
            'value' => 'Neck',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'neck_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'neck_a',
                'name' => 'neck_a',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'neck_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'neck_b',
                'name' => 'neck_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'neck_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'neck_c',
                'name' => 'neck_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'neck_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'neck_score',
                'name' => 'neck_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);





        CRUD::field([
            'name' => 'shoulder_right_header',
            'type'  => 'custom_html',
            'value' => 'Shoulder (Right)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'shoulder_right_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'shoulder_right_a',
                'name' => 'shoulder_right_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'shoulder_right_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'shoulder_right_b',
                'name' => 'shoulder_right_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'shoulder_right_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'shoulder_right_c',
                'name' => 'shoulder_right_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'shoulder_right_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'shoulder_right_score',
                'name' => 'shoulder_right_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'shoulder_left_header',
            'type'  => 'custom_html',
            'value' => 'Shoulder (Left)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'shoulder_left_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'shoulder_left_a',
                'name' => 'shoulder_left_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'shoulder_left_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'shoulder_left_b',
                'name' => 'shoulder_left_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'shoulder_left_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'shoulder_left_c',
                'name' => 'shoulder_left_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'shoulder_left_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'shoulder_left_score',
                'name' => 'shoulder_left_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'upper_back_header',
            'type'  => 'custom_html',
            'value' => 'Upper Back',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_back_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'upper_back_a',
                'name' => 'upper_back_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_back_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'upper_back_b',
                'name' => 'upper_back_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_back_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'upper_back_c',
                'name' => 'upper_back_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_back_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'upper_back_score',
                'name' => 'upper_back_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);



        CRUD::field([
            'name' => 'upper_arm_right_header',
            'type'  => 'custom_html',
            'value' => 'Upper Arm (Right)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_arm_right_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'upper_arm_right_a',
                'name' => 'upper_arm_right_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_arm_right_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'upper_arm_right_b',
                'name' => 'upper_arm_right_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_arm_right_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'upper_arm_right_c',
                'name' => 'upper_arm_right_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_arm_right_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'upper_arm_right_score',
                'name' => 'upper_arm_right_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'upper_arm_left_header',
            'type'  => 'custom_html',
            'value' => 'Upper Arm (Left)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_arm_left_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'upper_arm_left_a',
                'name' => 'upper_arm_left_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_arm_left_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'upper_arm_left_b',
                'name' => 'upper_arm_left_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_arm_left_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'upper_arm_left_c',
                'name' => 'upper_arm_left_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'upper_arm_left_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'upper_arm_left_score',
                'name' => 'upper_arm_left_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);



        CRUD::field([
            'name' => 'lower_back_header',
            'type'  => 'custom_html',
            'value' => 'Lower Back',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_back_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'lower_back_a',
                'name' => 'lower_back_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_back_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'lower_back_b',
                'name' => 'lower_back_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_back_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'lower_back_c',
                'name' => 'lower_back_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_back_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'lower_back_score',
                'name' => 'lower_back_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);




        CRUD::field([
            'name' => 'forearm_right_header',
            'type'  => 'custom_html',
            'value' => 'Forearm (Right)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'forearm_right_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'forearm_right_a',
                'name' => 'forearm_right_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'forearm_right_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'forearm_right_b',
                'name' => 'forearm_right_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'forearm_right_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'forearm_right_c',
                'name' => 'forearm_right_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'forearm_right_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'forearm_right_score',
                'name' => 'forearm_right_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'forearm_left_header',
            'type'  => 'custom_html',
            'value' => 'Forearm (Left)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'forearm_left_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'forearm_left_a',
                'name' => 'forearm_left_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'forearm_left_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'forearm_left_b',
                'name' => 'forearm_left_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'forearm_left_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'forearm_left_c',
                'name' => 'forearm_left_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'forearm_left_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'forearm_left_score',
                'name' => 'forearm_left_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);





        CRUD::field([
            'name' => 'wrist_right_header',
            'type'  => 'custom_html',
            'value' => 'Wrist (Right)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'wrist_right_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'wrist_right_a',
                'name' => 'wrist_right_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'wrist_right_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'wrist_right_b',
                'name' => 'wrist_right_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'wrist_right_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'wrist_right_c',
                'name' => 'wrist_right_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'wrist_right_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'wrist_right_score',
                'name' => 'wrist_right_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'wrist_left_header',
            'type'  => 'custom_html',
            'value' => 'Wrist (Left)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'wrist_left_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'wrist_left_a',
                'name' => 'wrist_left_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'wrist_left_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'wrist_left_b',
                'name' => 'wrist_left_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'wrist_left_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'wrist_left_c',
                'name' => 'wrist_left_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'wrist_left_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'wrist_left_score',
                'name' => 'wrist_left_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);




        CRUD::field([
            'name' => 'hip_or_buttocks_header',
            'type'  => 'custom_html',
            'value' => 'Hip/Buttocks',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'hip_or_buttocks_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'hip_or_buttocks_a',
                'name' => 'hip_or_buttocks_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'hip_or_buttocks_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'hip_or_buttocks_b',
                'name' => 'hip_or_buttocks_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'hip_or_buttocks_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'hip_or_buttocks_c',
                'name' => 'hip_or_buttocks_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'hip_or_buttocks_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'hip_or_buttocks_score',
                'name' => 'hip_or_buttocks_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'thigh_right_header',
            'type'  => 'custom_html',
            'value' => 'Thigh (Right)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'thigh_right_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'thigh_right_a',
                'name' => 'thigh_right_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'thigh_right_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'thigh_right_b',
                'name' => 'thigh_right_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'thigh_right_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'thigh_right_c',
                'name' => 'thigh_right_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'thigh_right_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'thigh_right_score',
                'name' => 'thigh_right_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'thigh_left_header',
            'type'  => 'custom_html',
            'value' => 'Thigh (Left)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'thigh_left_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'thigh_left_a',
                'name' => 'thigh_left_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'thigh_left_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'thigh_left_b',
                'name' => 'thigh_left_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'thigh_left_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'thigh_left_c',
                'name' => 'thigh_left_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'thigh_left_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'thigh_left_score',
                'name' => 'thigh_left_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);




        CRUD::field([
            'name' => 'knee_right_header',
            'type'  => 'custom_html',
            'value' => 'Knee (Right)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'knee_right_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'knee_right_a',
                'name' => 'knee_right_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'knee_right_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'knee_right_b',
                'name' => 'knee_right_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'knee_right_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'knee_right_c',
                'name' => 'knee_right_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'knee_right_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'knee_right_score',
                'name' => 'knee_right_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'knee_left_header',
            'type'  => 'custom_html',
            'value' => 'Knee (Left)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'knee_left_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'knee_left_a',
                'name' => 'knee_left_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'knee_left_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'knee_left_b',
                'name' => 'knee_left_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'knee_left_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'knee_left_c',
                'name' => 'knee_left_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'knee_left_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'knee_left_score',
                'name' => 'knee_left_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);





        CRUD::field([
            'name' => 'lower_leg_right_header',
            'type'  => 'custom_html',
            'value' => 'Lower Leg (Right)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_leg_right_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'lower_leg_right_a',
                'name' => 'lower_leg_right_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_leg_right_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'lower_leg_right_b',
                'name' => 'lower_leg_right_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_leg_right_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'lower_leg_right_c',
                'name' => 'lower_leg_right_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_leg_right_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'lower_leg_right_score',
                'name' => 'lower_leg_right_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'lower_leg_left_header',
            'type'  => 'custom_html',
            'value' => 'Lower Leg (Left)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_leg_left_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'lower_leg_left_a',
                'name' => 'lower_leg_left_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_leg_left_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'lower_leg_left_b',
                'name' => 'lower_leg_left_b',
                'readonly' => 'readonly'

            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'lower_leg_left_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'lower_leg_left_c',
                'name' => 'lower_leg_left_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);
        CRUD::field([
            'name' => 'lower_leg_left_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'lower_leg_left_score',
                'name' => 'lower_leg_left_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);



        CRUD::field([
            'name' => 'foot_right_header',
            'type'  => 'custom_html',
            'value' => 'Foot (Right)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'foot_right_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'foot_right_a',
                'name' => 'foot_right_a'
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'foot_right_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'foot_right_b',
                'name' => 'foot_right_b',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'foot_right_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'foot_right_c',
                'name' => 'foot_right_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'foot_right_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'foot_right_score',
                'name' => 'foot_right_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([
            'name' => 'foot_left_header',
            'type'  => 'custom_html',
            'value' => 'Foot (Left)',
            'wrapper' => [
                'class' => 'form-group col-1 h4 mb-0 text-justify d-flex align-items-center ps-0'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'foot_left_a',
            'label' => false,
            'type' => 'radio',
            'options' => [
                '0.0' => "",
                '1.5' => "",
                '3.5' => "",
                '5.0' => "",
                '10.0' => "",
            ],
            'default' => '0.0',
            'wrapper' => [
                'class' => 'form-group col-4 d-flex align-items-end justify-content-start gap-4'
            ],
            'attributes' => [
                'class' => 'me-1',
                'id' => 'foot_left_a',
                'name' => 'foot_left_a'

            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'foot_left_b',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 d-flex align-items-end justify-content-center gap-6 ps-0'
            ],
            'attributes' => [
                'id' => 'foot_left_b',
                'name' => 'foot_left_b',
                'readonly' => 'readonly'

            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'foot_left_c',
            'label' => false,
            'type' => 'radio',
            'options' => [
                "1" => "",
                "2" => "",
                "3" => "",
            ],
            'wrapper' => [
                'class' => 'form-group col-3 ml-0 d-flex align-items-end justify-content-start gap-5 ps-3'
            ],
            'attributes' => [
                'class' => 'me-0',
                'id' => 'foot_left_c',
                'name' => 'foot_left_c',
            ],
            'inline' => true,
            'tab' => 'CMD Questionnaire'
        ]);
        CRUD::field([
            'name' => 'foot_left_score',
            'label' => false,
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-1 text-center d-flex align-items-start justify-content-start'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'foot_left_score',
                'name' => 'foot_left_score',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);


        CRUD::field([   // CustomHTML
            'name'  => 'separator_2',
            'type'  => 'custom_html',
            'value' => '<hr>',

            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name'  => 'cmdQuestionnaire_totalScore_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-10',
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'cmdQuestionnaire_totalScore',
            'label' => 'Total Score',
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-2'
            ],
            'default' => 0,
            'attributes' => [
                'id' => 'cmdQuestionnaire_totalScore',
                'name' => 'cmdQuestionnaire_totalScore',
                'readonly' => 'readonly'
            ],
            'tab' => 'CMD Questionnaire'
        ]);

        CRUD::field([
            'name' => 'created_by',
            'type' => 'hidden',
            'value' => backpack_auth()->user()->id
        ]);

        CRUD::setFromDb(); // set fields from db columns.
        CRUD::setCreateView('vendor.backpack.crud.custom.cmdQuestionnaire.create');
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('text');
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
        $this->crud->set('show.setFromDb', false);

        $this->setupCreateOperation();
        CRUD::setEditView('vendor.backpack.crud.custom.cmdQuestionnaire.create');
    }

    public function export(Request $request)
    {
        // try {
        $collection = collect();
        // dd($request->all());
        // retrieve data operation
        if (
            isset($request->report_id) &&
            ($request->report_id == 'cmdQuestionnaire_pdf_001' || $request->report_id == 'cmdQuestionnaire_excel_001')
        ) {
            $collection = CMDQuestionnaire::with(['employee'])->find($request->entry_id);

            $request->merge([
                'view' => 'reports.cmdQuestionnaire.rpt_001',
                'titleReport' => __('Cornell Musculoskeletal Discomfort Questionnaires'),
            ]);
        }
        // report type operation
        if ($request->report_id == 'cmdQuestionnaire_pdf_001' || $request->report_id == 'cmdQuestionnaire_pdf_002') {
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

        // elseif ($request->report_id == 'cmdQuestionnaire_excel_001' || $request->report_id == 'ageDebtor_excel_002') {
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
