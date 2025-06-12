<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;

class AwkwardPosture
{
    public static function get()
    {
        return [
            [
                'name'  => 'ap_section',
                'type'  => 'custom_html',
                'value' => '<h2 class="fw-bolder">Section: Awkward Posture</h2>',
                'wrapper' => [
                    'class' => 'form-group col-md-12  pt-5'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_header_1',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Body Part</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_header_2',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Physical Risk Factor</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_header_3',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Maximum Exposure Duration (Continuously or cumulatively)</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_header_4',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Illustration</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_header_5',
                'type'  => 'custom_html',
                'value' => '<h4 class="mb-0">Please Choose (Yes/No)</h4>',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_1_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Shoulders</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_1_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with hand above the head OR the elbow above the shoulder</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_1_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_1_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_01.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_1',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_1',
                    'name' => 'ap_question_1',
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_2_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Shoulders</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_2_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with shoulder raised</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_2_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_2_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_02.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_2',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_2',
                    'name' => 'ap_question_2',
                ],
                'tab' => 'Awkward Posture'
            ],




            [
                'name'  => 'ap_question_3_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Shoulders</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_3_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work repetitvely by raising the hand above the head OR the elbow above the shoulder more than once per minute</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_3_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_3_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_03.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_3',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_3',
                    'name' => 'ap_question_3',
                ],
                'tab' => 'Awkward Posture'
            ],



            [
                'name'  => 'ap_question_4_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Head</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_4_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with head bent downwards more than 45 degrees</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_4_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_4_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_04.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_4',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_4',
                    'name' => 'ap_question_4',
                ],
                'tab' => 'Awkward Posture'
            ],





            [
                'name'  => 'ap_question_5_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Head</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_5_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with head bent backwards</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_5_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_5_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_05.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_5',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_5',
                    'name' => 'ap_question_5',
                ],
                'tab' => 'Awkward Posture'
            ],




            [
                'name'  => 'ap_question_6_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Head</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_6_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with head bent sideways</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_6_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_6_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_06.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_6',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_6',
                    'name' => 'ap_question_6',
                ],
                'tab' => 'Awkward Posture'
            ],





            [
                'name'  => 'ap_question_7_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Back</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_7_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with back bent forward more than 30 degrees OR bent sideways</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_7_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_7_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_07.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_7',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_7',
                    'name' => 'ap_question_7',
                ],
                'tab' => 'Awkward Posture'
            ],


            [
                'name'  => 'ap_question_8_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Back</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_8_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with body twisted</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_8_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_8_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_08.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_8',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_8',
                    'name' => 'ap_question_8',
                ],
                'tab' => 'Awkward Posture'
            ],




            [
                'name'  => 'ap_question_9_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Hand/ Elbow/ Wrist</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_9_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with wrist flexion OR extension OR radial deviation more than 15 degrees</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_9_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_9_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_09.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_9',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_9',
                    'name' => 'ap_question_9',
                ],
                'tab' => 'Awkward Posture'
            ],


            [
                'name'  => 'ap_question_10_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Hand/ Elbow/ Wrist</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_10_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with arm abducted sideways</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_10_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 4 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_10_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_10.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_10',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_10',
                    'name' => 'ap_question_10',
                ],
                'tab' => 'Awkward Posture'
            ],




            [
                'name'  => 'ap_question_11_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Hand/ Elbow/ Wrist</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_11_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Working with arm extended forward more than 45 degrees OR arm extended backward more than 20 degrees</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_11_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_11_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_11.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_11',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_11',
                    'name' => 'ap_question_11',
                ],
                'tab' => 'Awkward Posture'
            ],




            [
                'name'  => 'ap_question_12_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Leg/ Knees</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_12_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work in a squat position</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_12_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_12_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_12.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_12',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_12',
                    'name' => 'ap_question_12',
                ],
                'tab' => 'Awkward Posture'
            ],





            [
                'name'  => 'ap_question_13_subHeader_1',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Leg/ Knees</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-1'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name' => 'ap_question_13_subHeader_2',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">Work in a kneeling position</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-4'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_13_subHeader_3',
                'type'  => 'custom_html',
                'value' => '<p class="mb-2">More than 2 hours per day</p>',
                'wrapper' => [
                    'class' => 'form-group col-md-3'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_13_subHeader_4',
                'type'  => 'custom_html',
                'value' => '<img src="' . asset('images/ieraChecklist/ap_13.png') . '" alt="Illustration" class="img-fluid">',
                'wrapper' => [
                    'class' => 'form-group col-md-2'
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_question_13',
                'label' => false,
                'type'        => 'select_from_array',
                'options'     => [0 => 'Not applicable', 1 => 'No', 2 => 'Yes'],
                'allows_null' => false,
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group d-flex align-self-start col-md-2'
                ],
                'attributes' => [
                    'id' => 'ap_question_13',
                    'name' => 'ap_question_13',
                ],
                'tab' => 'Awkward Posture'
            ],




            [
                'name'  => 'ap_spacer2',
                'type'  => 'custom_html',
                'value' => '&nbsp;',
                'wrapper' => [
                    'class' => 'form-group col-md-10',
                ],
                'tab' => 'Awkward Posture'
            ],
            [
                'name'  => 'ap_score',
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
                    'id' => 'ap_score',
                    'name' => 'ap_score',
                    'readonly' => true
                ],
                'tab' => 'Awkward Posture'
            ],
        ];
    }
}
