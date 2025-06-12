<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;



class RepetitiveMotion
{
    public static function get()
    {
        return [
            [
                'name'  => 'rm_section',
                'type'  => 'custom_html',
                'value' => '<h2 class="fw-bolder">Section: Repettive Motion</h2>',
                'wrapper' => [
                    'class' => 'form-group col-md-12  pt-5'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-3">Body Part</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name' => 'rm_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-4">Physical Risk Factor</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-3">Maximum Exposure Duration</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_header_4',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_1_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Neck, shoulders, elboow, wrists, hands, knee</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name' => 'rm_question_1_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work invloving repetitive sequence of movement more than twice per minute</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_1_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 3 hours on a "normal" workday OR More than 1 hour continously without a break</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],

            [
                'name'  => 'rm_question_1',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'rm_question_1',
                    'name' => 'rm_question_1',
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_2_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2"></p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name' => 'rm_question_2_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work invloving intensive use of the fingers, hands or wrists or work involving intensive data entry (key-in)</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_2_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 3 hours on a "normal" workday OR More than 1 hour continously without a break</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],

            [
                'name'  => 'rm_question_2',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'rm_question_2',
                    'name' => 'rm_question_2',
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_3_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2"></p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name' => 'rm_question_3_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work invloving repetitive shoulder/arm movement with some pauses OR continously shoulder/ arm movement</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_3_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 3 hours on a "normal" workday OR More than 1 hour continously without a break</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_3',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'rm_question_3',
                    'name' => 'rm_question_3',
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_4_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2"></p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name' => 'rm_question_4_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work using the heel/ base of palm as a "hammer" more than once per minute</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_4_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],

            [
                'name'  => 'rm_question_4',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'rm_question_4',
                    'name' => 'rm_question_4',
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_5_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2"></p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name' => 'rm_question_5_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work using the knee as a "hammer" more than once per minute</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_question_5_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Repetitive Motion'
            ],

            [
                'name'  => 'rm_question_5',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'rm_question_5',
                    'name' => 'rm_question_5',
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_score_spacer',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-10',
                ],
                'tab' => 'Repetitive Motion'
            ],
            [
                'name'  => 'rm_score',
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
                    'id' => 'rm_score',
                    'name' => 'rm_score',
                    'readonly' => true
                ],
                'tab' => 'Repetitive Motion'
            ],
        ];
    }
}
