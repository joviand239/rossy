function addPhoneValidation() {
	$(".phone-number").off();
	$(".phone-number").keypress(function (e) {
		var charCode = e.which || e.charCode || e.keyCode || 0;
		if (charCode == 8 || charCode == 46) return true;
		if (String.fromCharCode(charCode).match(/[^0-9\-]/g)) return false;
	});
}

function convertSizeToBytes(value) {
    var tempValue = 0;
    var getValue = value.substr(0, value.length - 2);
    var getExtensions = value.substr(value.length - 2).toUpperCase();
    var listExtensions = ['KB', 'MB', 'GB'];
    var checkExist = jQuery.inArray(getExtensions, listExtensions);

    if(checkExist >= 0){
        for(i=0; i<checkExist+1;i++){
            getValue = getValue * 1024;
        }

        tempValue = getValue;
    }

    return tempValue;
}

function showImage(src, target) {
    if (src == null || target == null) return;
    var fr = new FileReader();
    // when image is loaded, set the src of the image where you want to display it
    fr.onload = function (e) {
        target.src = this.result;
    };
    src.addEventListener("change", function () {
        // fill fr with image data

        if (src.files.length > 0){
            var getBytesValue = 0;

            if($(src).data('image-limit')) getBytesValue = convertSizeToBytes($(src).data('image-limit'));

            if (getBytesValue != 0 && src.files[0].size > getBytesValue){
                $(src).val('');
                iziModalError('The file size exceeds the limit allowed of '+$(src).data('image-limit'));
                return;
            }
        };
        if ($(src).attr('name') == '' || !$(src).attr('name')) {
            var hidden = $(src).parent().find('input[type=hidden]').first();
            $(src).attr('name', hidden.attr('name'));
            hidden.remove();
        }
        triggerImageMultipleWrapper(src);

        fr.readAsDataURL(src.files[0]);
    });
}

function triggerImageMultipleWrapper(src) {
	var imageMultipleWrapper = $(src).parent().parent();
	if (imageMultipleWrapper.hasClass('image-multiple-wrapper')) {
		var imageSelectorWrapperLast = imageMultipleWrapper.find('.image-selector-wrapper').last();

		if ($(src).parent().index() == ( imageMultipleWrapper.find('.image-selector-wrapper').length - 1)) {
			imageMultipleWrapper.append(imageSelectorWrapperLast.clone(true));
		}

		var imageSelectorWrapperFirst = imageMultipleWrapper.find('.image-selector-wrapper').first();
		imageSelectorWrapperLast = imageMultipleWrapper.find('.image-selector-wrapper').last();
		imageSelectorWrapperLast.html(imageSelectorWrapperLast.html());
		imageSelectorWrapperLast.find('> i').first().hide();

		addUploadDeleteFunction(imageSelectorWrapperLast.find('.btn-upload').first());
		var btnUploadFile = $(imageMultipleWrapper.find('.image-selector-wrapper').get(imageMultipleWrapper.find('.image-selector-wrapper').length - 1)).find('.btn-upload-file').first();

		var name = imageSelectorWrapperFirst.find('[name]').first().attr('name');
		var newIndex = (imageMultipleWrapper.find('.image-selector-wrapper').length - 1);

		if (name.slice(-1) == ']'){
			name = name.substring(0, name.length - 2) + newIndex + ']';
		} else {
			name = name.substring(0, name.length - 1) + newIndex;
		}
		btnUploadFile.attr('name', name);
	}
	$(src).parent().find('> button > div').hide();
	$(src).parent().find('> i').show();
}

function addUploadDeleteFunction(uploadButton) {
	uploadButton.click(function () {
		$(this).parent().find('input.btn-upload-file').first().click();
	});
	var fileElement = uploadButton.parent().find('input.btn-upload-file').first()[0];
	var imageElement = uploadButton.find('img').first()[0];
	var uploadInstructionElement = uploadButton.find('div').first();
	showImage(fileElement, imageElement);

	//delete function
	uploadButton.parent().find(' > i').first().on('click', function () {
		$(fileElement).val('');
		$(imageElement).attr('src', '');
		uploadInstructionElement.show();
		$(this).hide();

		var name = $(fileElement).attr('name');
		if (name) {
			uploadButton.parent().append('<input type="hidden" name="' + $(fileElement).attr('name') + '" value="DELETE_IMAGE">');
			$(fileElement).attr('name', '');
		} else {
			name = uploadButton.parent().find('input[type=hidden]').first().attr('name');

			if (checkFormIsRequired(name)) {
				$(fileElement).attr('required', true);
			}

			uploadButton.parent().find('input[type=hidden]').first().val('DELETE_IMAGE');
		}
	});

}

function checkFormIsRequired(name) {
	var lastChar = name.substr(name.length - 1);
	var validName = name;

	if (!isNaN(parseInt(lastChar))) validName = validName.slice(0,-1);

	var valid = $.inArray(validName, formRequired);

	if (valid != -1) return true;

	return false;
}

$(document).ready(function () {

    // Ladda Button
    $('button[type=submit], button.submitButton').attr('data-style', 'zoom-in');

    $('button[type=submit]').click(function () {
        var btn =  $(this).ladda();
        btn.ladda('start');


        var form = $(this).parents('form');
        form.submit();
    });

	// language selector
	if ($('.lang-icon').length) {
		$('.lang-icon').click(function(){
			var animationSpeed = 200;
			var lang = $(this).attr('language');
			$('.lang-icon').removeClass('active');
			$(this).addClass('active');
			$('.languageSection').fadeOut(animationSpeed);
			$('.languageSection'+lang).delay(animationSpeed).fadeIn(animationSpeed*2);

			console.log(lang);
		});
	}
	// language selector


	// file change
	if($('.input-file-upload').length > 0){
		$('.input-file-upload').on('change', function(){
			if (this.files.length > 0){
				var getBytesValue = 0;

				if($(this).data('file-limit')) getBytesValue = convertSizeToBytes($(this).data('file-limit'));

				if (getBytesValue != 0 && this.files[0].size > getBytesValue){
					$(this).val('');
					iziModalError('The file size exceeds the limit allowed of '+$(this).data('file-limit'));
					return;
				} else{
					var name = $(this).attr("name");

					if(!name) {
						var getName = $(this).data('name');
						$(this).attr('name', getName);
						$(this).parent().prev().find('input[type=hidden]').attr('name', '');
					}
				}
			};
		})
	}

	$('.change-file-delete').click(function (e) {
		e.preventDefault();

		$(this).parent().find('[type=hidden]').val('DELETE_FILE');
		$(this).parent().toggleClass('hide');
		$(this).parent().next().find('input').prop('disabled', false);
		$(this).parent().next().toggleClass('hide');

		var getFileInput = $(this).parent().next().find('input[type=file]');
		var getRequiredAttr = getFileInput.data('required');

		if(getRequiredAttr != ''){
			getFileInput.prop('required', true);
		}
	});
	// file change


	//Lobipanel - draggable section
	if ($('.add-list').length > 0) {
		initLobiPanel();

		$('.add-list').click(function () {
			var parent = $(this).parent().parent().parent();
			var sectionTemplate = parent.find('.sectionTemplate').first().clone();
			var sectionContent = parent.find('.sectionContent').first();
			var noteEditor = sectionTemplate.find('.note-editor').first();

			if (noteEditor) {
				noteEditor.remove();
			}

			var sectionTemplateHTML = sectionTemplate.html();

			sectionContent.append(sectionTemplateHTML);
			var listSize = $(this).closest('.card').find('.sectionContent .lobipanelsection').length;
			sectionContent.find('.lobipanelsection .panel-title h4').last().html(listSize);

			$(this).closest('.card').find('.sectionContent .lobipanelsection').last().find('[name]').each(function () {
				var formName = $(this).attr('name');
				formName = formName.replaceAll("-1",(listSize-1));
				$(this).attr('name', formName);
			});
			initLobiPanel();
			initAllElement();
		});
	}
	//Lobipanel - draggable section

	if ($('.summernote').length){
		$('.summernote').each( function() {
			var originalText = $(this).parent().find('input[type=hidden]').first();
			if (originalText.prop('disabled') == true) {
				$(this).summernote('disable');
			}
		});
	}

});

function initAllElement() {

	if ($('.delete-button-modal').length){
		$('.delete-button-modal').click(function(){
			var url = $(this).data('url');
			$('#modal-delete-alert .delete-button-confirm').parent().attr('href', url);
		});

	}


    var oldOption = {
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['misc',['codeview']]
        ]
    }
    // summernote
    if ($('.summernote').length){
        $('.summernote').each(function(){
            if ($(this).parent().find('.note-editor').length === 0){
                $(this).summernote({
                    insertTableMaxSize: {
                        col: 100,
                        row: 100
                    },
                    maximumImageFileSize: 204800,
                    callbacks: {
                        onImageUploadError: function(error) {
                            if(error == 'Maximum file size exceeded.'){
                                iziModalError('Sorry, maximum Image size is 200kb.');
                            }
                        }
                    }
                });
            }
        })
    }
	// summernote

	// autonumeric
	if ($('.autonumeric, .autonumericDecimal').length) {
		$('.autonumeric').off();

		var autonumericOptions = {
			digitGroupSeparator: '.', 
			decimalPlacesOverride:0, 
			decimalCharacter  : ',', 
			unformatOnSubmit : true
		}; 
		$('.autonumeric').each(function() {
			var options = autonumericDecimalOptions; 
			if($(this).data('options')) {
				var additionalOptions = $(this).data('options').split(' '); 
				additionalOptions.forEach(function(option) {
					var optionData = option.split(':');
					var optionLabel = optionData[0]; 
					if(optionData.length == 1) {
						options[optionLabel] = true; 
					} else {
						options[optionLabel] = optionData[1]; 
					}
				}); 
			}
		});

		var autonumericDecimalOptions = {
			digitGroupSeparator: '.', 
			decimalPlacesOverride:2, 
			decimalCharacter  : ',', 
			unformatOnSubmit : true, 
			allowDecimalPadding: false
		}; 
		$('.autonumericDecimal').each(function() {
			var options = autonumericDecimalOptions; 
			if($(this).data('options')) {
				var additionalOptions = $(this).data('options').split(' '); 
				additionalOptions.forEach(function(option) {
					var optionData = option.split(':');
					var optionLabel = optionData[0]; 
					if(optionData.length == 1) {
						options[optionLabel] = true; 
					} else {
						options[optionLabel] = optionData[1]; 
					}
				}); 
			}
			$(this).autoNumeric('init', options); 
		});

		$('.autonumeric, .autonumericDecimal').change(function(){
			$(this).parent().find('.autonumericvalue').first().val( $(this).autoNumeric('get') );
		})
	}
	// autonumeric

	// datepicker
	if ($('.datepickerinput:not(.vue-datepickerinput)').length) {
		$('.datepickerinput:not(.vue-datepickerinput)').datetimepicker({format: 'DD MMM YYYY', showTodayButton: true});
		$('.datepickerinput:not(.vue-datepickerinput) input').click(function(){
			$(this).parent().find('span').first().click();
		});
	}
	if ($('.timepickerinput').length) {
		$('.timepickerinput').datetimepicker({format: 'HH:mm', showTodayButton: true});
		$('.timepickerinput input').click(function(){
			$(this).parent().find('span').first().click();
		});
	}
	// datepicker

	// checkbox with text
	if ($('.checkbox_text input[type=checkbox]').length) {
		$('.checkbox_text input[type=checkbox]').change(function(){
			var parent = $(this).closest('.checkbox_text');
			if ($(this).prop('checked')){
				parent.find('input[type=text]').prop('disabled', false);
				parent.find('input[type=hidden]').val($('.checkbox_text input[type=text]').autoNumeric('get'));
			} else {
				parent.find('input[type=text]').prop('disabled', true);
				parent.find('input[type=hidden]').val(-1);
			}
		});
	}
	// checkbox with text

	// select2
	if ($('.select2').length) {
		$('.select2').each(function(){
			if($(this).hasClass('select2-container')) return;
			$(this).select2({ placeholder: "Search here"});
		});
	}
	// select2

	// fastselect
	if ($('.fastselect').length) {
		$('.fastselect').each(function () {
			var sortedOption = $(this).find('option').sort(sort);
			$(this).html(sortedOption);

			$(this).fastselect();
			$(this).show();
			if ($(this).attr('disabled')) {
				$(this).parent().attr('disabled', true);
				$(this).parent().addClass('disabled');
				$(this).parent().find('input').attr('disabled', true);
			}
			;
		});
	}
	// fastselect

	$('[data-toggle="tooltip"]').tooltip();

	// image upload
	if ($('.btn-upload').length) {
		$('.btn-upload').each(function () {
			if ($(this).hasClass('vuejs')) return;
			$(this).off();
			addUploadDeleteFunction($(this));
		});
	}
	// image upload

	addPhoneValidation();

	if ($('.submitButton').length) {
		$('.submitButton').off();
		$('.submitButton').click(function (e) {
			if ($(this).hasClass('submitButtonConfirm')) {
				var label = $(this).html();
				var className = 'btn-primary';
				var url = $(this).data('url');

				$.each($(this).attr("class").split(' '), function (index, value) {
					if (value.match(/btn-.*/)) className = value;
				});
				swal({
						title: "",
						text: "Are you sure you want to " + label,
						type: "warning",
						showCancelButton: true,
						cancelButtonText: "Back",
						confirmButtonClass: className,
						confirmButtonText: label,
						closeOnConfirm: true
					},
					function () {
						$('#form').attr('action', url);
						submitForm();
					});
			} else {
				submitForm();
			}
		});
	}


	function submitForm() {
        var btn = $('button.submitButton').ladda();
        btn.ladda('start');

		if ($('.summernote').length){
			$('.summernote').each( function() {
				$(this).parent().find('input[type=hidden]').first().val($(this).summernote('code'));
			});
		}

		if (typeof customValidation === 'function') {
			var errorList = customValidation();
		} else {
			var errorList = [];
		}

		$('[required]').each(function(){
			if($(this).closest('.sectionTemplate').css('display') == 'none') return;

			var list = '';
			if ($(this).closest('.lobipanelsection').length > 0){
				var listName = $(this).closest('.card').find('.card-header').html().split('<')[0];
				var listIndex = Number($(this).closest('.lobipanelsection').data('index'))+1;
				list = listName + ' ' + listIndex + ', ';
			}
			var language = '';
			if ($('.languageSection').length > 1){
				var languageCode = $(this).closest('.languageSection').attr('class').split(' ')[1];
				languageCode = languageCode.split('languageSection')[1];
				language = languangeLabel[languageCode] + ' - ';
			}

			var label = $(this).attr('label');
			var value = $(this).val();
			if ($(this).hasClass('summernote')){
				value = $(this).summernote('code');
				value = value.replace(/^\s+|\s+$/g,"");
			}

			if($(this).attr('type') === 'password') {
				var passwordFieldName = $(this).attr('name');
				if(passwordFieldName.indexOf('confirm') != -1) return;

				var requiredPassword = $(this).parent().find('input[name='+passwordFieldName+']');
				var confirmPassword = $(this).parent().parent().parent().find('input[name=confirm'+passwordFieldName+']');

				if(!requiredPassword.val() || requiredPassword.val() == '') {
					errorList.push(language + list + label + ' required');
				}
				if(!confirmPassword.val() || confirmPassword.val() == '') {
					errorList.push(language + list + 'Confirm ' + label + ' required');
				}
				if(requiredPassword.val() != '' && confirmPassword.val() != '' && requiredPassword.val() != confirmPassword.val()) errorList.push(language + list + label + ' mismatch');
			} else {
				if (!value) errorList.push(language + list + label + ' required');
			}

			if ($(this).hasClass('fastselect')){
				if ($(this).prev('.fstControls').find('.fstChoiceItem').length == 0){
					errorList.push(language + list + label + ' required');
				}
			}
		});

		if (errorList.length == 0) {
			$('.submitButton, .cancelButton').attr('disabled', true);
			$('#form').submit();
		} else {
			displayError(errorList);
            btn.ladda('stop');
		}
	}
}

function initLobiPanel() {
	$('.sectionContent .lobipanelsection').lobiPanel({
		reload: false,
		editTitle: false,
		sortable: true,
		unpin: false,
		expand: false,
		minimize: {
			icon: 'fa fa-chevron-up',
			icon2: 'fa fa-chevron-down'
		},
	});
	$('.sectionContent .lobipanelsection').show();
	$('.sectionContent .lobipanelsection').on('dragged.lobiPanel', function (ev, lobiPanel, result, status, xhr) {
		$(this).closest('.card').find('.sectionContent .lobipanelsection').each(function (index) {
			var currentIndex = Number($(this).find('h4').html()) - 1;
			$(this).find('[name]').each(function(){
				var formName = $(this).attr('name');
				formName = formName.replaceAll("["+currentIndex+"]","["+index+"]");
				$(this).attr('name', formName);
			});
			$(this).find('h4').html(index+1);
		});
	});
	$('.sectionContent .lobipanelsection').on('beforeClose.lobiPanel', function (ev, lobiPanel, result, status, xhr) {
		var deletedIndex = Number($(this).find('h4').html()) - 1;
		var count = 1;
		$(this).closest('.card').find('.sectionContent .lobipanelsection').each(function (index) {
			if (index == deletedIndex) return;

			$(this).find('h4').html(count);
			$(this).find('[name]').each(function(){
				var formName = $(this).attr('name');
				formName = formName.replaceAll("["+index+"]","["+(count-1)+"]");
				$(this).attr('name', formName);
			});

			count++;
		});
	});
}

function displayError(errorList) {
	$('#alert-box').removeClass('hidden');
	$('#alert-box').show();
	var html = '<button type="button" class="close" ><span aria-hidden="true">&times;</span></button>';
	for (var i = 0; i < errorList.length; i++) {
		html += '<strong>Warning!</strong> ' + errorList[i] + '<br/>';
	}
	$('#alert-box-details').html(html);
	$('button.close').click(function () {
		$('#alert-box').hide();
	})

	$("html, body").animate({scrollTop: 0}, "slow");
	return false;
}

function hideError() {
	$('#alert-box').hide();
}

function iziModalError(subtitle){
	$("#izimodal").iziModal({
		title: 'Error',
		subtitle: subtitle,
		icon: 'icon-error',
		headerColor: '#BD5B5B',
		width: 600,
		transitionIn: 'fadeInDown',
		transitionOut: 'fadeOutDown',
		pauseOnHover: true
	});
	$('#izimodal').iziModal('open');
}