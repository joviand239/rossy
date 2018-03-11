<?php

namespace App\Util;

class Constant {
    const YES = 'Y';
    const NO = 'N';

    const USER_ROLE_ADMIN = 'ADMIN';
    const USER_ROLE_CUSTOMER = 'CUSTOMER';
    const USER_ROLE_CUSTOMERBIZ = 'CUSTOMERBIZ';

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';
    const STATUS_PENDING = 'PENDING';
    const STATUS_PRINTING = 'PRINTING';
    const STATUS_PAID = 'PAID';
    const STATUS_DELIVERY = 'DELIVERY';
    const STATUS_COMPLETED = 'COMPLETED';
    const STATUS_CANCELLED = 'CANCELLED';

    const ORDER_TYPE_REGULAR = 'REGULAR';
    const ORDER_TYPE_COLLECT = 'COLLECT';
    const ORDER_TYPE_CUSTOM = 'CUSTOM';
}