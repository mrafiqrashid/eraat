<?php

// app/Http/Controllers/Admin/IERACheclist/ForcefulExertion/ForcefulExertion2.php
namespace App\Http\Controllers\Admin\IERACheclist\ForcefulExertion;



class LiftingAndLowering
{
    public static function getFields()
    {
        return [
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
                    'class' => 'form-group col-md-5'
                ],
                'tab' => 'Forceful Exertion'
            ],
            [
                'name'  => 'fe_ll_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Far from body</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
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

        ];
    }
}
