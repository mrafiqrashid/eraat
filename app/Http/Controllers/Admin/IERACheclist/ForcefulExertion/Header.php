<?php

// app/Http/Controllers/Admin/IERACheclist/ForcefulExertion/ForcefulExertion2.php
namespace App\Http\Controllers\Admin\IERACheclist\ForcefulExertion;



class Header
{
    public static function getFields()
    {
        return [
            [
                'name'  => 'fe_section',
                'type'  => 'custom_html',
                'value' => '<h2 class="fw-bolder">Section: Forceful Exertion</h2>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
                ],
                'tab' => 'Forceful Exertion'
            ],
        ];
    }
}
