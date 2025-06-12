<?php

// app/Http/Controllers/Admin/FieldSets/ProjectFields.php
namespace App\Http\Controllers\Admin\IERACheclist;



class Description
{
    public static function get()
    {
        return [
            [
                'name'  => 'ieraChecklist_totalScore',
                'label' => 'IERA Checklist Total Score',
                'type'        => 'number',
                'default'     => 0,
                'wrapper' => [
                    'class' => 'form-group col-md-4 fw-bold d-flex align-items-center gap-2'
                ],
                'attributes' => [
                    'id' => 'ieraChecklist_totalScore',
                    'name' => 'ieraChecklist_totalScore',
                ],
                'tab' => 'Description'
            ],
            [
                'name'  => 'description',
                'label' => 'Description',
                'type'  => 'summernote',
                'options' => [
                    'height' => 500,
                    'toolbar' => [
                        ['font', ['bold', 'underline', 'italic']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'picture']],
                        ['view', ['fullscreen', 'codeview']],
                        ['style', ['style']],
                    ],

                ],
                'wrapper' => [
                    'class' => 'form-group col-md-12 mt-5'
                ],
                'tab' => 'Description'
            ],
        ];
    }
}
