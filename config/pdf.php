<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',

	'creator'               => 'Factor-Saze',

    'margin_top' => 0 ,
    'margin_bottom' => 0 ,
    'margin_right' => 0 ,
    'margin_left' => 0,

    'default_font' => 'vazir',
    'font_path'  => public_path('public/fonts'),
    'font_data' => [
        'vazir' => [
            'R'  => 'Vazir-Regular.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75,
            'unAGlyphs' => true,
        ]
    ]
];


