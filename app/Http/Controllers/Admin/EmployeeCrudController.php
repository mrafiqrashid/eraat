<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\CheckProjectSession;
use App\Http\Requests\EmployeeRequest;
use App\Models\EducationLevel;
use App\Models\Employee;
use App\Models\MaritialStatus;
use App\Models\Project;
use App\Models\Race;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class EmployeeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EmployeeCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Employee::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/employee');
        CRUD::setEntityNameStrings('employee', 'employees');
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
        CRUD::addClause('where', 'project_id', session('filtered_project_id'));
        CRUD::button('back')->stack('top')->view('crud::buttons.goToProject')->position('end');
        CRUD::setFromDb(); // set columns from db columns.
        CRUD::removeColumn('passport_no');
        CRUD::removeColumn('created_by');
        CRUD::removeColumn('date_of_birth');
        CRUD::removeColumn('race_id');
        CRUD::removeColumn('maritial_status_id');
        CRUD::removeColumn('education_level_id');
        CRUD::removeColumn('gender');
        CRUD::removeColumn('work_start_time');
        CRUD::removeColumn('work_end_time');
        CRUD::removeColumn('total_working_hours');
        CRUD::removeColumn('project_id');


        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    protected function setupShowOperation()
    {

        $this->setupListOperation();
        CRUD::addColumn([
            'name' => 'project.name', // the accessor
            'label' => 'Project',
            'type' => 'text'
        ])->beforeColumn('name');
        CRUD::addColumn([
            'name' => 'race.race', // the accessor
            'label' => 'Race',
            'type' => 'text'
        ]);
        CRUD::addColumn('passport_no')->afterColumn('ic_no');
        CRUD::addColumn('date_of_birth')->afterColumn('passport_no');
        CRUD::addColumn('gender')->afterColumn('date_of_birth');
        CRUD::addColumn('work_start_time')->afterColumn('position');
        CRUD::addColumn('work_end_time')->afterColumn('work_start_time');

        CRUD::addColumn([
            'name' => 'educationLevel.education_level', // the accessor
            'label' => 'Education Level',
            'type' => 'text'
        ]);
        CRUD::addColumn([
            'name' => 'maritialStatus.maritial_status', // the accessor
            'label' => 'Maritial Status',
            'type' => 'text'
        ]);
        CRUD::addColumn([
            'name' => 'created_by',
            'label' => 'Created By',
            'type' => 'select',
            'entity' => 'user', // the method that defines the relationship in your Model
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
        if (session('filtered_project_id') == null) {
            return redirect()->route('project.index');
        }
        CRUD::setCreateView('vendor.backpack.assessee.create');
        CRUD::setValidation(EmployeeRequest::class);
        CRUD::addField([
            'name' => 'project_description',
            'label' => 'Project',
            'type' => 'text',
            'value' => Project::find(session('filtered_project_id'))->name,
            'wrapper' => [
                'class' => 'form-group col-md-12',
            ],
            'attributes' => [
                'readonly' => true,
                'disabled' => true
            ]
        ]);
        CRUD::field([
            'name' => 'name',
            'wrapper' => [
                'class' => 'form-group col-md-8',
            ]
        ]);
        CRUD::field([
            'name' => 'email',
            'type' => 'email',
            'wrapper' => [
                'class' => 'form-group col-md-2',
            ]
        ]);
        CRUD::field([
            'name' => 'contact_no',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-2',
            ]
        ]);
        CRUD::field([
            'name' => 'employee_no',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ]
        ]);
        CRUD::field([
            'name' => 'ic_no',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ]
        ]);
        CRUD::field([
            'name' => 'passport_no',
            'wrapper' => [
                'class' => 'form-group col-md-4',
            ]
        ]);
        CRUD::field([
            'name' => 'date_of_birth',
            'type' => 'date',
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
            'attributes' => [
                'id' => 'date_of_birth',
                'name' => 'date_of_birth',
            ]
        ]);
        CRUD::field([
            'name' => 'age',
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ],
            'attributes' => [
                'id' => 'age',
                'name' => 'age',
            ]
        ]);
        CRUD::field([
            'name' => 'gender',
            'type' => 'select_from_array',
            'options' => ['Male' => 'Male', 'Female' => 'Female'],
            'allows_null' => false,
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ]
        ]);

        CRUD::field([
            'name' => 'race_id',
            'type' => 'select_from_array',
            'options' => Race::all()->pluck('race', 'id')->toArray(),
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ]
        ]);
        CRUD::field([
            'name' => 'education_level_id',
            'type' => 'select_from_array',
            'options' => EducationLevel::all()->pluck('education_level', 'id')->toArray(),
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ]
        ]);
        CRUD::field([
            'name' => 'maritial_status_id',
            'type' => 'select_from_array',
            'options' => MaritialStatus::all()->pluck('maritial_status', 'id')->toArray(),
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ]
        ]);
        CRUD::field([
            'name' => 'company_name',
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ]
        ]);
        CRUD::field([
            'name' => 'department',
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ]
        ]);
        CRUD::field([
            'name' => 'position',
            'wrapper' => [
                'class' => 'form-group col-md-6',
            ]
        ]);
        CRUD::field([
            'name' => 'work_start_time',
            'type' => 'time',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'attributes' => [
                'id' => 'work_start_time',
                'name' => 'work_start_time',
            ]
        ]);
        CRUD::field([
            'name' => 'work_end_time',
            'type' => 'time',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'attributes' => [
                'id' => 'work_end_time',
                'name' => 'work_end_time',
            ]
        ]);


        CRUD::field([
            'name' => 'height',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ]
        ]);
        CRUD::field([
            'name' => 'weight',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ]
        ]);

        CRUD::field([
            'name' => 'total_working_hours',
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'attributes' => [
                'id' => 'total_working_hours',
                'name' => 'total_working_hours',
            ]
        ]);
        CRUD::field([
            'name' => 'total_working_hours_details',
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-3',
            ],
            'attributes' => [
                'id' => 'total_working_hours_details',
                'name' => 'total_working_hours_details',
            ]
        ]);
        CRUD::field([
            'name' => 'project_id',
            'value' => session('filtered_project_id'),
            'type' => 'hidden',
        ]);
        CRUD::field([
            'name' => 'created_by',
            'value' => backpack_user()->id,
            'type' => 'hidden',
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
    public function getGender(Request $request)
    {
        $gender = Employee::where('id', $request->employee_id)->first(['gender']);
        Log::info($gender);

        return response()->json($gender);
    }
}
