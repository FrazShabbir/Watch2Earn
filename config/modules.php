<?php

return [

    'modules'=>[
        'developers'=>[
            'full_name'=>[
                'name'=>'full_name',
                'type'=>'text',
                'label'=>'Full Name',
                'placeholder'=>'Enter Full Name',
                'validation'=>'required',
                'variable'=>'',
                'default'=>'',
                'options'=>[],
            ],
            'short_name'=>[
                'name'=>'short_name',
                'type'=>'text',
                'label'=>'Short Name',
                'placeholder'=>'Enter Short Name',
                'validation'=>'required',
                'variable'=>'',
                'default'=>'',
                'options'=>[],
            ],
            'status'=>[
                'name'=>'status',
                'type'=>'select',
                'label'=>'Status',
                'placeholder'=>'Select Status',
                'validation'=>'required',
                'variable'=>'',
                'default'=>'',
                'options'=>[
                    '1'=>'Active',
                    '0'=>'Inactive'
                ],
            ],


        ]
    ]

];
