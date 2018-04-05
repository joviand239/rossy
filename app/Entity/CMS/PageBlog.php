<?php

namespace App\Entity\CMS;

use App\Entity\Base\Page;

class PageBlog extends Page {
    const TITLE = 'Blog';

    const CMS_NAME = 'Blog';
    const CMS_INFO = 'Page Blog';
    const CMS_SITEMAP = 'Blog';

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
