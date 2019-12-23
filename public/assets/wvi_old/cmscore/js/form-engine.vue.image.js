Vue.component('vue-image', {
	template:   '<div class="form-group">' +
	'   <div class="image-selector-wrapper" v-for="(image, index) in images"> ' +
	'       <input type="file" name="featuredImage_" accept=".jpg,.jpeg,.png" data-image-limit="1240000" class="hidden btn-upload-file" @change="processFile($event, index)" v-if="!disabled"> ' +
	'       <button type="button" class="btn-upload thumbnail vuejs" v-bind:class="{\'disabled\' : disabled}" onclick="$(this).parent().find(\'input\').first().click()"> ' +
	'           <img v-if="image.name.length != 0" :src="image.url"> ' +
	'           <div v-if="image.name.length == 0"> ' +
	'               <i class="fa fa-upload"></i> <br/>Select Image ' +
	'           </div> ' +
	'       </button> ' +
	'       <i class="fa fa-trash-o image-delete-icon" v-if="image.name.length != 0 && !disabled" v-on:click="removeFile($event, index)"></i> ' +
	'   </div>'+
	'</div>',
	props: ['images','maxCount', 'disabled'],
	methods: {
		processFile(event, index) {
			var vueComponent = this;

			var input = event.target;
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = (e) => {
					vueComponent.images[index].name = input.files[0].name;
					vueComponent.images[index].url = e.target.result;
					if (!vueComponent.maxCount && (index+1) == vueComponent.images.length) vueComponent.images.push({name: '',  url:''});
					vueComponent.$forceUpdate();
				}
				reader.readAsDataURL(input.files[0]);
			}
		},
		removeFile(event, index) {
			$(event.target).closest('.image-selector-wrapper').find('input')[0].files[0] = '';
			this.images.splice(index, 1);
			this.$forceUpdate();
		}
	},
	model: {
		prop: 'images',
	},
	mounted: function() {
		var vueComponent = this;

		$(vueComponent.$el).find('button').off();

		if (!Array.isArray(this.images)){
			if (!this.images || this.images == ''){
				this.images = [];
			} else {
				this.images = [{name: this.images, url:this.images}];
			}
		}

		if(!vueComponent.disabled) {
			if (this.maxCount) {
				for(var index=0; index < parseInt(this.maxCount); index++){
					if(!vueComponent.images[index]) vueComponent.images[index] = {name: '',  url:''};
				}
			}
			else{
				this.images.push({name: '',  url:''});
			}
		}

		this.images.forEach(function(image, index ){
			if(image.url != '') vueComponent.images[index].url = uploadImageUrl + '/md/' + image.url;
		});

		vueComponent.$emit('input', this.images) ;
		this.$forceUpdate();
	},
	watch: {
		'images': function(newValue) {
			var vueComponent = this;
			if (!Array.isArray(newValue)){
				if (!newValue || newValue == ''){
					this.images = [{name: '',  url:''}];
				} else {
					this.images = [{name: newValue, url:newValue}];
				}
			}
			else if (newValue.length == 0){
				if (this.maxCount) {
					for(var index=0; index < parseInt(this.maxCount); index++){
						if(!vueComponent.images[index]) vueComponent.images[index] = {name: '',  url:''};
					}
				}
				else{
					this.images.push({name: '',  url:''});
				}
			}
			vueComponent.$emit('input', this.images) ;
			this.$forceUpdate();
		}
	}
});