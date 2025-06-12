<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;

class Background
{
    public static function get()
    {
        return [
            [
                'name' => 'project_id',
                'type' => 'hidden',
                'value' => session('filtered_project_id'),
                'label' => 'Project test',
            ],
            [
                'name' => 'project_name',
                'label' => 'Project name',
                'type' => 'text',
                'default' => Project::find(session('filtered_project_id'))->name,
                'wrapper' => [
                    'class' => 'form-group col-md-12 mb-5',
                    'readonly' => 'readonly'
                ],
                'attributes' => [
                    'readonly' => true
                ],
            ],
            [
                'name' => 'task_id',
                'type' => 'select_from_array',
                'options' => ['' => 'Select a task'] + Task::where('project_id', session('filtered_project_id'))
                    ->pluck('name', 'id')
                    ->toArray(),
                'wrapper' => ['class' => 'col-5'],
            ],
            [
                'name' => 'employee_id',
                'type' => 'select_from_array',
                'options' => ['' => 'Select an employee'] + Employee::where('project_id', session('filtered_project_id'))
                    ->pluck('name', 'id')
                    ->toArray(),
                'attributes' => [
                    'id' => 'employee_id',
                    'name' => 'employee_id',
                ],
                'wrapper' => ['class' => 'col-5'],
            ],
            [
                'name'  => 'fe_bc_1_gender',
                'label' => 'Gender',
                'type' => 'select_from_array',
                'options' => [
                    '' => 'Please select an employee',
                    'Male' => 'Male',
                    'Female' => 'Female'
                ],
                'allow_null' => false,
                'attributes' => [
                    'id' => 'fe_bc_1_gender',
                    'name' => 'fe_bc_1_gender',
                    'disabled' => true
                ],
                'wrapper' => ['class' => 'col-2'],
            ],
            [
                'name' => 'created_by',
                'type' => 'hidden',
                'value' => backpack_auth()->user()->id
            ]
        ];
    }
}
