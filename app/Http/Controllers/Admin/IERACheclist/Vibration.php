<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;



class Vibration
{
    public static function get()
    {
        return [
            [
                'name'  => 'vibration_section',
                'type'  => 'custom_html',
                'value' => '<h2 class="fw-bolder">Section: Vibration</h2>',
                'wrapper' => [
                    'class' => 'form-group col-md-12  pt-5'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-3">Body Part</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name' => 'vibration_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-4">Physical Risk Factor</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-3">Maximum Exposure Duration</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_header_4',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_1_subheader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Hand-Arm (segmental vibration)</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name' => 'vibration_question_1_subheader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work using power tools (ie: battery powered/ electical pneumatic/ hydraulic) <span class="text-decoration-underline">without</span> PPE*</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_1_subheader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 50 minutes in an hour</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_1',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'vibration_question_1',
                    'name' => 'vibration_question_1',
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_2_subheader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2"></p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name' => 'vibration_question_2_subheader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work using power tools (ie: battery powered/ electrical pneumatic/ hydraulic) <span class="text-decoration-underline">with</span> PPE*</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_2_subheader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 5 hours in 8 hours shift work</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_2',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'vibration_question_2',
                    'name' => 'vibration_question_2',
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_3_subheader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Whole body vibration</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name' => 'vibration_question_3_subheader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work invloving exposure to whole body vibration</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_3_subheader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 5 hours in 8 hours shift work</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_3',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'vibration_question_3',
                    'name' => 'vibration_question_3',
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_4_subheader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2"></p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name' => 'vibration_question_4_subheader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work involving exposure to whole body vibration combined employee complaint of excessive body shaking</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_4_subheader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 3 hours in 8 hours shift work</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_question_4',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'vibration_question_4',
                    'name' => 'vibration_question_4',
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_score_spacer',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-10',
                ],
                'tab' => 'Vibration'
            ],
            [
                'name'  => 'vibration_score',
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
                    'id' => 'vibration_score',
                    'name' => 'vibration_score',
                    'readonly' => true
                ],
                'tab' => 'Vibration'
            ],
        ];
    }
}
