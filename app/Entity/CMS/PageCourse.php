<?php

namespace App\Entity\CMS;

use App\Entity\Base\Page;

class PageCourse extends Page {
    const TITLE = 'Course';

    const CMS_NAME = 'Course';
    const CMS_INFO = 'Page Course';
    const CMS_SITEMAP = 'Course';

    const USE_META_SET = true;

    const FORM_TYPE = [
        'bannerBackground' => 'Image_1',
        'bannerTitle' => 'Text',
        'bannerSubtitle' => 'Text',
    ];

    const FORM_LABEL = [

    ];

    const FORM_LABEL_HELP = [

    ];

    const FORM_LIST = [

    ];

    const FORM_SELECT_LIST = [

    ];


}
