<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;



class Noise
{
    public static function get()
    {
        return [
            [
                'name'  => 'noise_section',
                'type'  => 'custom_html',
                'value' => '<h2 class="fw-bolder">Section: Noise</h2>',
                'wrapper' => [
                    'class' => 'form-group col-md-12  pt-5'
                ],
                'tab' => 'Noise'
            ],
            [
                'name'  => 'noise_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-10">Physical Risk Factor</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-10'
                ],
                'tab' => 'Noise'
            ],
            [
                'name'  => 'noise_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Noise'
            ],
            [
                'name'  => 'noise_question_1_subheader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-10">Noise exposure above Permissible Exposure Limit (PEL) (based on previous reports or measurement</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-10'
                ],
                'tab' => 'Noise'
            ],
            [
                'name'  => 'noise_question_1',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'noise_question_1',
                    'name' => 'noise_question_1',
                ],
                'tab' => 'Noise'
            ],
            [
                'name'  => 'noise_question_2_subheader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-10">Exposure to annoying or excessive noise during working hours</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-10'
                ],
                'tab' => 'Noise'
            ],
            [
                'name'  => 'noise_question_2',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'noise_question_2',
                    'name' => 'noise_question_2',
                ],
                'tab' => 'Noise'
            ],
            [
                'name'  => 'noise_score_spacer',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-10',
                ],
                'tab' => 'Noise'
            ],
            [
                'name'  => 'noise_score',
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
                    'id' => 'noise_score',
                    'name' => 'noise_score',
                    'readonly' => true
                ],
                'tab' => 'Noise'
            ],
            [
                'name' => 'next_to_description',
                'type' => 'custom_html',
                'value' => '<button type="button" class="btn btn-primary next-tab" data-next-tab="Description">Next</button>',
                'tab' => 'Noise',
            ],
        ];
    }
}
