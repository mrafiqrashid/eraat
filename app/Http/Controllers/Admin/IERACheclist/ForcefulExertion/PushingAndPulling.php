<?php

// app/Http/Controllers/Admin/IERACheclist/ForcefulExertion/ForcefulExertion2.php
namespace App\Http\Controllers\Admin\IERACheclist\ForcefulExertion;



class PushingAndPulling
{
    public static function getFields()
    {
        return [
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
        ];
    }
}
