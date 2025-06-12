<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;

use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion\Carrying;
use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion\Header;
use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion\LiftingAndLowering;
use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion\LiftingAndLoweringWithTwistedBodyPosture;
use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion\PushingAndPulling;
use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion\HandlingInSeatedPosition;
use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion\RepetitiveLiftingAndLowering;
use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion\RepetitiveLiftingAndLoweringWithTwistedBodyPosture;
use App\Http\Controllers\Admin\IERACheclist\ForcefulExertion\Score;

class ForcefulExertion
{
    public static function get()
    {
        return array_merge(
            Header::getFields(),
            LiftingAndLowering::getFields(),
            RepetitiveLiftingAndLowering::getFields(),
            LiftingAndLoweringWithTwistedBodyPosture::getFields(),
            RepetitiveLiftingAndLoweringWithTwistedBodyPosture::getFields(),
            PushingAndPulling::getFields(),
            HandlingInSeatedPosition::getFields(),
            Carrying::getFields(),
            Score::getFields(),
        );
    }
}
