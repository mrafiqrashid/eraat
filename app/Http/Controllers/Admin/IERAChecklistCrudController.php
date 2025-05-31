<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\CheckProjectSession;
use App\Http\Requests\IERAChecklistRequest;
use App\Models\Employee;
use App\Models\IERAChecklist;
use App\Models\MDSForm;
use App\Models\Project;
use App\Models\Task;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class IERAChecklistCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class IERAChecklistCrudController extends CrudController
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
        CRUD::setModel(\App\Models\IERAChecklist::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/ieraChecklist');
        CRUD::setEntityNameStrings('IERA checklist', 'IERA checklists');
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
                    'dataValue' => 'pdf_001',
                    'dataValue2' => 'PDF',
                    'display' => 'IERA Checklist Report (PDF)',
                ],
                'list2' => [
                    'dataValue' => 'excel_001',
                    'dataValue2' => 'Excel',
                    'display' => 'IERA Checklist Report (Excel)',
                ],
            ],
            'route' => 'ieraChecklist_export',
        ]);
        CRUD::removeButton('update');
        CRUD::button('check')->stack('line')->view('crud::buttons.check')->position('beginning');
        CRUD::button('print')->stack('line')->view('crud::buttons.print')->position('beginning');
        CRUD::orderButtons('line', ['check', 'print', 'delete']);
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
        // CRUD::setFromDb(); // set columns from db columns.

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
        CRUD::setValidation(IERAChecklistRequest::class);

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
            'options' => ['' => 'Select an employee'] + Employee::where('project_id', session('filtered_project_id'))
                ->pluck('name', 'id')
                ->toArray(),
        ]);

        CRUD::field([
            'name' => 'task_id',
            'type' => 'select_from_array',
            'options' => ['' => 'Select a task'] + Task::where('project_id', session('filtered_project_id'))
                ->pluck('name', 'id')
                ->toArray(),
        ]);


        CRUD::addField([
            'name'  => 'ap_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="fw-bolder">Section: Awkward Posture</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Body Part</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Physical Risk Factor</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_header_3',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Maximum Exposure Duration (Continuously or cumulatively)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_header_4',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Illustration</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_header_5',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);

        CRUD::addField([
            'name'  => 'ap_question_1_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Shoulders</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_1_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with hand above the head OR the elbow above the shoulder</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_1_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_1_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_01.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_1',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_1',
                'name' => 'ap_question_1',
            ],
            'tab' => 'Awkward Posture'
        ]);


        CRUD::addField([
            'name'  => 'ap_question_2_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Shoulders</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_2_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with shoulder raised</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_2_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_2_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_02.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_2',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_2',
                'name' => 'ap_question_2',
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'ap_question_3_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Shoulders</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_3_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work repetitvely by raising the hand above the head OR the elbow above the shoulder more than once per minute</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_3_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_3_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_03.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_3',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_3',
                'name' => 'ap_question_3',
            ],
            'tab' => 'Awkward Posture'
        ]);



        CRUD::addField([
            'name'  => 'ap_question_4_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Head</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_4_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with head bent downwards more than 45 degrees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_4_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_4_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_04.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_4',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_4',
                'name' => 'ap_question_4',
            ],
            'tab' => 'Awkward Posture'
        ]);





        CRUD::addField([
            'name'  => 'ap_question_5_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Head</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_5_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with head bent backwards</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_5_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_5_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_05.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_5',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_5',
                'name' => 'ap_question_5',
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'ap_question_6_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Head</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_6_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with head bent sideways</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_6_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_6_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_06.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_6',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_6',
                'name' => 'ap_question_6',
            ],
            'tab' => 'Awkward Posture'
        ]);





        CRUD::addField([
            'name'  => 'ap_question_7_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Back</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_7_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with back bent forward more than 30 degrees OR bent sideways</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_7_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_7_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_07.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_7',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_7',
                'name' => 'ap_question_7',
            ],
            'tab' => 'Awkward Posture'
        ]);


        CRUD::addField([
            'name'  => 'ap_question_8_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Back</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_8_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with body twisted</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_8_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_8_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_08.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_8',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_8',
                'name' => 'ap_question_8',
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'ap_question_9_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Hand/ Elbow/ Wrist</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_9_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with wrist flexion OR extension OR radial deviation more than 15 degrees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_9_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_9_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_09.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_9',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_9',
                'name' => 'ap_question_9',
            ],
            'tab' => 'Awkward Posture'
        ]);


        CRUD::addField([
            'name'  => 'ap_question_10_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Hand/ Elbow/ Wrist</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_10_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with arm abducted sideways</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_10_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 4 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_10_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_10.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_10',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_10',
                'name' => 'ap_question_10',
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'ap_question_11_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Hand/ Elbow/ Wrist</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_11_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Working with arm extended forward more than 45 degrees OR arm extended backward more than 20 degrees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_11_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_11_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_11.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_11',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_11',
                'name' => 'ap_question_11',
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'ap_question_12_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Leg/ Knees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_12_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work in a squat position</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_12_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_12_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_12.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_12',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_12',
                'name' => 'ap_question_12',
            ],
            'tab' => 'Awkward Posture'
        ]);





        CRUD::addField([
            'name'  => 'ap_question_13_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Leg/ Knees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'ap_question_13_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work in a kneeling position</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_13_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_13_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/ap_13.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_question_13',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_question_13',
                'name' => 'ap_question_13',
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'ap_spacer2',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'ap_result',
            'label' => false,
            'type'        => 'number',
            'attributes' => [
                'readonly' => true
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ap_result',
                'name' => 'ap_result',
            ],
            'tab' => 'Awkward Posture'
        ]);









        CRUD::addField([
            'name'  => 'snswp_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="fw-bolder">Section: Static and Sustained Work Posture</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);

        CRUD::addField([
            'name'  => 'snswp_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Body Part</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name' => 'snswp_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Physical Risk Factor</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_header_3',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Maximum Exposure Duration (Continuously or cumulatively)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_header_4',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Illustration</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_header_5',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);


        CRUD::addField([
            'name'  => 'snswp_question_1_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Trunk/ Head/ Neck/ Arm/ Wrist</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name' => 'snswp_question_1_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work in a static awkward position as in Table 3.1</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_question_1_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Duration as per Table 3.1</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_question_1_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/snswp_01.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_question_1',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'snswp_question_1',
                'name' => 'snswp_question_1',
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);






        CRUD::addField([
            'name'  => 'snswp_question_2_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Leg/ Knees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name' => 'snswp_question_2_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work in a standing position with minimal leg movement</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_question_2_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours continously</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_question_2_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/snswp_02.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_question_2',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'snswp_question_2',
                'name' => 'snswp_question_2',
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);







        CRUD::addField([
            'name'  => 'snswp_question_3_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name' => 'snswp_question_3_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work in a seated position with minimal movement</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_question_3_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 30 minutes continously</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_question_3_subHeader_4',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/snswp_03.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_question_3',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'snswp_question_3',
                'name' => 'snswp_question_3',
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);



        CRUD::addField([
            'name'  => 'snswp_result_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'snswp_result',
            'label' => false,
            'type'        => 'number',
            'attributes' => [
                'readonly' => true
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'snswp_result',
                'name' => 'snswp_result',
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);





        CRUD::addField([
            'name'  => 'fe_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="fw-bolder">Section: Forceful Exertion</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Forceful Exertion'
        ]);



        CRUD::addField([
            'name'  => 'fe_subSection_1',
            'type'  => 'custom_html',
            'value' => '<h3 class="fw-bolder">Background Check</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_bc_1_gender',
            'label' => 'Gender',
            'type' => 'select_from_array',
            'options'     => [1 => 'Male', 2 => 'Female'],
            'allows_null' => false,
            'default'     => 1,
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_bc_1_gender',
                'name' => 'fe_bc_1_gender',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_bc_1_gender_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_ll_subSection',
            'type'  => 'custom_html',
            'value' => '<h3 class="fw-bolder">Lifting and Lowering</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_ll_rw_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_ll_rw',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/fe_ll_rw.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_ll_rw_spacer_2',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_ll_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Working Height</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name' => 'fe_ll_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Sholder to Elbow</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_ll_header_3',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Elbow to Wrist</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);






        CRUD::addField([
            'name' => 'fe_ll_question_1_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_1a',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_1a',
                'name' => 'fe_ll_applicable_1a',
            ],
        ])->tab('Forceful Exertion');


        CRUD::addField([
            'name'  => 'fe_ll_question_1a',
            'label' => false,
            'type'        => 'number',
            'default'     => 0.000,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_1a',
                'name' => 'fe_ll_question_1a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_1b',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_1b',
                'name' => 'fe_ll_applicable_1b',
            ],
        ])->tab('Forceful Exertion');

        CRUD::addField([
            'name'  => 'fe_ll_question_1b',
            'label' => false,
            'type' => 'number',
            'default' => 0.000,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_1b',
                'name' => 'fe_ll_question_1b',
            ],
            'tab' => 'Forceful Exertion'
        ]);





        CRUD::addField([
            'name' => 'fe_ll_question_2_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between mid-lower leg to knuckle</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_2a',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_2a',
                'name' => 'fe_ll_applicable_2a',
            ],
        ])->tab('Forceful Exertion');


        CRUD::addField([
            'name'  => 'fe_ll_question_2a',
            'label' => false,
            'type'        => 'number',
            'default'     => 0.000,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_2a',
                'name' => 'fe_ll_question_2a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_2b',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_2b',
                'name' => 'fe_ll_applicable_2b',
            ],
        ])->tab('Forceful Exertion');

        CRUD::addField([
            'name'  => 'fe_ll_question_2b',
            'label' => false,
            'type' => 'number',
            'default' => 0.000,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_2b',
                'name' => 'fe_ll_question_2b',
            ],
            'tab' => 'Forceful Exertion'
        ]);




        CRUD::addField([
            'name' => 'fe_ll_question_3_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between knuckle height and elbow</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_3a',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_3a',
                'name' => 'fe_ll_applicable_3a',
            ],
        ])->tab('Forceful Exertion');


        CRUD::addField([
            'name'  => 'fe_ll_question_3a',
            'label' => false,
            'type'        => 'number',
            'default'     => 0.000,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_3a',
                'name' => 'fe_ll_question_3a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_3b',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_3b',
                'name' => 'fe_ll_applicable_3b',
            ],
        ])->tab('Forceful Exertion');

        CRUD::addField([
            'name'  => 'fe_ll_question_3b',
            'label' => false,
            'type' => 'number',
            'default' => 0.000,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_3b',
                'name' => 'fe_ll_question_3b',
            ],
            'tab' => 'Forceful Exertion'
        ]);






        CRUD::addField([
            'name' => 'fe_ll_question_4_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between elbow to shoulder</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_4a',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_4a',
                'name' => 'fe_ll_applicable_4a',
            ],
        ])->tab('Forceful Exertion');


        CRUD::addField([
            'name'  => 'fe_ll_question_4a',
            'label' => false,
            'type'        => 'number',
            'default'     => 0.000,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_4a',
                'name' => 'fe_ll_question_4a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_4b',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_4b',
                'name' => 'fe_ll_applicable_4b',
            ],
        ])->tab('Forceful Exertion');

        CRUD::addField([
            'name'  => 'fe_ll_question_4b',
            'label' => false,
            'type' => 'number',
            'default' => 0.000,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_4b',
                'name' => 'fe_ll_question_4b',
            ],
            'tab' => 'Forceful Exertion'
        ]);



        CRUD::addField([
            'name' => 'fe_ll_question_5_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Above the shoulder</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_5a',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_5a',
                'name' => 'fe_ll_applicable_5a',
            ],
        ])->tab('Forceful Exertion');


        CRUD::addField([
            'name'  => 'fe_ll_question_5a',
            'label' => false,
            'type'        => 'number',
            'default'     => 0.000,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_5a',
                'name' => 'fe_ll_question_5a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::field([   // Checkbox
            'name'  => 'fe_ll_applicable_5b',
            'label' => 'Applicable?',
            'type'  => 'checkbox',
            'wrapper' => [
                'class' => 'form-group d-flex align-self-center col-md-1'
            ],
            'attributes' => [
                'id' => 'fe_ll_applicable_5b',
                'name' => 'fe_ll_applicable_5b',
            ],
        ])->tab('Forceful Exertion');

        CRUD::addField([
            'name'  => 'fe_ll_question_5b',
            'label' => false,
            'type' => 'number',
            'default' => 0.000,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_ll_question_5b',
                'name' => 'fe_ll_question_5b',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_rll_subSection',
            'type'  => 'custom_html',
            'value' => '<h3 class="fw-bolder">Repetitive Lifting and Lowering</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_rll_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_rll_rw',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/fe_rll_rw.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_rll_spacer_2',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_rll_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Working Height</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_rll_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Sholder to Elbow</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_rll_header_3',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Elbow to Wrist</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);



        CRUD::addField([
            'name'  => 'fe_rll_question_1_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_rll_question_1a',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_1a',
                'name' => 'fe_rll_question_1a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_rll_question_1b',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_1b',
                'name' => 'fe_rll_question_1b',
            ],
            'tab' => 'Forceful Exertion'
        ]);



        CRUD::addField([
            'name'  => 'fe_rll_question_2_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between mid-lower leg to knuckle</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_rll_question_2a',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_2a',
                'name' => 'fe_rll_question_2a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_rll_question_2b',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_2b',
                'name' => 'fe_rll_question_2b',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_rll_question_3_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between knuckle height and elbow</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_rll_question_3a',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_3a',
                'name' => 'fe_rll_question_3a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_rll_question_3b',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_3b',
                'name' => 'fe_rll_question_3b',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_rll_question_4_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between elbow to shoulder</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_rll_question_4a',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_4a',
                'name' => 'fe_rll_question_4a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_rll_question_4b',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_4b',
                'name' => 'fe_rll_question_4b',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_rll_question_5_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Above the shoulder</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_rll_question_5a',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_5a',
                'name' => 'fe_rll_question_5a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_rll_question_5b',
            'label' => 'Employee repeats operations?',
            'type'        => 'select_from_array',
            'options'     => [
                0 => 'Not applicable',
                1 => 'Once or twice per minutes',
                2 => 'Five to eight times per minute',
                3 => 'More than 12 times per minute'
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_rll_question_5b',
                'name' => 'fe_rll_question_5b',
            ],
            'tab' => 'Forceful Exertion'
        ]);




























        CRUD::addField([
            'name'  => 'fe_lltbp_subSection',
            'type'  => 'custom_html',
            'value' => '<h3 class="fw-bolder">Lifting and Lowering with Twisted Body Posture</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_lltbp_rw_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_lltbp_rw',
            'type'  => 'custom_html',
            'value' => '<div class="text-center"><img src="' . asset('images/ieraChecklist/fe_lltbp_rw.png') . '" alt="Illustration" class="img-fluid"></div>',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_lltbp_rw_spacer_2',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'tab' => 'Forceful Exertion'
        ]);




        CRUD::addField([
            'name'  => 'fe_lltbp_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Working Height</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_lltbp_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Sholder to Elbow</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_lltbp_header_3',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Elbow to Wrist</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);



        CRUD::addField([
            'name'  => 'fe_lltbp_question_1_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_lltbp_question_1a',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_1a',
                'name' => 'fe_lltbp_question_1a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_lltbp_question_1b',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_1b',
                'name' => 'fe_lltbp_question_1b',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_lltbp_question_2_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_lltbp_question_2a',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_2a',
                'name' => 'fe_lltbp_question_2a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_lltbp_question_2b',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_2b',
                'name' => 'fe_lltbp_question_2b',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_lltbp_question_3_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_lltbp_question_3a',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_3a',
                'name' => 'fe_lltbp_question_3a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_lltbp_question_3b',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_3b',
                'name' => 'fe_lltbp_question_3b',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_lltbp_question_4_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_lltbp_question_4a',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_4a',
                'name' => 'fe_lltbp_question_4a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_lltbp_question_4b',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_4b',
                'name' => 'fe_lltbp_question_4b',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_lltbp_question_5_subheader_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4 d-flex align-self-center'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_lltbp_question_5a',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_5a',
                'name' => 'fe_lltbp_question_5a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_lltbp_question_5b',
            'label' => 'Employee twists body from forward facing to the side?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => '45 degrees',
                2 => '90 degrees',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_lltbp_question_5b',
                'name' => 'fe_lltbp_question_5b',
            ],
            'tab' => 'Forceful Exertion'
        ]);


























        CRUD::addField([
            'name'  => 'fe_pp_subSection',
            'type'  => 'custom_html',
            'value' => '<h3 class="fw-bolder">Pushing and Pulling</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_pp_rw_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_rw',
            'type'  => 'custom_html',
            'value' => '<img src="' . asset('images/ieraChecklist/fe_pp_rw.png') . '" alt="Illustration" class="img-fluid">',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_pp_rw_spacer_2',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'tab' => 'Forceful Exertion'
        ]);





        CRUD::addField([
            'name'  => 'fe_pp_question_1a',
            'label' => '<b>Stopping or starting a load</b> - Surface condition?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'On smooth level surface using well maintained handling aid',
                2 => 'On smooth level surface using a broken handling aid.',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_1a',
                'name' => 'fe_pp_question_1a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_question_1b',
            'label' => 'in (kg)',
            'type'        => 'number',
            'default'     => 0.000,
            'wrapper' => [
                'class' => 'form-group col-md-3  align-self-end'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_1b',
                'name' => 'fe_pp_question_1b',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_question_1b_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_pp_question_1c',
            'label' => 'Force is applied with the hands;',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_1c',
                'name' => 'fe_pp_question_1c',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_pp_question_1d',
            'label' => 'Hands are between knuckle and shoulder height?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_1d',
                'name' => 'fe_pp_question_1d',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_pp_question_1e',
            'label' => 'Distance for pushing or pulling is less than 20 m?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_1e',
                'name' => 'fe_pp_question_1e',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_pp_question_1f',
            'label' => 'Load is being supported on wheels?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4 mb-3'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_1f',
                'name' => 'fe_pp_question_1f',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_pp_question_1g',
            'label' => 'Load is being supported on wheels?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4 mb-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_1g',
                'name' => 'fe_pp_question_1g',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_question_1g_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_pp_question_2a',
            'label' => '<b>Keeping the load in motion</b> - Surface condition?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'On uneven level surface using well maintained handling aid',
                2 => 'On uneven level surface using a broken handling aid.',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_2a',
                'name' => 'fe_pp_question_2a',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_question_2b',
            'label' => 'in (kg)',
            'type'        => 'number',
            'default'     => 0.000,
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_2b',
                'name' => 'fe_pp_question_2b',
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_pp_question_2b_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_question_2c',
            'label' => 'Force is applied with the hands;',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_2c',
                'name' => 'fe_pp_question_2c',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_question_2d',
            'label' => 'Hands are between knuckle and shoulder height?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_2d',
                'name' => 'fe_pp_question_2d',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_question_2e',
            'label' => 'Distance for pushing or pulling is less than 20 m?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_2e',
                'name' => 'fe_pp_question_2e',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_pp_question_2f',
            'label' => 'Load is being supported on wheels?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4 mb-3'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_2f',
                'name' => 'fe_pp_question_2f',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_question_2g',
            'label' => 'Load is being supported on wheels?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4 mb-4'
            ],
            'attributes' => [
                'id' => 'fe_pp_question_2g',
                'name' => 'fe_pp_question_2g',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_pp_question_2g_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'Forceful Exertion'
        ]);






        CRUD::addField([
            'name'  => 'fe_hsp_subSection',
            'type'  => 'custom_html',
            'value' => '<h3 class="fw-bolder">Нandling in Seated Position</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_hsp_spacer_1',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_hsp_rw',
            'type'  => 'custom_html',
            'value' => '<div class="text-center"><img src="' . asset('images/ieraChecklist/fe_hsp_rw.png') . '" alt="Illustration" class="img-fluid"></div>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_hsp_spacer_2',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ],
            'tab' => 'Forceful Exertion'
        ]);






        CRUD::addField([
            'name'  => 'fe_hsp_question_1',
            'label' => 'The load is beyond the \'box zone\' as indicated in illustration?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'attributes' => [
                'id' => 'fe_hsp_question_1',
                'name' => 'fe_hsp_question_1',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_hsp_question_2',
            'label' => 'The load in (kg)',
            'type'        => 'number',
            'default'     => 0.000,
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'attributes' => [
                'id' => 'fe_hsp_question_2',
                'name' => 'fe_hsp_question_2',
            ],
            'tab' => 'Forceful Exertion'
        ]);






        CRUD::addField([
            'name'  => 'fe_c_subSection',
            'type'  => 'custom_html',
            'value' => '<h3 class="fw-bolder">Carrying</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_c_question_1_header',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">a) Floor surface</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-12 d-flex align-self-end'
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_c_question_1a',
            'label' => 'The floor surface is dry but in poor condition, worn or uneven?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-12'
            ],
            'attributes' => [
                'id' => 'fe_c_question_1a',
                'name' => 'fe_c_question_1a',
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_c_question_1b',
            'label' => 'Contaminated/wet or steep sloping floor or unstable surface or unsuitable footwear?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-12'
            ],
            'attributes' => [
                'id' => 'fe_c_question_1b',
                'name' => 'fe_c_question_1b',
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_c_question_2_header',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">b) Environmental factor</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-12 d-flex align-self-end'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_c_question_2',
            'label' => 'Observe the work environment and score if the carrying operation takes place: in
                        extremes of temperature; with strong air movements; or in extreme lighting
                        conditions (dark, bright or poor contrast)?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-12'
            ],
            'attributes' => [
                'id' => 'fe_c_question_2',
                'name' => 'fe_c_question_2',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_c_question_3_header',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">c) Carry distance</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-12 d-flex align-self-end'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_c_question_3',
            'label' => 'Observe the task and estimate the total distance that the load is carried. An
                        acceptable distance should be within 2 to 10 meters. More than 10 meters
                        considered as exceeding the limit?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-12'
            ],
            'attributes' => [
                'id' => 'fe_c_question_3',
                'name' => 'fe_c_question_3',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_c_question_4_header',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">d) Obstacles en route</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-12 d-flex align-self-end'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_c_question_4',
            'label' => 'Observe the route. If the operator has to carry a load up a steep slope, up steps,
                        through closed doors or around tripping hazards, or if the task involves carrying
                        the load up ladders or if the task involves more than one of the risk factors (eg a
                        steep slope and then up ladders), an advanced ERA should be conducted?',
            'type'        => 'select_from_array',
            'options'     =>
            [
                0 => 'Not applicable',
                1 => 'No',
                2 => 'Yes',
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group col-md-12'
            ],
            'attributes' => [
                'id' => 'fe_c_question_4',
                'name' => 'fe_c_question_4',
            ],
            'tab' => 'Forceful Exertion'
        ]);














        CRUD::addField([
            'name'  => 'fe_result_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_result',
            'label' => false,
            'type'        => 'number',
            'attributes' => [
                'readonly' => true
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'fe_result',
                'name' => 'fe_result',
            ],
            'tab' => 'Forceful Exertion'
        ]);



        CRUD::addField([
            'name'  => 'rm_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="fw-bolder">Section: Repettive Motion</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Repetitive Motion'
        ]);





        CRUD::addField([
            'name'  => 'rm_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-3">Body Part</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'rm_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-4">Physical Risk Factor</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'rm_header_3',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-3">Maximum Exposure Duration</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'rm_header_4',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Repetitive Motion'
        ]);





        CRUD::addField([
            'name'  => 'rm_question_1_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Neck, shoulders, elboow, wrists, hands, knee</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'rm_question_1_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work invloving repetitive sequence of movement more than twice per minute</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'rm_question_1_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 3 hours on a "normal" workday OR More than 1 hour continously without a break</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'rm_question_1',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'rm_question_1',
                'name' => 'rm_question_1',
            ],
            'tab' => 'Repetitive Motion'
        ]);




        CRUD::addField([
            'name'  => 'rm_question_2_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'rm_question_2_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work invloving intensive use of the fingers, hands or wrists or work involving intensive data entry (key-in)</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'rm_question_2_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 3 hours on a "normal" workday OR More than 1 hour continously without a break</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'rm_question_2',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'rm_question_2',
                'name' => 'rm_question_2',
            ],
            'tab' => 'Repetitive Motion'
        ]);








        CRUD::addField([
            'name'  => 'rm_question_3_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'rm_question_3_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work invloving repetitive shoulder/arm movement with some pauses OR continously shoulder/ arm movement</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'rm_question_3_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 3 hours on a "normal" workday OR More than 1 hour continously without a break</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'rm_question_3',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'rm_question_3',
                'name' => 'rm_question_3',
            ],
            'tab' => 'Repetitive Motion'
        ]);








        CRUD::addField([
            'name'  => 'rm_question_4_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'rm_question_4_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work using the heel/ base of palm as a "hammer" more than once per minute</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'rm_question_4_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'rm_question_4',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'rm_question_4',
                'name' => 'rm_question_4',
            ],
            'tab' => 'Repetitive Motion'
        ]);








        CRUD::addField([
            'name'  => 'rm_question_5_subHeader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'rm_question_5_subHeader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work using the knee as a "hammer" more than once per minute</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'rm_question_5_subHeader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'rm_question_5',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'rm_question_5',
                'name' => 'rm_question_5',
            ],
            'tab' => 'Repetitive Motion'
        ]);



        CRUD::addField([
            'name'  => 'rm_result_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'rm_result',
            'label' => false,
            'type'        => 'number',
            'attributes' => [
                'readonly' => true
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'rm_result',
                'name' => 'rm_result',
            ],
            'tab' => 'Repetitive Motion'
        ]);











        // title vibration 
        CRUD::addField([
            'name'  => 'vibration_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="fw-bolder">Section: Vibration</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Vibration'
        ]);





        CRUD::addField([
            'name'  => 'vibration_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-3">Body Part</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'vibration_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-4">Physical Risk Factor</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'vibration_header_3',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-3">Maximum Exposure Duration</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'vibration_header_4',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Vibration'
        ]);





        CRUD::addField([
            'name'  => 'vibration_question_1_subheader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Hand-Arm (segmental vibration)</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'vibration_question_1_subheader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work using power tools (ie: battery powered/ electical pneumatic/ hydraulic) <span class="text-decoration-underline">without</span> PPE*</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'vibration_question_1_subheader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 50 minutes in an hour</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);

        CRUD::addField([
            'name'  => 'vibration_question_1',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'vibration_question_1',
                'name' => 'vibration_question_1',
            ],
            'tab' => 'Vibration'
        ]);




        CRUD::addField([
            'name'  => 'vibration_question_2_subheader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'vibration_question_2_subheader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work using power tools (ie: battery powered/ electrical pneumatic/ hydraulic) <span class="text-decoration-underline">with</span> PPE*</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'vibration_question_2_subheader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 5 hours in 8 hours shift work</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);

        CRUD::addField([
            'name'  => 'vibration_question_2',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'vibration_question_2',
                'name' => 'vibration_question_2',
            ],
            'tab' => 'Vibration'
        ]);








        CRUD::addField([
            'name'  => 'vibration_question_3_subheader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Whole body vibration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'vibration_question_3_subheader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work invloving exposure to whole body vibration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'vibration_question_3_subheader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 5 hours in 8 hours shift work</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);

        CRUD::addField([
            'name'  => 'vibration_question_3',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'vibration_question_3',
                'name' => 'vibration_question_3',
            ],
            'tab' => 'Vibration'
        ]);


        CRUD::addField([
            'name'  => 'vibration_question_4_subheader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'vibration_question_4_subheader_2',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">Work involving exposure to whole body vibration combined employee complaint of excessive body shaking</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'vibration_question_4_subheader_3',
            'type'  => 'custom_html',
            'value' => '<p class="mb-2">More than 3 hours in 8 hours shift work</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);

        CRUD::addField([
            'name'  => 'vibration_question_4',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'vibration_question_4',
                'name' => 'vibration_question_4',
            ],
            'tab' => 'Vibration'
        ]);



        CRUD::addField([
            'name'  => 'vibration_result_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'vibration_result',
            'label' => false,
            'type'        => 'number',
            'attributes' => [
                'readonly' => true
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'vibration_result',
                'name' => 'vibration_result',
            ],
            'tab' => 'Vibration'
        ]);








        // title Lighting
        CRUD::addField([
            'name'  => 'lighting_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="fw-bolder">Section: Lighting</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Lighting'
        ]);






        CRUD::addField([
            'name'  => 'lighting_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-10">Physical Risk Factor</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Lighting'
        ]);

        CRUD::addField([
            'name'  => 'lighting_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Lighting'
        ]);










        CRUD::addField([
            'name'  => 'lighting_question_1_subheader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-10">Inadequate lighting</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Lighting'
        ]);


        CRUD::addField([
            'name'  => 'lighting_question_1',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'lighting_question_1',
                'name' => 'lighting_question_1',
            ],
            'tab' => 'Lighting'
        ]);



        CRUD::addField([
            'name'  => 'lighting_result_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Lighting'
        ]);
        CRUD::addField([
            'name'  => 'lighting_result',
            'label' => false,
            'type'        => 'number',
            'attributes' => [
                'readonly' => true
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'lighting_result',
                'name' => 'lighting_result',
            ],
            'tab' => 'Lighting'
        ]);




        // title temperature
        CRUD::addField([
            'name'  => 'temperature_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="fw-bolder">Section: Temperature</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Temperature'
        ]);

        CRUD::addField([
            'name'  => 'temperature_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-10">Physical Risk Factor</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Temperature'
        ]);

        CRUD::addField([
            'name'  => 'temperature_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Temperature'
        ]);


        CRUD::addField([
            'name'  => 'temperature_question_1_subheader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-10">Extreme temperature (hot/ cold)</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Temperature'
        ]);


        CRUD::addField([
            'name'  => 'temperature_question_1',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'temperature_question_1',
                'name' => 'temperature_question_1',
            ],
            'tab' => 'Temperature'
        ]);




        CRUD::addField([
            'name'  => 'temperature_result_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Temperature'
        ]);
        CRUD::addField([
            'name'  => 'temperature_result',
            'label' => false,
            'type'        => 'number',
            'attributes' => [
                'readonly' => true
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'temperature_result',
                'name' => 'temperature_result',
            ],
            'tab' => 'Temperature'
        ]);






        // title ventilation
        CRUD::addField([
            'name'  => 'ventilation_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="fw-bolder">Section: Ventilation</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Ventilation'
        ]);

        CRUD::addField([
            'name'  => 'ventilation_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-10">Physical Risk Factor</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Ventilation'
        ]);

        CRUD::addField([
            'name'  => 'ventilation_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Ventilation'
        ]);


        CRUD::addField([
            'name'  => 'ventilation_question_1_subheader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-10">Inadequate air ventilation</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Ventilation'
        ]);


        CRUD::addField([
            'name'  => 'ventilation_question_1',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ventilation_question_1',
                'name' => 'ventilation_question_1',
            ],
            'tab' => 'Ventilation'
        ]);






        CRUD::addField([
            'name'  => 'ventilation_result_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Ventilation'
        ]);
        CRUD::addField([
            'name'  => 'ventilation_result',
            'label' => false,
            'type'        => 'number',
            'attributes' => [
                'readonly' => true
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'ventilation_result',
                'name' => 'ventilation_result',
            ],
            'tab' => 'Ventilation'
        ]);



        // title noise
        CRUD::addField([
            'name'  => 'noise_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="fw-bolder">Section: Noise</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Noise'
        ]);

        CRUD::addField([
            'name'  => 'noise_header_1',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-10">Physical Risk Factor</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Noise'
        ]);

        CRUD::addField([
            'name'  => 'noise_header_2',
            'type'  => 'custom_html',
            'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Noise'
        ]);


        CRUD::addField([
            'name'  => 'noise_question_1_subheader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-10">Noise exposure above Permissible Exposure Limit (PEL) (based on previous reports or measurement)</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Noise'
        ]);


        CRUD::addField([
            'name'  => 'noise_question_1',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'noise_question_1',
                'name' => 'noise_question_1',
            ],
            'tab' => 'Noise'
        ]);


        CRUD::addField([
            'name'  => 'noise_question_2_subheader_1',
            'type'  => 'custom_html',
            'value' => '<p class="mb-10">Exposure to annoying or excessive noise during working hours</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Noise'
        ]);


        CRUD::addField([
            'name'  => 'noise_question_2',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'noise_question_2',
                'name' => 'noise_question_2',
            ],
            'tab' => 'Noise'
        ]);



        CRUD::addField([
            'name'  => 'noise_result_spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Noise'
        ]);
        CRUD::addField([
            'name'  => 'noise_result',
            'label' => false,
            'type'        => 'number',
            'attributes' => [
                'readonly' => true
            ],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'attributes' => [
                'id' => 'noise_result',
                'name' => 'noise_result',
            ],
            'tab' => 'Noise'
        ]);

        CRUD::addField([
            'name' => 'next_to_description',
            'type' => 'custom_html',
            'value' => '<button type="button" class="btn btn-primary next-tab" data-next-tab="Description">Next</button>',
            'tab' => 'Noise',
        ]);



        CRUD::field([
            'name'  => 'description',
            'label' => 'Description',
            'type'  => 'summernote',
            'options' => [
                'height' => 500,
                'toolbar' => [
                    ['font', ['bold', 'underline', 'italic']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']],
                    ['style', ['style']],
                ],

            ],
            'wrapper' => [
                'class' => 'form-group col-md-12 mt-5'
            ],
            'tab' => 'Description'
        ]);


        CRUD::field([
            'name' => 'created_by',
            'type' => 'hidden',
            'value' => backpack_auth()->user()->id
        ]);

        // Remove default buttons
        CRUD::removeButton('save');
        CRUD::removeButton('save_and_back');
        CRUD::removeButton('save_and_edit');
        CRUD::removeButton('save_and_new');
        // CRUD::addSaveAction([
        //     'name' => 'save_action_one',
        //     'redirect' => function ($crud, $request, $itemId) {
        //         return $crud->route;
        //     }, // what's the redirect URL, where the user will be taken after saving?

        //     // OPTIONAL:
        //     'button_text' => 'Next', // override text appearing on the button
        //     // You can also provide translatable texts, for example:
        //     // 'button_text' => trans('backpack::crud.save_action_one'),
        //     'visible' => function ($crud) {
        //         if (request()->has('#')) {
        //             Log::info('Initial tab accessed: ' . request()->input('#'));
        //         }
        //         return true;
        //     }, // customize when this save action is visible for the current operation
        //     'referrer_url' => function ($crud, $request, $itemId) {
        //         return $crud->route;
        //     }, // override http_referrer_url
        //     'order' => 1, // change the order save actions are in
        // ]);

        CRUD::setFromDb(); // set fields from db columns.
        CRUD::setCreateView('vendor.backpack.crud.custom.ieraChecklist.create');
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
        CRUD::setCreateView('vendor.backpack.crud.custom.ieraChecklist.create');
    }

    public function export(Request $request)
    {
        // try {
        $collection = collect();
        $collection2 = collect();
        // dd($request->all());
        // retrieve data operation
        if (
            isset($request->report_id) &&
            ($request->report_id == 'pdf_001' || $request->report_id == 'excel_001')
        ) {
            $collection = IERAChecklist::with(['employee', 'task'])->find($request->entry_id);
            $collection2 = MDSForm::where('employee_id', $collection->employee->id)->first();
            $request->merge([
                'view' => 'reports.assessment.assessment_rpt_001',
                'titleReport' => __('IERA Checklist Report'),
            ]);
            // dd("test" . $collection);
        }
        // report type operation
        if ($request->report_id == 'pdf_001' || $request->report_id == 'assessment_pdf_002') {
            $request->merge([
                'reportType' => 'pdf',
            ]);
            $pdf = SnappyPdf::loadView($request['view'], [
                'data' => $collection,
                'data2' => $collection2,
                'request' => $request,
                'imageLink' => 'data:image/png;base64,' . base64_encode(file_get_contents('../public/favicon.ico')),
            ]);

            $pdf->setPaper('a4', 'portrait')
                ->setOption('footer-right', '[page]')
                ->setOrientation('portrait');
            return $pdf->inline('Expense Report -' . now() . '.pdf');
        }
        dd($request->all());

        // elseif ($request->report_id == 'excel_001' || $request->report_id == 'ageDebtor_excel_002') {
        //     $request->merge([
        //         'reportType' => 'xlsx',
        //     ]);
        //     return Excel::download(new ExcelExport($request, $collection), 'IERA Checklist Report.xlsx');
        // } else {
        //     return redirect()->back()->with('error');
        // }
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }
}
