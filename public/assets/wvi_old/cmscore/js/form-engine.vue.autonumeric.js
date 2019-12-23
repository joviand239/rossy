Vue.component('vue-autonumeric', {
	template:   '<div class="form-group"><div class="input-group">' +
	'               <span v-if="labelLeft" class="input-group-addon">{{ labelLeft }}</span>' +
	'                   <input type="text" class="form-control autonumeric" :disabled="disabled"/>' +
	'               <span v-if="labelRight" class="input-group-addon">{{ labelRight }}</span>' +
	'           </div></div>',
	data: function() {
		return {
			thisAutoNumeric: null
		};
	},
    props: ['value', 'decimalPlacesOverride', 'digitGroupSeparator','decimalCharacter','allowDecimalPadding','unformatOnSubmit','label-left', 'label-right', 'disabled'],
	mounted: function() {

		var vueComponent = this;
		var defaultOption = {digitGroupSeparator: '.', decimalPlacesOverride:0, decimalCharacter  : ',', unformatOnSubmit : true, allowDecimalPadding: false};
        if (this.decimalPlacesOverride) defaultOption['decimalPlacesOverride'] = this.decimalPlacesOverride;
        if (this.digitGroupSeparator) defaultOption['digitGroupSeparator'] = this.digitGroupSeparator;
        if (this.decimalCharacter) defaultOption['decimalCharacter'] = this.decimalCharacter;
        if (this.allowDecimalPadding) defaultOption['allowDecimalPadding'] = this.allowDecimalPadding;
        if (this.unformatOnSubmit) defaultOption['unformatOnSubmit'] = this.unformatOnSubmit;

		this.thisAutoNumeric = $(vueComponent.$el).find('input').first().autoNumeric('init', defaultOption);
		$(vueComponent.$el).keyup(function(element, a, f  ){
			vueComponent.$emit('input', $(this).find('input').first().autoNumeric('get')) ;
		});
		this.thisAutoNumeric.autoNumeric('set', this.value);

	},
	watch: {
		'value': function(newValue) {
			this.thisAutoNumeric.autoNumeric('set', newValue);
		}
	}
});