<?php

namespace App\Entity\CMS;

use App\Entity\Base\Page;

class PageProduct extends Page {
    const TITLE = 'Product';

    const CMS_NAME = 'Product';
    const CMS_INFO = 'Page Product';
    const CMS_SITEMAP = 'Product';

    const FORM_TYPE = [
        'metaTitle' => 'Text',
        'metaDescription' => 'TextArea',
        'bannerBackground' => 'Image_1',
        'bannerTitle' => 'Text',
        'bannerSubtitle' => 'Text',
    ];

    const FORM_LABEL = [
        'metaTitle' => 'Judul halaman',
        'metaDescription' => 'Deskripsi halaman',
    ];

    const FORM_LABEL_HELP = [
        'metaTitle' => 'Untuk keperluan SEO',
        'metaDescription' => 'Untuk keperluan SEO',
    ];

    const FORM_LIST = [

    ];

    const FORM_SELECT_LIST = [

    ];


}
