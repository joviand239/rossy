<?php

namespace App\Entity\CMS;

use App\Entity\Base\Page;

class About extends Page {
    const TITLE = 'About Us';

    const CMS_NAME = 'About Us';
    const CMS_INFO = 'Tentang Rossy';
    const CMS_SITEMAP = 'About Us';

    const USE_META_SET = true;

    const FORM_TYPE = [
        'bannerBackground' => 'Image_1',
        'bannerTitle' => 'Text',
        'bannerSubtitle' => 'Text',
        'featuredImage' => 'Image_1',
        'tagline' => 'Text',
        'summary' => 'TextArea',
        'description' => 'Wysiwyg',
        'address' => 'TextArea',
        'phone' => 'Text',
        'email' => 'Text',
        'facebook' => 'Text',
        'instagram' => 'Text',
        'capability' => 'ListSortable'
    ];

    const FORM_LABEL = [

    ];

    const FORM_LABEL_HELP = [

    ];

    const FORM_LIST = [
        'capability' => [
            'image' => 'Image_1',
            'title' => 'Text'
        ]
    ];

    const FORM_SELECT_LIST = [

    ];


}
