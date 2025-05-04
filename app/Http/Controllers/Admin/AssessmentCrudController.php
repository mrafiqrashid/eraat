<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AssessmentRequest;
use App\Models\Assessee;
use App\Models\Project;
use App\Models\Task;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

/**
 * Class AssessmentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AssessmentCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Assessment::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/assessment');
        CRUD::setEntityNameStrings('assessment', 'assessments');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column([
            'name' => 'project.name',
            'label' => 'Project',
            'type' => 'text'
        ]);
        CRUD::column([
            'name' => 'assessee.name',
            'label' => 'Assessee',
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

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        CRUD::addButtonFromView('line', 'print', 'view', 'beginning');
    }



    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AssessmentRequest::class);
        CRUD::addField([
            'name' => 'project_id',
            'type' => 'hidden',
            'value' => session('filtered_project_id'),
            'label' => 'Project test',
        ]);
        Log::info("project id", [session('filtered_project_id')]);
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
            'name' => 'assessee_id',
            'type' => 'select_from_array',
            'options' => Assessee::where('project_id', session('filtered_project_id'))
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
            'name'  => 'awkward_posture_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="font-weight-bold">Section: Awkward Posture</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'body_part_header',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Body Part</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_header',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Physical Risk Factor</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_header',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Maximum Exposure Duration (Continuously or cumulatively)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_header',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Illustration</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'please_choose_header',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Please Choose (Yes/No)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);

        CRUD::addField([
            'name'  => 'body_part_subHeader1',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Shoulders</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subheader1',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with hand above the head OR the elbow above the shoulder</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subheader1',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subheader1',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_1',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);


        CRUD::addField([
            'name'  => 'body_part_subHeader2',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subheader2',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with shoulder raised</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subheader2',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subheader2',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_2',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'body_part_subHeader3',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subheader3',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work repetitvely by raising the hand above the head OR the elbow above the shoulder more than once per minute</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subheader3',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subheader3',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_3',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);



        CRUD::addField([
            'name'  => 'body_part_subHeader4',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Head</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader4',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with head bent downwards more than 45 degrees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader4',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader4',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_4',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);





        CRUD::addField([
            'name'  => 'body_part_subHeader5',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader5',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with head bent backwards</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader5',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader5',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_5',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'body_part_subHeader6',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader6',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with head bent sideways</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader6',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader6',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_6',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);





        CRUD::addField([
            'name'  => 'body_part_subHeader7',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Back</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader7',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with back bent forward more than 30 degrees OR bent sideways</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader7',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader7',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_7',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);


        CRUD::addField([
            'name'  => 'body_part_subHeader8',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader8',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with body twisted</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader8',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader8',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_8',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'body_part_subHeader9',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Hand/ Elbow/ Wrist</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader9',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with wrist flexion OR extension OR radial deviation more than 15 degrees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader9',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader9',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_9',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);


        CRUD::addField([
            'name'  => 'body_part_subHeader10',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader10',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with arm abducted sideways</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader10',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 4 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader10',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_10',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'body_part_subHeader11',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader11',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Working with arm extended forward more than 45 degrees OR arm extended backward more than 20 degrees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader11',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader11',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_11',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);




        CRUD::addField([
            'name'  => 'body_part_subHeader12',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Leg/ Knees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader12',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work in a squat position</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader12',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader12',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_12',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);





        CRUD::addField([
            'name'  => 'body_part_subHeader13',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader13',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work in a kneeling position</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader13',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader13',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_13',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Awkward Posture'
        ]);





        CRUD::addField([
            'name'  => 'static_sustained_work_posture_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="font-weight-bold">Section: Static and Sustained Work Posture</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);

        CRUD::addField([
            'name'  => 'body_part_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Body Part</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Physical Risk Factor</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Maximum Exposure Duration (Continuously or cumulatively)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Illustration</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'please_choose_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Please Choose (Yes/No)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);


        CRUD::addField([
            'name'  => 'body_part_subHeader14',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Trunk/ Head/ Neck/ Arm/ Wrist</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader14',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work in a static awkward position as in Table 3.1</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader14',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Duration as per Table 3.1</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader14',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_14',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);






        CRUD::addField([
            'name'  => 'body_part_subHeader15',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Leg/ Knees</p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader15',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work in a standing position with minimal leg movement</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader15',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours continously</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader15',
            'type'  => 'custom_html',
            'value' => '<p class="mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_15',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);







        CRUD::addField([
            'name'  => 'body_part_subHeader16',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name' => 'physical_risk_factor_subHeader16',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work in a seated position with minimal movement</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'max_exposure_duration_subHeader16',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 30 minutes continously</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'illustration_subHeader16',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-3">Illustration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);
        CRUD::addField([
            'name'  => 'question_16',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Static & Sustained Work Posture'
        ]);





        CRUD::addField([
            'name'  => 'forceful_exertion_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="font-weight-bold">Section: Forceful Exertion</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12 pt-5'
            ],
            'tab' => 'Forceful Exertion'
        ]);



        CRUD::addField([
            'name'  => 'gender',
            'label' => 'Gender',
            'type' => 'select_from_array',
            'options'     => [1 => 'Male', 2 => 'Female'],
            'allows_null' => false,
            'default'     => 1,
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'spacer',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_subheader1',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Working Height</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name' => 'fe_subheader2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Any lifting and/or lowering?</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_subheader3',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Current weight hendled</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);






        CRUD::addField([
            'name' => 'fe_category_1',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Between floor to mid-lower leg</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);


        CRUD::addField([
            'name'  => 'fe_question_1a',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);

        CRUD::addField([
            'name'  => 'fe_question_1b',
            'label' => false,
            'type' => 'number',
            'default' => 0,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);





        CRUD::addField([
            'name' => 'fe_category_2',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Between mid-lower leg to knuckle</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_question_2a',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_question_2b',
            'label' => false,
            'type' => 'number',
            'default' => 0,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);




        CRUD::addField([
            'name' => 'fe_category_3',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Between knuckle height and elbow</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_question_3a',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_question_3b',
            'label' => false,
            'type' => 'number',
            'default' => 0,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);







        CRUD::addField([
            'name' => 'fe_category_4',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Between elbow to shoulder</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_question_4a',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_question_4b',
            'label' => false,
            'type' => 'number',
            'default' => 0,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);



        CRUD::addField([
            'name' => 'fe_category_5',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Above the shoulder</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_question_5a',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'fe_question_5b',
            'label' => false,
            'type' => 'number',
            'default' => 0,
            'attributes' => [
                'min' => 0,
            ],
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-4'
            ],
            'tab' => 'Forceful Exertion'
        ]);






        CRUD::addField([
            'name'  => 'fe_spacer2',
            'type'  => 'custom_html',
            'value' => '&nbsp;',
            'wrapper' => [
                'class' => 'form-group col-md-10',
            ],
            'tab' => 'Forceful Exertion'
        ]);
        CRUD::addField([
            'name'  => 'question_17',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Forceful Exertion'
        ]);



        CRUD::addField([
            'name'  => 'repetitive_motion_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="font-weight-bold">Section: Repettive Motion</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Repetitive Motion'
        ]);





        CRUD::addField([
            'name'  => 'repetitive_motion_header1',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-3">Body Part</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-4">Physical Risk Factor</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_header3',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-3">Maximum Exposure Duration</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_header4',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Please Choose (Yes/No)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Repetitive Motion'
        ]);





        CRUD::addField([
            'name'  => 'repetitive_motion_question_18a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Neck, shoulders, elboow, wrists, hands, knee</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_question_18b',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work invloving repetitive sequence of movement more than twice per minute</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_question_18c',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 3 hours on a "normal" workday OR More than 1 hour continously without a break</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'question_18',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Repetitive Motion'
        ]);




        CRUD::addField([
            'name'  => 'repetitive_motion_question_19a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_question_19b',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work invloving intensive use of the fingers, hands or wrists or work involving intensive data entry (key-in)</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_question_19c',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 3 hours on a "normal" workday OR More than 1 hour continously without a break</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'question_19',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Repetitive Motion'
        ]);








        CRUD::addField([
            'name'  => 'repetitive_motion_question_20a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_question_20b',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work invloving repetitive shoulder/arm movement with some pauses OR continously shoulder/ arm movement</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_question_20c',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 3 hours on a "normal" workday OR More than 1 hour continously without a break</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'question_20',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Repetitive Motion'
        ]);








        CRUD::addField([
            'name'  => 'repetitive_motion_question_21a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_question_21b',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work using the heel/ base of palm as a "hammer" more than once per minute</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_question_21c',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'question_21',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Repetitive Motion'
        ]);








        CRUD::addField([
            'name'  => 'repetitive_motion_question_22a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_question_22b',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work using the knee as a "hammer" more than once per minute</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Repetitive Motion'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_question_22c',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 2 hours per day</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Repetitive Motion'
        ]);

        CRUD::addField([
            'name'  => 'question_22',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Repetitive Motion'
        ]);











        // title vibration 
        CRUD::addField([
            'name'  => 'vibration_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="font-weight-bold">Section: Vibration</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Vibration'
        ]);





        CRUD::addField([
            'name'  => 'vibration_header1',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-3">Body Part</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'vibration_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-4">Physical Risk Factor</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'vibration_header3',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-3">Maximum Exposure Duration</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'vibration_header4',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Please Choose (Yes/No)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Vibration'
        ]);





        CRUD::addField([
            'name'  => 'repetitive_motion_question_23a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Hand-Arm (segmental vibration)</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_question_23b',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work using power tools (ie: battery powered/ electical pneumatic/ hydraulic) <span class="text-decoration-underline">without</span> PPE*</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_question_23c',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 50 minutes in an hour</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);

        CRUD::addField([
            'name'  => 'question_23',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Vibration'
        ]);




        CRUD::addField([
            'name'  => 'repetitive_motion_question_24a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_question_24b',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work using power tools (ie: battery powered/ electrical pneumatic/ hydraulic) <span class="text-decoration-underline">with</span> PPE*</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_question_24c',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 5 hours in 8 hours shift work</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);

        CRUD::addField([
            'name'  => 'question_24',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Vibration'
        ]);








        CRUD::addField([
            'name'  => 'repetitive_motion_question_25a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Whole body vibration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_question_25b',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work invloving exposure to whole body vibration</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_question_25c',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 5 hours in 8 hours shift work</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);

        CRUD::addField([
            'name'  => 'question_25',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Vibration'
        ]);








        CRUD::addField([
            'name'  => 'repetitive_motion_question_26a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2"></p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name' => 'repetitive_motion_question_26b',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">Work involving exposure to whole body vibration combined employee complaint of excessive body shaking</p>',
            'wrapper' => [
                'class' => 'form-group col-md-4'
            ],
            'tab' => 'Vibration'
        ]);
        CRUD::addField([
            'name'  => 'repetitive_motion_question_26c',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-2">More than 3 hours in 8 hours shift work</p>',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ],
            'tab' => 'Vibration'
        ]);

        CRUD::addField([
            'name'  => 'question_26',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Vibration'
        ]);




        // title Lighting
        CRUD::addField([
            'name'  => 'lighting_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="font-weight-bold">Section: Lighting</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Lighting'
        ]);






        CRUD::addField([
            'name'  => 'lighting_header1',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-10">Physical Risk Factor</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Lighting'
        ]);

        CRUD::addField([
            'name'  => 'lighting_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Please Choose (Yes/No)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Lighting'
        ]);










        CRUD::addField([
            'name'  => 'lighting_question_27a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-10">Inadequate lighting</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Lighting'
        ]);


        CRUD::addField([
            'name'  => 'question_27',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Lighting'
        ]);




        // title temperature
        CRUD::addField([
            'name'  => 'temperature_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="font-weight-bold">Section: Temperature</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Temperature'
        ]);

        CRUD::addField([
            'name'  => 'temperature_header1',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-10">Physical Risk Factor</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Temperature'
        ]);

        CRUD::addField([
            'name'  => 'temperature_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Please Choose (Yes/No)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Temperature'
        ]);


        CRUD::addField([
            'name'  => 'temperature_question_28a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-10">Extreme temperature (hot/ cold)</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Temperature'
        ]);


        CRUD::addField([
            'name'  => 'question_28',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Temperature'
        ]);










        // title ventilation
        CRUD::addField([
            'name'  => 'ventilation_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="font-weight-bold">Section: Ventilation</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Ventilation'
        ]);

        CRUD::addField([
            'name'  => 'ventilation_header1',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-10">Physical Risk Factor</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Ventilation'
        ]);

        CRUD::addField([
            'name'  => 'ventilation_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Please Choose (Yes/No)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Ventilation'
        ]);


        CRUD::addField([
            'name'  => 'ventilation_question_29a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-10">Inadequate air ventilation</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Ventilation'
        ]);


        CRUD::addField([
            'name'  => 'question_29',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Ventilation'
        ]);







        // title noise
        CRUD::addField([
            'name'  => 'noise_section',
            'type'  => 'custom_html',
            'value' => '<h2 class="font-weight-bold">Section: Noise</h2>',
            'wrapper' => [
                'class' => 'form-group col-md-12  pt-5'
            ],
            'tab' => 'Noise'
        ]);

        CRUD::addField([
            'name'  => 'noise_header1',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-10">Physical Risk Factor</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Noise'
        ]);

        CRUD::addField([
            'name'  => 'noise_header2',
            'type'  => 'custom_html',
            'value' => '<h3 class="font-weight-bold mb-2">Please Choose (Yes/No)</h3>',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ],
            'tab' => 'Noise'
        ]);


        CRUD::addField([
            'name'  => 'noise_question_30a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-10">Noise exposure above Permissible Exposure Limit (PEL) (based on previous reports or measurement)</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Noise'
        ]);


        CRUD::addField([
            'name'  => 'question_30',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Noise'
        ]);


        CRUD::addField([
            'name'  => 'noise_question_31a',
            'type'  => 'custom_html',
            'value' => '<p class="font-weight-bold mb-10">Exposure to annoying or excessive noise during working hours</p>',
            'wrapper' => [
                'class' => 'form-group col-md-10'
            ],
            'tab' => 'Noise'
        ]);


        CRUD::addField([
            'name'  => 'question_31',
            'label' => false,
            'type'        => 'select_from_array',
            'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
            'allows_null' => false,
            'default'     => 0,
            'wrapper' => [
                'class' => 'form-group d-flex align-self-start col-md-2'
            ],
            'tab' => 'Noise'
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

    public function assessmentPrint(Request $request)
    {
        
    }
}
