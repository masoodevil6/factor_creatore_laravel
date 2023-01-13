<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Factor-Saze',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
	'pdf_a'                 => false,
	'pdf_a_auto'            => false,
	'icc_profile_path'      => '' ,


    'margin_top' => 0 ,
    'margin_bottom' => 0 ,
    'margin_right' => 0 ,
    'margin_left' => 0,

    'default_font' => 'Vazir',
    'custom_font_dir'  => public_path('public/fonts/Vazir'),
    'custom_font_data' => [
        'Vazir' => [
            'R'  => 'Vazir-Regular.ttf'
        ]

    ]
];
