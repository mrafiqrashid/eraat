<?php

// app/Http/Controllers/Admin/IERACheclist/ForcefulExertion/ForcefulExertion2.php
namespace App\Http\Controllers\Admin\IERACheclist\ForcefulExertion;



class HandlingInSeatedPosition
{
    public static function getFields()
    {
        return [
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
        ];
    }
}
