Vue.component('vue-date', {
	template:     '<div class="input-group date datepickerinput vue-datepickerinput">'
				+ '     <input type="text" class="form-control" :disabled="disabled">'
				+ '     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>'
				+ '</div>',
	props: ['value', 'format', 'disabled'],
	mounted: function() {

		var vueComponent = this;

		vueComponent.thisDatepicker = $(vueComponent.$el).datetimepicker({
			format: vueComponent.format ? vueComponent.format : 'DD MMM YYYY',
			showTodayButton: true
		});

		vueComponent.thisDatepicker
			.on("dp.change", function (e) {
				if(!vueComponent.disabled) vueComponent.$emit('input', $(vueComponent.$el).data("DateTimePicker").date()) ;
			});

		var selectedDate = moment(vueComponent.value); 

		vueComponent.thisDatepicker.data("DateTimePicker").date(selectedDate); 
	},
	watch: {
		'value': function(newValue) {
			var vueComponent = this;
			$(vueComponent.$el).data("DateTimePicker").date(newValue);
		}
	}
});

Vue.component('vue-date-range', {
	template:     '<div class="input-group input-date-range">'
				+ '     <input type="text" class="datepickerinput vue-datepickerinput from form-control" :disabled="disabled">'
				+ '     <span class="input-group-addon">To</span>'
				+ '     <input type="text" class="datepickerinput vue-datepickerinput to form-control" :disabled="disabled">'
				+ '</div>',
	props: ['from', 'to', 'format', 'disabled'],
	data: function() {
		return {
			from: this.from,
			to: this.to
		};
	},
	mounted: function() {

		var vueComponent = this;

		var datepickerOption = {
			format: vueComponent.format ? vueComponent.format : 'DD MMM YYYY',
			showTodayButton: true
		};

		vueComponent.thisDatepickerFrom = $(vueComponent.$el).find('.datepickerinput.from').first().datetimepicker(datepickerOption);
		vueComponent.thisDatepickerTo = $(vueComponent.$el).find('.datepickerinput.to').first().datetimepicker(datepickerOption);

		var dateFrom = moment(vueComponent.from);
		var dateTo = moment(vueComponent.to);

		vueComponent.thisDatepickerFrom.data("DateTimePicker").date(dateFrom);
		vueComponent.thisDatepickerTo.data("DateTimePicker").date(dateTo);

		vueComponent.$emit('update:from', dateFrom.isValid() ? dateFrom : '') ;
		vueComponent.$emit('update:to', dateTo.isValid() ? dateTo : '') ;

		vueComponent.thisDatepickerFrom
			.on("dp.change", function (e) {
				if(!vueComponent.disabled) updateFromToDate('from');
			});
		vueComponent.thisDatepickerTo
			.on("dp.change", function (e) {
				if(!vueComponent.disabled) updateFromToDate('to');
			});

		function updateFromToDate(field){
			var dateFrom = vueComponent.thisDatepickerFrom.data("DateTimePicker").date();
			var dateTo   = vueComponent.thisDatepickerTo.data("DateTimePicker").date();

			if(!empty(dateFrom) && !empty(dateTo) && dateFrom.isAfter(dateTo)){
				if (field == 'from') dateTo = null;
				if (field == 'to') dateFrom = null;
			}
			vueComponent.$emit('update:from', dateFrom) ;
			vueComponent.$emit('update:to', dateTo) ;
			vueComponent.thisDatepickerFrom.data("DateTimePicker").date(dateFrom);
			vueComponent.thisDatepickerTo.data("DateTimePicker").date(dateTo);
		}
	},
	watch: {
		'value': function(newValue) {
			var vueComponent = this;
			$(vueComponent.$el).data("DateTimePicker").date(newValue);
		}
	}
});