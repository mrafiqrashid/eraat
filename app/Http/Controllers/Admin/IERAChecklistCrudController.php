<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\IERACheclist\AwkwardPosture;
use App\Http\Controllers\Admin\IERACheclist\Background;
use App\Http\Controllers\Admin\IERACheclist\Description;
use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion;
use App\Http\Controllers\Admin\IERACheclist\Lighting;
use App\Http\Controllers\Admin\IERACheclist\Noise;
use App\Http\Controllers\Admin\IERACheclist\RepetitiveMotion;
use App\Http\Controllers\Admin\IERACheclist\StaticAndSustainedWorkPosture;
use App\Http\Controllers\Admin\IERACheclist\Temperature;
use App\Http\Controllers\Admin\IERACheclist\Ventilation;
use App\Http\Controllers\Admin\IERACheclist\Vibration;
use App\Http\Middleware\CheckProjectSession;
use App\Http\Requests\IERAChecklistRequest;
use App\Models\IERAChecklist;
use App\Models\MDSForm;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;

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


    public function setupShowOperation()
    {
        $this->setupUpdateOperation();
        $entry = $this->crud->getCurrentEntry();
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

            'stylePrint_BTN' => 'btn btn-default border border-secondary',
            'defaultPrint_BTN' => true,
        ]);

        foreach ($this->crud->fields() as $field) {
            $attributes = $field['attributes'] ?? [];
            if (in_array($field['type'], ['radio', 'select', 'checkbox'])) {
                $attributes['disabled'] = 'disabled';
            } else {
                $attributes['readonly'] = 'readonly';
            }
            $value = $entry->{$field['name']} ?? ($field['value'] ?? null);
            $this->crud->modifyField($field['name'], [
                'attributes' => $attributes,
                'value' => $value,
            ]);
        }
        $this->crud->setOperationSetting('view', 'crud::custom_show');



        CRUD::removeField('employee_id');
        CRUD::field([
            'name' => 'employee_name',
            'type' => 'text',
            'value' => $entry->employee->name,
            'attributes' => ['readonly' => true]
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
        CRUD::setValidation(IERAChecklistRequest::class);
        CRUD::addFields(Background::get());
        CRUD::addFields(AwkwardPosture::get());
        CRUD::addFields(StaticAndSustainedWorkPosture::get());
        CRUD::addFields(ForcefulExertion::get());
        CRUD::addFields(RepetitiveMotion::get());
        CRUD::addFields(Vibration::get());
        CRUD::addFields(Lighting::get());
        CRUD::addFields(Temperature::get());
        CRUD::addFields(Ventilation::get());
        CRUD::addFields(Noise::get());
        CRUD::addFields(Description::get());

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
        CRUD::setCreateView('crud::custom.ieraChecklist.create');
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
        CRUD::setEditView('crud::custom.ieraChecklist.create');
    }

    // public function store(Request $request)
    // {
    //     dd($request->all());
    //     // // your additional operations before save here
    //     // $redirect_location = parent::storeCrud($request);
    //     // // your additional operations after save here
    //     // // use $this->data['entry'] or $this->crud->entry
    //     // return $redirect_location;
    // }

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
