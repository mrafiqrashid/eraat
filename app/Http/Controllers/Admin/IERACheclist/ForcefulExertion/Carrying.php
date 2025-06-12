<?php

// app/Http/Controllers/Admin/IERACheclist/ForcefulExertion/ForcefulExertion2.php
namespace App\Http\Controllers\Admin\IERACheclist\ForcefulExertion;



class Carrying
{
    public static function getFields()
    {
        return [
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
        ];
    }
}
