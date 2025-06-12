<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;



class Lighting
{
    public static function get()
    {
        return [
            [
                'name'  => 'lighting_section',
                'type'  => 'custom_html',
                'value' => '<h2 class="fw-bolder">Section: Lighting</h2>',
                'wrapper' => [
                    'class' => 'form-group col-md-12  pt-5'
                ],
                'tab' => 'Lighting'
            ],
            [
                'name'  => 'lighting_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-10">Physical Risk Factor</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-10'
                ],
                'tab' => 'Lighting'
            ],
            [
                'name'  => 'lighting_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Lighting'
            ],
            [
                'name'  => 'lighting_question_1_subheader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-10">Inadequate lighting</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-10'
                ],
                'tab' => 'Lighting'
            ],
            [
                'name'  => 'lighting_question_1',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'lighting_question_1',
                    'name' => 'lighting_question_1',
                ],
                'tab' => 'Lighting'
            ],
            [
                'name'  => 'lighting_score_spacer',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-10',
                ],
                'tab' => 'Lighting'
            ],
            [
                'name'  => 'lighting_score',
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
                    'id' => 'lighting_score',
                    'name' => 'lighting_score',
                    'readonly' => true
                ],
                'tab' => 'Lighting'
            ],

        ];
    }
}
