<?php

// app/Http/Controllers/Admin/IERACheclist/ForcefulExertion/ForcefulExertion2.php
namespace App\Http\Controllers\Admin\IERACheclist\ForcefulExertion;



class Score
{
    public static function getFields()
    {
        return [
            [   // CustomHTML
                'name'  => 'separator_2',
                'type'  => 'custom_html',
                'value' => '<hr>',

                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_score_spacer',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-10',
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_score',
                'label' => false,
                'type'        => 'number',
                'attributes' => [
                    'readonly' => true
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'fe_score',
                    'name' => 'fe_score',
                    'readonly' => true
                ],
                'tab' => 'Forceful Exertion'
            ],
        ];
    }
}
