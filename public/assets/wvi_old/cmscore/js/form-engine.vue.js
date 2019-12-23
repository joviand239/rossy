var vueMethods = {
	formSubmit(event) {
		var toSubmit = true;
		if (typeof formSubmit !== 'undefined'){
			this.$data.errors.splice(0, this.$data.errors.length);
			var toSubmit = formSubmit(this.$data);
			if (toSubmit == undefined) {
				toSubmit = (this.$data.errors.length == 0) ? true : false;
			}
		}
		if (toSubmit){
			$('#mainForm').addHiddenInputData(this.$data);
		} else {
			event.preventDefault();
			$('html, body').animate({scrollTop: '0px'}, 300);
		}
	}
};

if (typeof vueExtraMethods !== 'undefined') vueMethods = $.extend({}, vueMethods, vueExtraMethods);

var vueData = (typeof vueData !== 'undefined') ? $.extend({}, vueData, {errors:[]}) : {errors:[]};
$('[v-model]').each(function(vmodel){
	var name = $(this).attr('v-model');
	if(name.indexOf('.') === -1 && vueData[name] == undefined) {
		vueData[name] = '';
	}
})

var vueOptions = {
	el: '#vueApp',
	data: (typeof vueData !== 'undefined') ? $.extend({}, vueData, {errors:[]}) : {errors:[]},
	methods: vueMethods
};
if (typeof vueExtraOptions !== 'undefined') vueOptions = $.extend({}, vueOptions, vueExtraOptions);

$('input[type=file]').each(function(){
	$(this).attr('name', $(this).attr('v-model'))
});
var vueApp

	= new Vue(vueOptions);

