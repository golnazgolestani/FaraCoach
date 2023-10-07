<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
	'pdf_a'                 => false,
	'pdf_a_auto'            => false,
	'icc_profile_path'      => '',
    'font_path' => base_path('storage/fonts/'),
    'font_data' => [
        'vazir' => [
            'R' => 'Vazir.ttf', // regular font
            'B' => 'Vazir.ttf', // optional: bold font
            'I' => 'Vazir.ttf', // optional: italic font
            'BI' => 'Vazir.ttf', // optional: bold-italic font
            'useOTL' => 0xFF, // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75, // required for complicated langs like Persian, Arabic and Chinese
        ],
            'english' => [
            'R' => 'AnjomanBoldIt.ttf', // regular font
            'B' => 'AnjomanBoldIt.ttf', // optional: bold font
            'I' => 'AnjomanBoldIt.ttf', // optional: italic font
            'BI' => 'AnjomanBoldIt.ttf', // optional: bold-italic font

        ],
        'britanic' => [
            'R' => 'BRITANIC.TTF', // regular font
            'B' => 'BRITANIC.TTF', // optional: bold font
            'I' => 'BRITANIC.TTF', // optional: italic font
            'BI' => 'BRITANIC.TTF', // optional: bold-italic font

        ],
        'LatoRegular' => [
            'R' => 'Lato-Regular.ttf', // regular font
            'B' => 'Lato-Regular.ttf', // optional: bold font
            'I' => 'Lato-Regular.ttf', // optional: italic font
            'BI' => 'Lato-Regular.ttf', // optional: bold-italic font

        ],
        'embassybt' => [
            'R' => 'embassybt.ttf', // regular font
            'B' => 'embassybt.ttf', // optional: bold font
            'I' => 'embassybt.ttf', // optional: italic font
            'BI' => 'embassybt.ttf', // optional: bold-italic font

        ]// ...add as many as you want.


    ]
];
