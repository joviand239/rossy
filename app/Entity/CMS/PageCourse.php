<?php

namespace App\Entity\CMS;

use App\Entity\Base\Page;

class PageCourse extends Page {
    const TITLE = 'Course';

    const CMS_NAME = 'Course';
    const CMS_INFO = 'Page Course';
    const CMS_SITEMAP = 'Course';

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
