<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AwkwardPostureRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AwkwardPostureCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AwkwardPostureCrudController extends CrudController
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
        CRUD::setModel(\App\Models\AwkwardPosture::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/awkward-posture');
        CRUD::setEntityNameStrings('awkward posture', 'awkward postures');
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
        CRUD::setValidation(AwkwardPostureRequest::class);
        CRUD::addField([
            'name' => 'title1',
            'label' => 'Body Part',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ]
        ]);
        CRUD::addField([
            'name' => 'title2',
            'label' => 'Physical Risk Factor',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ]
        ]);
        CRUD::addField([
            'name' => 'title3',
            'label' => 'Maximum Exposure Duration (Continuously or cumulatively)',
            'wrapper' => [
                'class' => 'form-group col-md-2'
            ]
        ]);
        CRUD::addField([
            'name' => 'title4',
            'label' => 'Illustration',
            'wrapper' => [
                'class' => 'form-group col-md-3'
            ]
        ]);
        CRUD::addField([
            'name' => 'title5',
            'label' => 'Please Tick',
            'wrapper' => [
                'class' => 'form-group col-md-1'
            ]
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
}
