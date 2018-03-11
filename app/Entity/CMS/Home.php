<?php

namespace App\Entity\CMS;

use App\Entity\Base\Page;

class Home extends Page {
    const TITLE = 'Home';

    const CMS_NAME = 'Home';
    const CMS_INFO = 'Halaman utama';
    const CMS_SITEMAP = 'Home';

    const FORM_TYPE = [
        'meta_title' => 'Text',
        'meta_description' => 'TextArea',
        'banner_slider' => 'ListSortable',
    ];

    const FORM_LABEL = [
        'meta_title' => 'Judul halaman',
        'meta_description' => 'Deskripsi halaman',
    ];

    const FORM_LABEL_HELP = [
        'meta_title' => 'Untuk keperluan SEO',
        'meta_description' => 'Untuk keperluan SEO',
    ];

    const FORM_LIST = [
        'banner_slider' => [
            'banner_position' => 'Select',
            'banner_image' => 'Image_1',
            'banner_mobile_image' => 'Image_1',
            'banner_title'  => 'Text',
            'banner_subtitle'  => 'Text',
            'banner_detail'  => 'TextArea',
            'banner_button' => 'Text',
            'banner_button_link' => 'Text',
        ]
    ];

    const FORM_SELECT_LIST = [
        'banner_position' => [
            'LEFT' => 'Left',
            'CENTER' => 'Center',
            'RIGHT' => 'Right',
        ]
    ];


}
