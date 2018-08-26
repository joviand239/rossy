<?php

namespace App\Entity\CMS;

use App\Entity\Base\Page;

class PageBlog extends Page {
    const TITLE = 'Blog';

    const CMS_NAME = 'Blog';
    const CMS_INFO = 'Page Blog';
    const CMS_SITEMAP = 'Blog';

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
