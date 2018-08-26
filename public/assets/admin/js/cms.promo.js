var productIdList = []; 
var categoryIdList = []; 
var cityIdList = []; 
var disabled = promo.id == 0 ? '' : 'disabled'; 

function handleAddProductList(selected) {
	addProductList(selected.id, selected.text, $('[name=discountValue]').val()); 
}

function addProductList(id, name, promoValue) {
	if(productIdList.indexOf(id) != -1) return; 
	productIdList.push(parseInt(id)); 

	var newRow = ''; 
	newRow += '<tr id="productRow'+id+'">'; 
	newRow += '<td>'+name+'</td>'; 

	newRow += '<td>';
	if($('[name=type]').val() != constants.promoType.bundle) newRow += '<input type="number" class="form-control promoValue" name="productPromoValue[]" value="'+promoValue+'" '+disabled+'>';
	newRow += '</td>';

	newRow += '<td><button type="button" onClick="deleteProductRow('+id+')" class="btn btn-danger"><i class="fa fa-times-circle"></i></button></td>'; 
	newRow += '</tr>'; 

	$('#productList').append(newRow); 
} 

function deleteProductRow(id) {
	productIdList.splice(productIdList.indexOf(parseInt(id)), 1); 
	$('#productRow'+id).remove(); 
}

function handleAddCategoryList(selected) {
	addCategoryList(selected.id, selected.text, $('[name=discountValue]').val()); 
}

function addCategoryList(id, name, promoValue) {
	if(categoryIdList.indexOf(id) != -1) return; 
	categoryIdList.push(parseInt(id)); 

	var newRow = ''; 
	newRow += '<tr id="categoryRow'+id+'">'; 
	newRow += '<td>'+name+'</td>'; 

	newRow += '<td>';
	newRow += '<input type="number" class="form-control promoValue" name="categoryPromoValue[]" value="'+promoValue+'" '+disabled+'>';
	newRow += '</td>';

	newRow += '<td><button type="button" onClick="deleteCategoryRow('+id+')" class="btn btn-danger"><i class="fa fa-times-circle"></i></button></td>'; 
	newRow += '</tr>'; 

	$('#categoryList').append(newRow); 
}

function deleteCategoryRow(id) {
	categoryIdList.splice(categoryIdList.indexOf(parseInt(id)), 1); 
	$('#categoryRow'+id).remove(); 
} 

function handleAddCityList(selected) {
	addCityList(selected.id, selected.text); 
}

function addCityList(id, name) {
	if(cityIdList.indexOf(id) != -1) return; 
	cityIdList.push(parseInt(id)); 

	var newRow = ''; 
	newRow += '<tr id="cityRow'+id+'">'; 
	newRow += '<td>'+name+'</td>'; 
	newRow += '<td><button type="button" onClick="deleteCityRow('+id+')" class="btn btn-danger"><i class="fa fa-times-circle"></i></button></td>'; 
	newRow += '</tr>'; 

	$('#cityList').append(newRow); 
}

function deleteCityRow(id) {
	cityIdList.splice(cityIdList.indexOf(parseInt(id)), 1); 
	$('#cityRow'+id).remove(); 
} 

function generateErrorMessage(errors) {
    $('#alert-box-details').html(''); 
    $.each(errors, function(key, errorMessage) {
        $('#alert-box-details').append('<strong>Warning!</strong> '+ errorMessage +'<br/>'); 
    }); 
    $('#alert-box').removeClass('hidden'); 
    scrollToTop(); 
} 

function clearProductList() {
	$.each(productIdList, function(key, value) {
		deleteProductRow(value); 
	}); 
	productIdList = []; 

	$.each(categoryIdList, function(key, value) {
		deleteCategoryRow(value); 
	}); 
	categoryIdList = []; 
} 

function clearCityList() {
	$.each(cityIdList, function(key, value) {
		deleteCityRow(value); 
	}); 
	cityIdList = []; 
}

function validateForm() {
	var imageFile = $('[name=image]').parent().find('img').first().attr('src'); 

	var promoValueList = []; 

	var dataFromUser = {
		id: promo.id, 
		name: $('[name=name]').val(), 
		type: $('[name=type]').val(), 
		voucherCode: $('[name=voucherCode]').val(), 
		notes: $('[name=notes]').val(), 
		discountLevel: $('[name=discountLevel]').val(), 
		discountType: $('[name=type]').val() == constants.promoType.bundle ? $('#bundleDiscountType').val() : $('#defaultDiscountType').val(), 
		discountValue: $('[name=discountValue]').val(), 
		bundleQuantity: $('[name=bundleQuantity]').val(), 
		freeQuantity: $('[name=freeQuantity]').val(), 
		usageLimit: $('[name=usageLimit]').val(), 
		minimumPurchase: $('[name=minimumPurchase]').val(), 
		maximumDiscount: $('[name=maximumDiscount]').val(), 
		startDate: $('[name=startDate]').val(), 
		startTime: $('[name=startTime]').val(), 
		endDate: $('[name=endDate]').val(),
		endTime: $('[name=endTime]').val(),
		image: validateStringNotEmpty(imageFile) ? true : false, 
		productAvailability: $('[name=productAvailability]').val(),
		cityAvailability: $('[name=cityAvailability]').val(),
		productList: productIdList, 
		categoryList: categoryIdList, 
		cityList: cityIdList  
	}; 

	$.ajax({
        url : urlForValidation, 
        data : dataFromUser, 
        type : 'POST', 
        headers : {'X-CSRF-TOKEN' : $('meta[name = "csrf-token"]').attr('content')}, 
        success : function(data, textStatus, jqXHR) { 
            if(data.status == 'success') {
                $('.btn-primary').attr('disabled', true); 
                $('[name=products]').val(productIdList); 
                $('[name=categories]').val(categoryIdList); 
                $('[name=cities]').val(cityIdList); 
                $('#form').submit(); 
            } else { 
                generateErrorMessage(data.msg); 
            }
        }, 
        error : function(error) {
            console.log(error); 
        }
    });
}

$(document).ready(function() {
	$('[name=type]').on('change', function() {
		if($(this).val() == constants.promoType.voucher) {
			$('[name=voucherCode], [name=usageLimit]').parent().parent().removeClass('hidden'); 
		} else {
			$('[name=voucherCode], [name=usageLimit]').parent().parent().addClass('hidden'); 
		}

		if($(this).val() == constants.promoType.bundle) {
			$('[name=discountLevel]').val(constants.promoDiscountLevel.product); 
			$('[name=discountLevel]').change(); 
			$('[name=discountLevel]').attr('disabled', true); 

			$('[name=bundleQuantity]').parent().parent().removeClass('hidden'); 

			$('#defaultDiscountType').addClass('hidden');
			$('#defaultDiscountType').attr('disabled', true); 
			$('#bundleDiscountType').removeClass('hidden');
			$('#bundleDiscountType').attr('disabled', false); 
		} else {
			$('[name=discountLevel]').attr('disabled', false); 

			$('[name=bundleQuantity]').parent().parent().addClass('hidden'); 

			$('#defaultDiscountType').removeClass('hidden');
			$('#defaultDiscountType').attr('disabled', false); 
			$('#bundleDiscountType').addClass('hidden');
			$('#bundleDiscountType').attr('disabled', true); 
		}
	}); 

	$('[name=discountLevel]').on('change', function() {
		if($(this).val() == constants.promoDiscountLevel.order) {
			$('[name=productAvailability]').val(constants.promoProductAvailability.all); 
			$('[name=productAvailability]').change(); 
			$('[name=productAvailability]').attr('disabled', true); 
			clearProductList(); 

			$('[name=cityAvailability]').val(constants.promoCityAvailability.all); 
			$('[name=cityAvailability]').change(); 
			$('[name=cityAvailability]').attr('disabled', true); 
			clearCityList(); 
		} else if($(this).val() == constants.promoDiscountLevel.product) {
			$('[name=productAvailability]').attr('disabled', false); 
			$('[name=cityAvailability]').val(constants.promoCityAvailability.all); 
			$('[name=cityAvailability]').change(); 
			$('[name=cityAvailability]').attr('disabled', true); 
			clearCityList(); 
		} else if($(this).val() == constants.promoDiscountLevel.shipping) {
			$('[name=productAvailability]').val(constants.promoProductAvailability.all);
			$('[name=productAvailability]').change();
			$('[name=productAvailability]').attr('disabled', true);
			clearProductList();

			$('[name=cityAvailability]').attr('disabled', false);
		}
	}); 

	$('[name=discountType]').on('change', function() {
		if($(this).val() == constants.promoDiscountType.freeCheapest) {
			$('[name=freeQuantity]').parent().parent().removeClass('hidden'); 
			$('[name=discountValue]').parent().parent().addClass('hidden'); 
		} else {
			$('[name=freeQuantity]').parent().parent().addClass('hidden'); 
			$('[name=discountValue]').parent().parent().removeClass('hidden'); 
		}
	}); 

	$('[name=discountValue]').on('change', function() {
		$('.promoValue').val($('[name=discountValue]').val()); 
	}); 

	$('[name=productAvailability]').on('change', function() {
		if($(this).val() == constants.promoProductAvailability.product) {
			$('#autocompleteProductSearch').parent().parent().removeClass('hidden'); 
			$('#autocompleteCategorySearch').parent().parent().addClass('hidden'); 
		} else if($(this).val() == constants.promoProductAvailability.category) {
			$('#autocompleteProductSearch').parent().parent().addClass('hidden'); 
			$('#autocompleteCategorySearch').parent().parent().removeClass('hidden'); 
		} else {
			$('#autocompleteProductSearch').parent().parent().addClass('hidden'); 
			$('#autocompleteCategorySearch').parent().parent().addClass('hidden'); 
		} 
	}); 

	$('[name=cityAvailability]').on('change', function() {
		if($(this).val() == constants.promoCityAvailability.all) {
			$('#autocompleteCitySearch').parent().parent().addClass('hidden'); 
		} else if($(this).val() == constants.promoCityAvailability.selected) {
			$('#autocompleteCitySearch').parent().parent().removeClass('hidden'); 
		} 
	}); 

	$('[name=type], [name=discountLevel], [name=discountType], [name=productAvailability], [name=cityAvailability]').change(); 

	$.each(promo.promoProducts, function(key, value) {
		addProductList(value.product.id, value.product.name, value.promoValue); 
	}); 

	$.each(promo.promoCategories, function(key, value) {
		addCategoryList(value.category.id, value.category.name, value.promoValue); 
	}); 

	$.each(promo.promoCities, function(key, value) {
		addCityList({id: value.city.id, text: value.city.name}); 
	}); 
}); 