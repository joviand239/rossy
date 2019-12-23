Vue.component('vue-select2-tag', {
	template: '<select class="form-control" multiple></select>',
	data: function() {
		return {
			thisSelect: null,
			items: this.value
		};
	},
	mounted: function() {

		var vueComponent = this;
		vueComponent.items.forEach(function(item){
			$(vueComponent.$el).append('<option value="'+item.id+'" selected>'+item.text+'</option>');
		});

		this.thisSelect = $(this.$el).select2({
			tags: true,
			tokenSeparators: [',', ' '],
			createTag: function (params) {
				var duplicate = false;
				vueComponent.items.forEach(function(item){
					if(item.text == params.term) duplicate = true;
				})
				if (duplicate) return null;

				var tag = {
					id: params.term,
					text: params.term
				};

				return tag;
			},
			dropdownCssClass : 'hidden'
		}).on("select2:select", function(e) {
			vueComponent.items.push(e.params.data);
		}).on('select2:unselect', function(e){
			vueComponent.items.forEach(function(item, index){
				if(item.id == e.params.data.id) vueComponent.items.splice(index, 1);
			})
		});
	},
	props: ['value'],
	watch: {
		'value': function(newItems) {
			var select2Element = $(this.$el);
			select2Element.html('');
			newItems.forEach(function(item){
				select2Element.append('<option value="'+item.id+'" selected>'+item.text+'</option>');
			});
			this.thisSelect.trigger('change');
			this.$emit('input', newItems);
		}
	}
});

Vue.component('vue-select2-ajax', {
	template: '<select class="form-control" :multiple="multiple ? true : false"></select>',
	data: function() {
		return {
			thisSelect: null,
			isMultiple: this.multiple && this.multiple == "true" ? true : false
		};
	},
	props: {
		value : Object,
		url : String,
		key : String,
		limit : String,
		onSelect : String,
		getValue : String,
		selectedValue : String,
		multiple : Boolean,
		selectedObject : Object,
	},
	mounted: function() {

		var vueComponent = this;
		vueComponent.changeFromParent = true;

		if (this.isMultiple) {
			// $(vueComponent.$el).attr('isMultiple', true);
			vueComponent.value.forEach(function(item){
				$(vueComponent.$el).append('<option value="'+item.id+'" selected>'+item.name+'</option>');
			});
		} else {
			$(vueComponent.$el).html(
				'<option value="'+vueComponent.value+'">'+vueComponent.selectedValue+'</option>'
			);
		}

		var indexName = this.key ? this.key : 'id';
		var valueName = this.getValue ? this.getValue : 'name';
		var dataLimit = this.limit ? this.limit : '10';
		var url = this.url + (this.url.indexOf('?') !== -1 ? '&' : '?')  + 'limit=' + dataLimit;
		var options = {
			ajax: {
				url: url,
				dataType: 'json',
				processResults: function (data) {
					var processedData = [];
					$.each(data, function(index, item){
						processedData.push({
							id: item[indexName],
							text: item[valueName],
							data: item
						});
					})
					return {
						results: processedData
					};
				}
			}
		};

		if (this.isMultiple) {
			options.tags = false;
			options.tokenSeparators = [',', ' '];
			options.createTag = function (params) {
				var duplicate = false;
				vueComponent.value.forEach(function(item){
					if(item.text == params.term) duplicate = true;
				});
				if (duplicate) return null;

				var tag = {
					id: params.term,
					text: params.term
				};

				return tag;
			};

		}

		var select2 = $(vueComponent.$el).select2(options);

		if (this.isMultiple) {
			select2.on("select2:select", function(e) {
				vueComponent.value.push(e.params.data);
				vueComponent.changeFromParent = false;
			}).on('select2:unselect', function(e){
				vueComponent.value.forEach(function(item, index){
					if(item.id == e.params.data.id) vueComponent.value.splice(index, 1);
				})
				vueComponent.changeFromParent = false;
			});
		} else {
			select2.on('select2:select', function(){
				var self = $(this);
				if(vueComponent.onSelect) vueComponent.$parent.$options.methods[vueComponent.onSelect](self.select2('data')[0], self);
				if(vueComponent.selectedObject) vueComponent.selectedObject = self.select2('data')[0].data;
				else vueComponent.value = self.select2('data')[0].id;
				vueComponent.changeFromParent = false;
			});
		}
	},
	methods: {
		foo: function() {
			return '$parent.'+this.selectedObject;
		}
	},
	watch: {
		'value': function(newValue, oldValue) {
			var select2Element = $(this.$el);
			if (!this.isMultiple) {
				this.$emit('input', newValue);
				return;
			}

			if (this.changeFromParent){
				select2Element.html('');
				newValue.forEach(function(item){
					select2Element.append('<option value="'+item.id+'" selected>'+item.text+'</option>');
				});
			} else {
				this.$emit('input', newValue);
			}
			this.changeFromParent = true;
		},
		'selectedObject': function(newValue, oldValue){
			var select2Element = $(this.$el);
			if (this.isMultiple) return;

			if (this.changeFromParent){
				var valueName = this.getValue ? this.getValue : 'name';
				select2Element.select2().empty();
				select2Element.select2( {data : [{ id: newValue.id, text: newValue[valueName] }] });
			} else {
				this.$emit('update:selectedObject', newValue);
			}
			this.$emit('input', newValue.id);
			this.changeFromParent = true;
		}
	}
});