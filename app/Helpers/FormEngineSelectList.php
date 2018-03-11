<?php

use App\Entity\Activity;
use App\Entity\JneCity;
use App\Entity\Promo;
use App\Entity\Attribute\AttributeBase;
use App\Entity\Attribute\AttributeQuality;
use App\Entity\Attribute\AttributeSide;
use App\Entity\Attribute\FinishingCardholder;
use App\Entity\Attribute\FinishingCornercut;
use App\Entity\Attribute\FinishingFold;
use App\Entity\Attribute\FinishingView;
use App\Entity\Attribute\FinishingFinishingBanner;
use App\Entity\Attribute\FinishingLaminating;
use App\Entity\Attribute\FinishingLaminatingSide;
use App\Entity\Attribute\FinishingLaminatingCover;
use App\Entity\Attribute\FinishingBindingCover;
use App\Entity\Attribute\FinishingCoverColor;
use App\Entity\Attribute\FinishingBindingPlacement;
use App\Entity\Attribute\FinishingPaperfillQuantity;
use App\Entity\Attribute\FinishingPaperfillPattern;
use App\Entity\Attribute\FinishingBookmark;
use App\Entity\Attribute\FinishingWeight;
use App\Entity\Attribute\FinishingWrapping;
use App\Entity\Attribute\FinishingWhiteCover;
use App\Entity\Attribute\FinishingColor;

use App\Entity\Division;
use App\Entity\Invoice;
use App\Entity\Material;
use App\Entity\Organization;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Size;
use App\Entity\Staff;
use App\Entity\User\Company;
use App\Util\Constant;

function GetSizes(){
	$map = [];
    $map[0] = 'All';
	foreach(Size::all() as $size){
		$map[$size->id] = $size->name_internal;
	}
	return $map;
}

function GetMaterials(){
	$map = [];
    $map[0] = 'All';
	foreach(Material::all() as $material){
		$map[$material->id] = $material->name_internal;
	}
	return $map;
}

function GetMaterialsSize(){
	$map = [];
    $map[0] = 'All';
	foreach(Material::with('sizes')->get() as $material){
		$map[$material->id] = $material->sizes->pluck('id')->toArray();
	}
	return $map;
}

function EmptyArraySelect(){
	return [];
}

function GetQualities(){
	$map = [];
    $map[0] = 'All';
	foreach(AttributeQuality::all() as $quality){
		$map[$quality->id] = $quality->name_internal;
	}
	return $map;
}

function GetSides(){
	$map = [];
    $map[0] = 'All';
	foreach(AttributeSide::all() as $side){
		$map[$side->id] = $side->name_internal;
	}
	return $map;
}

function GetProducts(){
	$map = [];
	foreach(Product::all() as $product){
		$map[$product->id] = $product->name;
	}
	return $map;
}

function getCategory(){
    $map = [];
    foreach(Category::all() as $category){
        $map[$category->id] = $category->name;
    }
    return $map;
}

function GetRoles(){
    $map = [
	    Constant::USER_ROLE_ADMIN => 'Admin',
	    Constant::USER_ROLE_CUSTOMER => 'Retail',
	    Constant::USER_ROLE_CUSTOMERBIZ => 'Biz',
    ];
    return $map;
}


function GetAttributes(){
    $map = [
        AttributeBase::SUBTYPE_SIDE => AttributeSide::all(),
	    AttributeBase::SUBTYPE_QUALITY => AttributeQuality::all()
    ];
    return $map;
}
function GetFinishings(){
	$map = [
		AttributeBase::SUBTYPE_CARDHOLDER => FinishingCardholder::all(),
		AttributeBase::SUBTYPE_CORNERCUT => FinishingCornercut::all(),
		AttributeBase::SUBTYPE_FOLD => FinishingFold::all(),
        AttributeBase::SUBTYPE_VIEW => FinishingView::all(),
        AttributeBase::SUBTYPE_FINISHING_BANNER => FinishingFinishingBanner::all(),
        AttributeBase::SUBTYPE_LAMINATING => FinishingLaminating::all(),
        AttributeBase::SUBTYPE_LAMINATING_SIDE => FinishingLaminatingSide::all(),
        AttributeBase::SUBTYPE_LAMINATING_COVER => FinishingLaminatingCover::all(),
        AttributeBase::SUBTYPE_BINDING_COVER => FinishingBindingCover::all(),
        AttributeBase::SUBTYPE_COVER_COLOR => FinishingCoverColor::all(),
        AttributeBase::SUBTYPE_BINDING_PLACEMENT => FinishingBindingPlacement::all(),
        AttributeBase::SUBTYPE_PAPERFILL_QUANTITY => FinishingPaperfillQuantity::all(),
        AttributeBase::SUBTYPE_PAPERFILL_PATTERN => FinishingPaperfillPattern::all(),
        AttributeBase::SUBTYPE_BOOKMARK => FinishingBookmark::all(),
        AttributeBase::SUBTYPE_WEIGHT => FinishingWeight::all(),
        AttributeBase::SUBTYPE_WRAPPING => FinishingWrapping::all(),
        AttributeBase::SUBTYPE_WHITE_COVER => FinishingWhiteCover::all(),
        AttributeBase::SUBTYPE_COLOR => FinishingColor::all(),
	];
	return $map;
}

function GetTemplateStyles(){
    $map = [
        'ART' => 'Art',
        'GRAPHIC_DESIGN' => 'Graphic Design',
        'ILLUSTRATION' => 'Illustration',
        'PHOTOGRAPHY' => 'Photography',
    ];

    return $map;
}

function GetTemplateIndustry(){
    $map = [
        'ART_AND_CRAFTS' => 'Art & Crafts',
        'BEAUTY_AND_HEALTH' => 'Beauty & Health',
        'COMPUTING_AND_IT' => 'Computing & IT',
        'DESIGN_AND_ARCH' => 'Design & Arch',
        'EDUCATION_AND_TRAINING' => 'Education & Training',
        'FASION' => 'Fashion',
        'FOOD_AND_BEVERAGE' => 'Food & Beverage',
        'PHOTOGRAPHY_AND_FILM' => 'Photography & Film',
        'RETAIL' => 'Retail',
        'WEDDING_AND_EVENTS' => 'Wedding & Event',
        'WRITING_AND_JOURNALISM' => 'Writing & Journalism'
    ];

    return $map;
}

function GetOrientations()
{
    $map = [
        'LANDSCAPE' => 'Landscape',
        'PORTRAIT' => 'Portrait',
    ];

    return $map;
}

function GetPromoType(){
	$map = [
		Promo::TYPE_PERCENTAGE => 'Percentage',
		Promo::TYPE_FIXED => 'Fixed',
	];

	return $map;
}

function GetPromoFormat(){
    $map = [
        Promo::FORMAT_GENERAL => 'General',
        Promo::FORMAT_REFERRAL => 'Referral',
    ];

    return $map;
}

function GetCompanies(){
	$map = [];
	foreach(Company::all() as $company){
		$map[$company->id] = $company->name;
	}
	return $map;
}

function GetJneCities(){
	$map = [];
	foreach(JneCity::all() as $jneCity){
		$map[$jneCity->city_code] = $jneCity->city_name;
	}
	return $map;
}

function GetOrderStatus()
{
    $map = [
        Constant::STATUS_PENDING => keyToLabel(Constant::STATUS_PENDING),
        Constant::STATUS_PENDING => keyToLabel(Constant::STATUS_PENDING),
        Constant::STATUS_DELIVERY => keyToLabel(Constant::STATUS_DELIVERY),
        Constant::STATUS_COMPLETED => keyToLabel(Constant::STATUS_COMPLETED),
    ];

    return $map;
}

function GetFonts() {
    $fonts = [
	    'Arial',
	    'ProximaNovaRegular',
	    'Scriptina',
	    'Lato-Regular',
	    'Roboto-Bold',
	    'Roboto-Light',
	    'NexaBold',
	    'NexaLight',
    ];
	$map = [];
	foreach($fonts as $font){
		$map[$font] = $font;
	}
    return $map;
}