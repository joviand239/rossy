<?php

namespace App\Entity\CMS;

use App\Entity\Base\Page;

class History extends Page {
    const TITLE = 'History';

    const CMS_NAME = 'History';
    const CMS_INFO = 'Sejarah Perjalanan Rossy';
    const CMS_SITEMAP = 'History';

    const FORM_TYPE = [
        'timeline' => 'ListSortable'
    ];

    const FORM_LABEL = [

    ];

    const FORM_LABEL_HELP = [

    ];

    const FORM_LIST = [
        'timeline' => [
            'year' => 'Text',
            'image' => 'Image_1',
            'title' => 'Text',
            'summary' => 'TextArea'
        ]
    ];

    const FORM_SELECT_LIST = [

    ];


}
