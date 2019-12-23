$(document).ready(function(){
	initAutoComplete();

});

function initAutoComplete(){
	$("[select2ajax]").each(function(){
		var self = $(this);

		var getValue = $(this).attr('getvalue');
		if (!getValue) getValue = 'name';

		var key = $(this).attr('key');
		if (!key) key = 'id';

		var url = $(this).attr('url');
		var limit = $(this).attr('limit');
		if (!limit){
			limit = 10;
		}
		url += (url.indexOf('?') !== -1 ? '&' : '?') + 'limit=' + limit;

		var options = {
			ajax: {
				url: url,
				dataType: 'json',
				processResults: function (data) {
					var processedData = [];
					$.each(data, function(index, item){
						processedData.push({
							id: item[key],
							text: item[getValue]
						});
					})
					return {
						results: processedData
					};
				}
			}
		};

		if($(this).attr('placeholder')) {
			options.placeholder = $(this).attr('placeholder'); 
		}

		var onSelectFunction = $(this).data('select2click');
		$(this).select2(options).on('select2:select', function(){
			var self = $(this);
			window[onSelectFunction]($(this).select2('data')[0], self);
		});
	});
}