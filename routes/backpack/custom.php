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
    Route::crud('awkward-posture', 'AwkwardPostureCrudController');
    Route::crud('static-sustained-work-posture', 'StaticSustainedWorkPostureCrudController');
    Route::crud('forceful-exertion', 'ForcefulExertionCrudController');
    Route::crud('repetitive-motion', 'RepetitiveMotionCrudController');
    Route::crud('vibration', 'VibrationCrudController');
    Route::crud('lighting', 'LightingCrudController');
    Route::crud('temperature', 'TemperatureCrudController');
    Route::crud('ventilation', 'VentilationCrudController');
    Route::crud('noise', 'NoiseCrudController');
    Route::crud('musculoskeletal', 'MusculoskeletalCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
