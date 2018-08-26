<?php

namespace App\Entity\CMS;

use App\Entity\Base\Page;

class PageProduct extends Page {
    const TITLE = 'Product';

    const CMS_NAME = 'Product';
    const CMS_INFO = 'Page Product';
    const CMS_SITEMAP = 'Product';

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
