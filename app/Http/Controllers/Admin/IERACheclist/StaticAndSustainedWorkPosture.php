<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;



class StaticAndSustainedWorkPosture
{
    public static function get()
    {
        return [
            [
                'name'  => 'snswp_section',
                'type'  => 'custom_html',
                'value' => '<h2 class="fw-bolder">Section: Static and Sustained Work Posture</h2>',
                'wrapper' => [
                    'class' => 'form-group col-md-12 pt-5'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],

            [
                'name'  => 'snswp_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Body Part</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name' => 'snswp_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Physical Risk Factor</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Maximum Exposure Duration (Continuously or cumulatively)</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_header_4',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Illustration</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_header_5',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],


            [
                'name'  => 'snswp_question_1_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Trunk/ Head/ Neck/ Arm/ Wrist</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name' => 'snswp_question_1_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work in a static awkward position as in Table 3.1</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_question_1_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Duration as per Table 3.1</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_question_1_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/snswp_01.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_question_1',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'snswp_question_1',
                    'name' => 'snswp_question_1',
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],






            [
                'name'  => 'snswp_question_2_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Leg/ Knees</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name' => 'snswp_question_2_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work in a standing position with minimal leg movement</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_question_2_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours continously</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_question_2_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/snswp_02.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_question_2',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'snswp_question_2',
                    'name' => 'snswp_question_2',
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],







            [
                'name'  => 'snswp_question_3_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2"></p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name' => 'snswp_question_3_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work in a seated position with minimal movement</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_question_3_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 30 minutes continously</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_question_3_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/snswp_03.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_question_3',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'snswp_question_3',
                    'name' => 'snswp_question_3',
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],



            [
                'name'  => 'snswp_score_spacer',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-10',
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
            [
                'name'  => 'snswp_score',
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
                    'id' => 'snswp_score',
                    'name' => 'snswp_score',
                    'readonly' => true
                ],
                'tab' => 'Static & Sustained Work Posture'
            ],
        ];
    }
}
