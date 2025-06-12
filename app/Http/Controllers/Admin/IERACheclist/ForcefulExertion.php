<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;



class ForcefulExertion
{
    public static function get()
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


            [
                'name'  => 'fe_ll_subSection',
                'type'  => 'custom_html',
                'value' => '<h3 class="fw-bolder">Lifting and Lowering</h3>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_ll_rw_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_rw',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/fe_ll_rw.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_rw_spacer_2',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_ll_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Working Height</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name' => 'fe_ll_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Close to body</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Far from body</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4 text-center'
                ],
                'tab' => 'Forceful Exertion'
            ],






            [
                'name' => 'fe_ll_question_1_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Above the shoulder</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_ll_question_1a_rw',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_1a_rw',
                    'name' => 'fe_ll_question_1a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_ll_question_1a',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_1a',
                    'name' => 'fe_ll_question_1a',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [   // Checkbox
                'name'  => 'fe_ll_question_1a_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'default' => false,
                'attributes' => [
                    'id' => 'fe_ll_question_1a_applicable',
                    'name' => 'fe_ll_question_1a_applicable',
                    'value' => 1,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex justify-content-start align-self-center col-md-1',
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_question_1b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_1b_rw',
                    'name' => 'fe_ll_question_1b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_ll_question_1b',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_1b',
                    'name' => 'fe_ll_question_1b',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [   // Checkbox
                'name'  => 'fe_ll_question_1b_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'attributes' => [
                    'id' => 'fe_ll_question_1b_applicable',
                    'name' => 'fe_ll_question_1b_applicable',
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex justify-content-start align-self-center col-md-1'
                ],
                'tab' => 'Forceful Exertion'
            ],





            [
                'name' => 'fe_ll_question_2_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between mid-lower leg to knuckle</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_ll_question_2a_rw',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_2a_rw',
                    'name' => 'fe_ll_question_2a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_question_2a',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_2a',
                    'name' => 'fe_ll_question_2a',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [   // Checkbox
                'name'  => 'fe_ll_question_2a_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'attributes' => [
                    'id' => 'fe_ll_question_2a_applicable',
                    'name' => 'fe_ll_question_2a_applicable',
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-center col-md-1'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_question_2b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_2b_rw',
                    'name' => 'fe_ll_question_2b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_ll_question_2b',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_2b',
                    'name' => 'fe_ll_question_2b',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [   // Checkbox
                'name'  => 'fe_ll_question_2b_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'attributes' => [
                    'id' => 'fe_ll_question_2b_applicable',
                    'name' => 'fe_ll_question_2b_applicable',
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-center col-md-1'
                ],
                'tab' => 'Forceful Exertion'
            ],



            [
                'name' => 'fe_ll_question_3_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between knuckle height and elbow</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_ll_question_3a_rw',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_3a_rw',
                    'name' => 'fe_ll_question_3a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_question_3a',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_3a',
                    'name' => 'fe_ll_question_3a',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [   // Checkbox
                'name'  => 'fe_ll_question_3a_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'attributes' => [
                    'id' => 'fe_ll_question_3a_applicable',
                    'name' => 'fe_ll_question_3a_applicable',
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-center col-md-1'
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_ll_question_3b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_3b_rw',
                    'name' => 'fe_ll_question_3b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_question_3b',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_3b',
                    'name' => 'fe_ll_question_3b',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [   // Checkbox
                'name'  => 'fe_ll_question_3b_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'attributes' => [
                    'id' => 'fe_ll_question_3b_applicable',
                    'name' => 'fe_ll_question_3b_applicable',
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-center col-md-1'
                ],
                'tab' => 'Forceful Exertion'
            ],






            [
                'name' => 'fe_ll_question_4_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between elbow to shoulder</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_ll_question_4a_rw',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_4a_rw',
                    'name' => 'fe_ll_question_4a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_question_4a',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_4a',
                    'name' => 'fe_ll_question_4a',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [   // Checkbox
                'name'  => 'fe_ll_question_4a_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'attributes' => [
                    'id' => 'fe_ll_question_4a_applicable',
                    'name' => 'fe_ll_question_4a_applicable',
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-center col-md-1'
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_ll_question_4b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_4b_rw',
                    'name' => 'fe_ll_question_4b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_question_4b',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_4b',
                    'name' => 'fe_ll_question_4b',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [   // Checkbox
                'name'  => 'fe_ll_question_4b_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'attributes' => [
                    'id' => 'fe_ll_question_4b_applicable',
                    'name' => 'fe_ll_question_4b_applicable',
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-center col-md-1'
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name' => 'fe_ll_question_5_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_ll_question_5a_rw',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_5a_rw',
                    'name' => 'fe_ll_question_5a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_question_5a',
                'label' => false,
                'type'        => 'number',
                'default'     => '0.000',
                'attributes' => [
                    'id' => 'fe_ll_question_5a',
                    'name' => 'fe_ll_question_5a',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [   // Checkbox
                'name'  => 'fe_ll_question_5a_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'attributes' => [
                    'id' => 'fe_ll_question_5a_applicable',
                    'name' => 'fe_ll_question_5a_applicable',
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-center col-md-1'
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_ll_question_5b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_5b_rw',
                    'name' => 'fe_ll_question_5b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_question_5b',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_ll_question_5b',
                    'name' => 'fe_ll_question_5b',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [   // Checkbox
                'name'  => 'fe_ll_question_5b_applicable',
                'label' => false,
                'type'  => 'checkbox',
                'attributes' => [
                    'id' => 'fe_ll_question_5b_applicable',
                    'name' => 'fe_ll_question_5b_applicable',
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-center col-md-1'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_score_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'col-md-10',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_ll_score',
                'label' => 'Score',
                'type'        => 'number',
                'default'     => 0,
                'attributes' => [
                    'id' => 'fe_ll_score',
                    'name' => 'fe_ll_score',
                    'readonly' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group col-md-2 fw-bold d-flex align-items-center gap-2'
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_rll_subSection',
                'type'  => 'custom_html',
                'value' => '<h3 class="fw-bolder">Repetitive Lifting and Lowering</h3>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_rll_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_rw',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/fe_rll_rw.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_spacer_2',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_rll_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Working Height</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Close to body</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Far from body</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4 text-center'
                ],
                'tab' => 'Forceful Exertion'
            ],



            [
                'name'  => 'fe_rll_question_1_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Above the shoulder</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_1a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_1a_rw',
                    'name' => 'fe_rll_question_1a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_1a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_1a',
                    'name' => 'fe_rll_question_1a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_1b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_1b_rw',
                    'name' => 'fe_rll_question_1b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_1b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_1b',
                    'name' => 'fe_rll_question_1b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],



            [
                'name'  => 'fe_rll_question_2_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between elbow to shoulder</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_2a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_2a_rw',
                    'name' => 'fe_rll_question_2a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_2a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_2a',
                    'name' => 'fe_rll_question_2a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_2b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_2b_rw',
                    'name' => 'fe_rll_question_2b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_2b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_2b',
                    'name' => 'fe_rll_question_2b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_rll_question_3_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between knuckle height and elbow</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_3a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_3a_rw',
                    'name' => 'fe_rll_question_3a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_3a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_3a',
                    'name' => 'fe_rll_question_3a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_3b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_3b_rw',
                    'name' => 'fe_rll_question_3b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_3b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_3b',
                    'name' => 'fe_rll_question_3b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_rll_question_4_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between mid-lower leg to knuckle</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_4a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_4a_rw',
                    'name' => 'fe_rll_question_4a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_4a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_4a',
                    'name' => 'fe_rll_question_4a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_4b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_4b_rw',
                    'name' => 'fe_rll_question_4b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_4b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_4b',
                    'name' => 'fe_rll_question_4b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_rll_question_5_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_5a_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_5a_rw',
                    'name' => 'fe_rll_question_5a_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_5a',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-star col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_5a',
                    'name' => 'fe_rll_question_5a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_5b_rw',
                'label' => false,
                'type' => 'number',
                'default' => '0.000',
                'attributes' => [
                    'min' => 0.000,
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_5b_rw',
                    'name' => 'fe_rll_question_5b_rw',
                    'disabled' => true,
                ],
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_question_5b',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [
                    0 => 'Not applicable',
                    1 => 'Once or twice per minutes',
                    2 => 'Five to eight times per minute',
                    3 => 'More than 12 times per minute'
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-3'
                ],
                'attributes' => [
                    'id' => 'fe_rll_question_5b',
                    'name' => 'fe_rll_question_5b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_rll_score_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'col-md-10',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_rll_score',
                'label' => 'Score',
                'type'        => 'number',
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-2 fw-bold d-flex align-items-center gap-2'
                ],
                'attributes' => [
                    'id' => 'fe_rll_score',
                    'name' => 'fe_rll_score',
                    'readonly' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],




























            [
                'name'  => 'fe_lltbp_subSection',
                'type'  => 'custom_html',
                'value' => '<h3 class="fw-bolder">Lifting and Lowering with Twisted Body Posture</h3>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_rw_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_lltbp_rw',
                'type'  => 'custom_html',
                'value' => '<div class="text-center"><img src="' . asset('images/ieraChecklist/fe_lltbp_rw.png') . '" alt="Illustration" class="img-fluid"></div>',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_rw_spacer_2',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'tab' => 'Forceful Exertion'
            ],




            [
                'name'  => 'fe_lltbp_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Working Height</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Close to body</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Far from body</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Forceful Exertion'
            ],



            [
                'name'  => 'fe_lltbp_question_1_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Above the shoulder</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_question_1a',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_1a',
                    'name' => 'fe_lltbp_question_1a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_lltbp_question_1b',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_1b',
                    'name' => 'fe_lltbp_question_1b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_lltbp_question_2_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between elbow to shoulder</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_question_2a',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_2a',
                    'name' => 'fe_lltbp_question_2a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_lltbp_question_2b',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_2b',
                    'name' => 'fe_lltbp_question_2b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_lltbp_question_3_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between knuckle height and elbow</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_question_3a',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_3a',
                    'name' => 'fe_lltbp_question_3a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_lltbp_question_3b',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_3b',
                    'name' => 'fe_lltbp_question_3b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_lltbp_question_4_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between mid-lower leg to knuckle</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_question_4a',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_4a',
                    'name' => 'fe_lltbp_question_4a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_lltbp_question_4b',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_4b',
                    'name' => 'fe_lltbp_question_4b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_lltbp_question_5_subheader_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Between floor to mid-lower leg</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_question_5a',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_5a',
                    'name' => 'fe_lltbp_question_5a',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_lltbp_question_5b',
                'label' => 'Employee twists body from forward facing to the side?',
                'type'        => 'select_from_array',
                'options'     =>
                [
                    0 => 'Not applicable',
                    1 => '45 degrees',
                    2 => '90 degrees',
                ],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_question_5b',
                    'name' => 'fe_lltbp_question_5b',
                    'disabled' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_lltbp_score_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'col-md-10',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_lltbp_score',
                'label' => 'Score',
                'type'        => 'number',
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-2 fw-bold d-flex align-items-center gap-2'
                ],
                'attributes' => [
                    'id' => 'fe_lltbp_score',
                    'name' => 'fe_lltbp_score',
                    'readonly' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],











            [
                'name'  => 'fe_rlltbp_subSection',
                'type'  => 'custom_html',
                'value' => '<h3 class="fw-bolder">Repetitive lifting and lowering with twisted body posture</h3>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
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























            [
                'name'  => 'fe_pp_subSection',
                'type'  => 'custom_html',
                'value' => '<h3 class="fw-bolder">Pushing and Pulling</h3>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_pp_rw_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_pp_rw',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/fe_pp_rw.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-6'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_pp_rw_spacer_2',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-3',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_pp_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Criteria (during pushing or pulling)</h4>',
                'wrapper' => [
                    'class' => 'form-group col-9 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_pp_header_2',
                'type' => 'custom_html',
                'value' => '
                <div class="d-flex flex-wrap justify-content-end align-items-stretch mb-4 gap-4 p-0 ps-0">
                    <div class="text-justify p-0 px-auto col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">Not applicable</h5>
                    </div>
                    <div class="text-justify p-0 px-auto col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">Yes</h5>
                    </div>
                    <div class="text-justify p-0 px-auto col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">No</h5>
                    </div>
                </div>
            ',
                'wrapper' => [
                    'class' => 'col-3 px-0',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_pp_question_1_header',
                'type'  => 'custom_html',
                'value' => 'Force not applied with hand?',
                'wrapper' => [
                    'class' => 'form-group col-md-9 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_pp_question_1',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_pp_question_1',
                    'name' => 'fe_pp_question_1',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_pp_question_2_header',
                'type'  => 'custom_html',
                'value' => 'Hand not between knuckle and shoulder height?',
                'wrapper' => [
                    'class' => 'form-group col-md-9 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_pp_question_2',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_pp_question_2',
                    'name' => 'fe_pp_question_2',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_pp_question_3_header',
                'type'  => 'custom_html',
                'value' => 'Distance > 20m?',
                'wrapper' => [
                    'class' => 'form-group col-md-9 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_pp_question_3',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_pp_question_3',
                    'name' => 'fe_pp_question_3',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_pp_question_4_header',
                'type'  => 'custom_html',
                'value' => 'Load not supported on wheel?',
                'wrapper' => [
                    'class' => 'form-group col-md-9 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_pp_question_4',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_pp_question_4',
                    'name' => 'fe_pp_question_4',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_pp_question_5_header',
                'type'  => 'custom_html',
                'value' => 'Poorly maintained handling aid – wheel damaged and in bad (worn) condition?',
                'wrapper' => [
                    'class' => 'form-group col-md-9 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_pp_question_5',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_pp_question_5',
                    'name' => 'fe_pp_question_5',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_pp_question_6_header',
                'type'  => 'custom_html',
                'value' => 'Stopping or starting a load on smooth level surface?',
                'wrapper' => [
                    'class' => 'form-group col-md-5 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_pp_question_6_sub_1',
                'label' => false,
                'type' => 'select_from_array',
                'options' => [
                    '' => 'Please select an employee',
                    'male_more_than_1000kg' => 'Male > 1000kg ',
                    'female_more_than_750kg' => 'Female > 750kg'
                ],
                'default' => '',
                'allow_null' => false,
                'attributes' => [
                    'id' => 'fe_pp_question_6_sub_1',
                    'name' => 'fe_pp_question_6_sub_1',
                    'disabled' => true
                ],
                'wrapper' => [
                    'class' => 'form-group col-md-4 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name' => 'fe_pp_question_6',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_pp_question_6',
                    'name' => 'fe_pp_question_6',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_pp_question_7_header',
                'type'  => 'custom_html',
                'value' => 'Keeping the load in motion through uneven level surface (ramp, carpet, etc)?',
                'wrapper' => [
                    'class' => 'form-group col-md-5 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_pp_question_7_sub_1',
                'label' => false,
                'type' => 'select_from_array',
                'options' => [
                    '' => 'Please select an employee',
                    'male_more_than_100kg' => 'Male > 100kg',
                    'female_more_than_75kg' => 'Female > 75kg'
                ],
                'default' => '',
                'allow_null' => false,
                'attributes' => [
                    'id' => 'fe_pp_question_7_sub_1',
                    'name' => 'fe_pp_question_7_sub_1',
                    'disabled' => true
                ],
                'wrapper' => [
                    'class' => 'form-group col-md-4 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_pp_question_7',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_pp_question_7',
                    'name' => 'fe_pp_question_7',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_pp_question_2_spacer',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_pp_score_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'col-md-10',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_pp_score',
                'label' => 'Score',
                'type'        => 'number',
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-2 fw-bold d-flex align-items-center gap-2'
                ],
                'attributes' => [
                    'id' => 'fe_rll_score',
                    'name' => 'fe_rll_score',
                    'readonly' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],






            [
                'name'  => 'fe_hsp_subSection',
                'type'  => 'custom_html',
                'value' => '<h3 class="fw-bolder">Нandling in Seated Position</h3>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_hsp_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_hsp_rw',
                'type'  => 'custom_html',
                'value' => '<div class="text-center"><img src="' . asset('images/ieraChecklist/fe_hsp_rw.png') . '" alt="Illustration" class="img-fluid"></div>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_hsp_spacer_2',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-4',
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_hsp_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Gender</h4>',
                'wrapper' => [
                    'class' => 'form-group col-2 d-flex align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_hsp_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Recommended Weight Limit</h4>',
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex justify-content-center align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_hsp_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Current Weight</h4>',
                'wrapper' => [
                    'class' => 'form-group col-4 d-flex justify-content-center align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_hsp_header_4',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Exceed limit?</h4>',
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex justify-content-end align-self-end pe-7'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_hsp_subHeader_3_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'col-md-5',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_hsp_subHeader_3',
                'type'  => 'custom_html',
                'value' => '
                <div class="d-flex flex-wrap justify-content-center align-items-stretch mb-4 gap-5 p-0">
                    <div class="text-justify col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">Lift</h5>
                    </div>
                    <div class="text-justify col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">Lower</h5>
                    </div>
                </div>
            ',
                'wrapper' => [
                    'class' => 'col-4',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_hsp_subHeader_4',
                'type' => 'custom_html',
                'value' => '
                <div class="d-flex flex-wrap justify-content-end align-items-stretch mb-4 gap-4 p-0 ps-0">
                    <div class="text-justify p-0 px-auto col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">Not applicable</h5>
                    </div>
                    <div class="text-justify p-0 px-auto col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">Yes</h5>
                    </div>
                    <div class="text-justify p-0 px-auto col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">No</h5>
                    </div>
                </div>
            ',
                'wrapper' => [
                    'class' => 'col-3 px-0',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_hsp_question_1_subQuestion_1',
                'label' => false,
                'type' => 'select_from_array',
                'options' => [
                    '' => 'Please select an employee',
                    'Male' => 'Male',
                    'Female' => 'Female'
                ],
                'default' => '',
                'allow_null' => false,
                'attributes' => [
                    'id' => 'fe_hsp_question_1_subQuestion_1',
                    'name' => 'fe_hsp_question_1_subQuestion_1',
                    'disabled' => true
                ],
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_hsp_question_1_subQuestion_2',
                'label' => false,
                'type' => 'select_from_array',
                'options' => [
                    '' => 'Please select an employee',
                    '5kg' => '5kg',
                    '3kg' => '3kg'
                ],
                'default' => '',
                'allow_null' => false,
                'attributes' => [
                    'id' => 'fe_hsp_question_1_subQuestion_2',
                    'name' => 'fe_hsp_question_1_subQuestion_2',
                    'disabled' => true
                ],
                'wrapper' => [
                    'class' => 'form-group col-md-3 d-flex align-self-center'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_hsp_question_1_subQuestion_3',
                'label' => false,
                'type'  => 'number',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_hsp_question_1_subQuestion_4',
                'label' => false,
                'type'  => 'number',
                'wrapper' => [
                    'class' => 'form-group col-md-2 d-flex align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_hsp_question_1',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_hsp_question_1',
                    'name' => 'fe_hsp_question_1',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_hsp_score_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'col-md-10',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_hsp_score',
                'label' => 'Score',
                'type'        => 'number',
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-2 fw-bold d-flex align-items-center gap-2'
                ],
                'attributes' => [
                    'id' => 'fe_hsp_score',
                    'name' => 'fe_hsp_score',
                    'readonly' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],






            [
                'name'  => 'fe_c_subSection',
                'type'  => 'custom_html',
                'value' => '<h3 class="fw-bolder">Carrying</h3>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_c_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Criteria</h4>',
                'wrapper' => [
                    'class' => 'form-group col-9 d-flex align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_c_header_2',
                'type' => 'custom_html',
                'value' => '
                <div class="d-flex flex-wrap justify-content-end align-items-stretch mb-4 gap-4 p-0 ps-0">
                    <div class="text-justify p-0 px-auto col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">Not applicable</h5>
                    </div>
                    <div class="text-justify p-0 px-auto col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">Yes</h5>
                    </div>
                    <div class="text-justify p-0 px-auto col-12 col-sm-6 col-md-4 col-lg-2">
                        <h5 class="mb-0 small">No</h5>
                    </div>
                </div>
            ',
                'wrapper' => [
                    'class' => 'col-3 px-0',
                ],
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_c_question_1_header',
                'type'  => 'custom_html',
                'value' => 'Floor in poor condition = worn, uneven, contaminated, wet, steep slope, unstable surface, unsuitable footwear?',
                'wrapper' => [
                    'class' => 'form-group col-md-9 d-flex align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_c_question_1',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_c_question_1',
                    'name' => 'fe_c_question_1',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_c_question_2_header',
                'type'  => 'custom_html',
                'value' => 'Poor environmental factor = poor lighting, extreme temperature?',
                'wrapper' => [
                    'class' => 'form-group col-md-9 d-flex align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_c_question_2',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_c_question_2',
                    'name' => 'fe_c_question_2',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_c_question_3_header',
                'type'  => 'custom_html',
                'value' => 'Carrying distance > 10m',
                'wrapper' => [
                    'class' => 'form-group col-md-9 d-flex align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_c_question_3',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_c_question_3',
                    'name' => 'fe_c_question_3',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_c_question_4_header',
                'type'  => 'custom_html',
                'value' => 'Obstacles en route, steep slope, up steps, through closed doors, trip hazards, using ladder?',
                'wrapper' => [
                    'class' => 'form-group col-md-9 d-flex align-self-end'
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name' => 'fe_c_question_4',
                'label' => false,
                'type' => 'radio',
                'options' => [
                    0 => "",
                    2 => "",
                    1 => "",
                ],
                'default' => 0,
                'wrapper' => [
                    'class' => 'form-group col-3 d-flex align-items-center justify-content-end gap-5 pe-2'
                ],
                'attributes' => [
                    'id' => 'fe_c_question_4',
                    'name' => 'fe_c_question_4',
                    'readonly' => 'readonly'

                ],
                'inline' => true,
                'tab' => 'Forceful Exertion'
            ],


            [
                'name'  => 'fe_c_score_spacer_1',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'col-md-10',
                ],
                'tab' => 'Forceful Exertion'
            ],

            [
                'name'  => 'fe_c_score',
                'label' => 'Score',
                'type'        => 'number',
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-2 fw-bold d-flex align-items-center gap-2'
                ],
                'attributes' => [
                    'id' => 'fe_c_score',
                    'name' => 'fe_c_score',
                    'readonly' => true,
                ],
                'tab' => 'Forceful Exertion'
            ],









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
