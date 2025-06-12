<?php

// app/Http/Controllers/Admin/IERACheclist/ForcefulExertion/ForcefulExertion2.php
namespace App\Http\Controllers\Admin\IERACheclist\ForcefulExertion;



class RepetitiveLiftingAndLoweringWithTwistedBodyPosture
{
    public static function getFields()
    {
        return [
            [
                'name'  => 'fe_rlltbp_subSection',
                'type'  => 'custom_html',
                'value' => '<h3 class="fw-bolder">Repetitive Lifting and Lowering with Twisted Body Posture</h3>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Working Height</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Close to body</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-5'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Far from body</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Forceful Exertion'
            ],



            [
                'name'  => 'fe_rlltbp_question_1_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Above the shoulder</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_1a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_1a_rw',
                    'name' => 'fe_rlltbp_question_1a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_1a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? - 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? - 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_1a',
                    'name' => 'fe_rlltbp_question_1a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_1b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_1b_rw',
                    'name' => 'fe_rlltbp_question_1b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_1b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? - 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? - 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_1b',
                    'name' => 'fe_rlltbp_question_1b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_rlltbp_question_2_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between elbow to shoulder</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_2a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_2a_rw',
                    'name' => 'fe_rlltbp_question_2a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_2a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_2a',
                    'name' => 'fe_rlltbp_question_2a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_2b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_2b_rw',
                    'name' => 'fe_rlltbp_question_2b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_2b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_2b',
                    'name' => 'fe_rlltbp_question_2b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_rlltbp_question_3_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between knuckle height and elbow</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_3a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_3a_rw',
                    'name' => 'fe_rlltbp_question_3a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_3a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_3a',
                    'name' => 'fe_rlltbp_question_3a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_3b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_3b_rw',
                    'name' => 'fe_rlltbp_question_3b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_3b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_3b',
                    'name' => 'fe_rlltbp_question_3b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_rlltbp_question_4_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between mid-lower leg to knuckle</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_4a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_4a_rw',
                    'name' => 'fe_rlltbp_question_4a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_4a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_4a',
                    'name' => 'fe_rlltbp_question_4a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_4b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_4b_rw',
                    'name' => 'fe_rlltbp_question_4b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_4b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_4b',
                    'name' => 'fe_rlltbp_question_4b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_rlltbp_question_5_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_5a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_5a_rw',
                    'name' => 'fe_rlltbp_question_5a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_5a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_5a',
                    'name' => 'fe_rlltbp_question_5a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_5b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_5b_rw',
                    'name' => 'fe_rlltbp_question_5b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_question_5b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => 'Employee twists body from forward facing to the side? 45 degrees',
                    2 => 'Employee twists body from forward facing to the side? 90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-start'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_question_5b',
                    'name' => 'fe_rlltbp_question_5b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_rw_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_rlltbp_rw_spacer_2',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-10',
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rlltbp_score',
                'label' => 'Score',
                'type'        => 'number',
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-2 fw-bold d-flex align-items-center gap-2'
                ],
                'attributes' => [
                    'id' => 'fe_rlltbp_score',
                    'name' => 'fe_rlltbp_score',
                    'readonly' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
        ];
    }
}
