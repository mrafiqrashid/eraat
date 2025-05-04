<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Models\ProjectStatus;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class ProjectCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProjectCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Project::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/project');
        CRUD::setEntityNameStrings('project', 'projects');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
        CRUD::column([
            'name' => 'duration_formatted',
            'label' => 'Duration',
        ])->after('end_date');
        CRUD::removeColumn('duration');
        CRUD::column([
            'name' => 'status.project_status', // the relationship.column_name
            'label' => 'Status', // the column label you want to show
            'type' => 'text',
        ]);
        CRUD::removeColumn('status_id');
        CRUD::removeColumn('created_by');
        CRUD::addButtonFromView('line', 'goToAssessment', 'goToAssessment', 'beginning');
        CRUD::addButtonFromView('line', 'goToTask', 'goToTask', 'beginning');
        CRUD::addButtonFromView('line', 'goToAssessee', 'goToAssessee', 'beginning');
        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        CRUD::addColumn([
            'name' => 'created_by',
            'label' => 'Created By',
            'type' => 'select',
            'entity' => 'users', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => User::class, // foreign key model
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setCreateView('vendor.backpack.project.create');
        CRUD::setValidation(ProjectRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field([
            'name' => 'start_date',
            'type' => 'date',
            'attributes' =>
            [
                'id' => 'start_date',
                'name' => 'start_date',
            ],
            'wrapper' =>
            [
                'class' => 'form-group col-md-6',
            ]
        ]);
        CRUD::field([
            'name' => 'end_date',
            'type' => 'date',
            'attributes' =>
            [
                'id' => 'end_date',
                'name' => 'end_date',
            ],
            'wrapper' =>
            [
                'class' => 'form-group col-md-6',
            ]

        ]);
        CRUD::field([
            'name' => 'duration',
            'type' => 'number',
            'attributes' =>
            [
                'id' => 'duration',
                'name' => 'duration',
                'readonly' => 'readonly',

            ]
        ]);
        CRUD::field([
            'name' => 'duration_details',
            'type' => 'text',
            'attributes' =>
            [
                'id' => 'duration_details',
                'name' => 'duration_details',
                'readonly' => 'readonly',
            ]
        ]);


        CRUD::field([
            'name' => 'status_id',
            'type' => 'select_from_array',
            'options' => ProjectStatus::all()->pluck('project_status', 'id')->toArray(),

        ]);
        CRUD::field([
            'name' => 'created_by',
            'type' => 'hidden',
            'value' => backpack_user()->id,
        ]);
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

    public function projectMore(Request $request)
    {
        // Store project_id in session or use as needed
        session(['filtered_project_id' => ($request->project_id ?? 0)]);

        // Redirect to the car list page
        return view('vendor.backpack.project.more');
    }

    public function taskList(Request $request)
    {
        // Store project_id in session or use as needed
        session(['filtered_project_id' => ($request->project_id ?? 0)]);

        // Redirect to the car list page
        return redirect()->route('task.index');
    }

    public function assesseeList(Request $request)
    {
        // Store project_id in session or use as needed
        session(['filtered_project_id' => ($request->project_id ?? 0)]);

        // Redirect to the car list page
        return redirect()->route('assessee.index');
    }
    public function assessmentList(Request $request)
    {
        session(['filtered_project_id' => ($request->project_id ?? 0)]);
        return redirect()->route('assessment.index');
    }

    
}
