<?php

namespace App\Http\Controllers\Admin;

use App\Http\Middleware\CheckProjectSession;
use App\Http\Requests\TaskRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Log;

/**
 * Class TaskCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TaskCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Task::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/task');
        CRUD::setEntityNameStrings('task', 'tasks');
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
        $projectId = session('filtered_project_id');
        if ($projectId) {
            CRUD::addClause('where', 'project_id', $projectId);
        } else {
            CRUD::addClause('where', 'project_id', 0);
        }

        CRUD::button('back')->stack('top')->view('crud::buttons.goToProject')->position('end');
        CRUD::setFromDb(); // set columns from db columns.
        CRUD::removeColumn('project_id');
        CRUD::removeColumn('created_by');


        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    protected function setupShowOperation()
    {
        $this->setupListOperation();
        CRUD::column([
            'name' => 'project.name', // the accessor
            'label' => 'Project',
            'type' => 'text'
        ]);
        CRUD::column([
            'name' => 'user.name', // the accessor
            'label' => 'Created By',
            'type' => 'text'
        ]);
        CRUD::column([
            'name' => 'created_at',
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
        CRUD::setValidation(TaskRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field([
            'name' => 'description',
            'type' => 'textarea',
        ]);
        CRUD::field([
            'name' => 'project_id',
            'type' => 'hidden',
            'value' => session('filtered_project_id')
        ]);
        CRUD::field([
            'name' => 'created_by',
            'type' => 'hidden',
            'value' => backpack_user()->id
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
}
