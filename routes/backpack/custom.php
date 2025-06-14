<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('project', 'ProjectCrudController');
    Route::post('project/projectMore', 'ProjectCrudController@projectMore')->name('projectMore');
    Route::post('project/export', 'ProjectCrudController@export')->name('ageDebtor_export');
    Route::crud('assessment', 'AssessmentCrudController');
    Route::post('assessment/assessment_export', 'AssessmentCrudController@export')->name('assessment_export');
    Route::crud('task', 'TaskCrudController');
    Route::crud('project-status', 'ProjectStatusCrudController');
    Route::crud('assessee', 'AssesseeCrudController');
    Route::crud('race', 'RaceCrudController');
    Route::crud('education-level', 'EducationLevelCrudController');
    Route::crud('maritial-status', 'MaritialStatusCrudController');
    Route::crud('mdsForm', 'MDSFormCrudController');
    Route::post('mdsForm/mdsForm_export', 'MDSFormCrudController@export')->name('mdsForm_export');
    Route::crud('employee', 'EmployeeCrudController');
    Route::post('employee/getGender', 'EmployeeCrudController@getGender')->name('getGender');
    Route::crud('cmdQuestionnaire', 'CMDQuestionnaireCrudController');
    Route::post('cmdQuestionnaire/cmdQuestionnaire_export', 'CMDQuestionnaireCrudController@export')->name('cmdQuestionnaire_export');
    Route::crud('ieraChecklist', 'IERAChecklistCrudController');
    Route::post('ieraChecklist/ieraChecklist_export', 'AssessmentCrudController@export')->name('ieraChecklist_export');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
