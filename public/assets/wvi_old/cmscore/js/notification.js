$(document).ready(function(){
	var notificationList = false;
	var lastCount = '';
	var lastUpdate = '';
	var seeAllHtml = '<li class="all"><a href="/admin/notification/my/list">See All Unread Notification</a></li>';
	$('li.dropdown.notification').hover(function(e){
		if (!notificationList || $('.dropdown.notification .dropdown-menu .action .demo').length > 0){
			refreshNotificationList();
		}
	});
	setInterval(function(){ refreshCount(); }, 10000);
	$('li.dropdown.notification .dropdown-menu .header .markall').click(function(e){
		$.get('/admin/notification/my/readall');
		updateNotificationHtmlNoUnread();
	});

	function refreshNotificationList(){
		notificationList = true;
		$.get('/admin/notification/my/badge/full').done(function( data ) {
			updateNotificationHtml(data);
		});
	}

	function refreshCount(){
		if ($('.dropdown.notification:hover').length > 0) return;

		$.get('/admin/notification/my/badge/summary').done(function( data ) {
			if ($('.dropdown.notification:hover').length > 0) return;

			if (lastUpdate != data.data.lastUpdate || lastCount != data.data.count) {
				notificationList = false;

				$('.avatar-icon-counter').removeClass("pulse");
				setTimeout(function(){
					$('.avatar-icon-counter').addClass("pulse");
				},1 );
			}
			updateNotificationHtml(data);
		});
	}

	function updateNotificationHtml(data){
		if (data.status == 'success'){
			lastCount = data.data.count;
			lastUpdate = data.data.lastUpdate;

			if (data.data.count == 0){
				updateNotificationHtmlNoUnread();
			} else {
				if (data.data.list){
					var html = '';
					data.data.list.forEach(function(notification){
						html += '<li>';
						if(notification.url && notification.url != '' ) html += '<a href="/admin/notification/my/topic/'+notification.id+'">';
						html += notification.message;
						if(notification.url && notification.url != '' ) html += '</a>';
						html += '</li>';
					});
					$('.dropdown.notification .dropdown-menu .action').html(html + seeAllHtml );
				} else {
					var html = '';
					var loopCount = data.data.count > 5 ? 5 : data.data.count; 
					for(var i=0; i< loopCount;i++){
						html += '<li><div class="demo"></div></li>';
					}
					$('.dropdown.notification .dropdown-menu .action').html(html + seeAllHtml );
				}
				$('.dropdown.notification .avatar-icon-counter').html(data.data.count);

				$('.dropdown.notification .avatar-icon-counter').removeClass('hidden');
				$('.dropdown.notification .avatar-icon').addClass('faa-shake');
				$('.dropdown.notification .avatar-icon').addClass('animated');
				$('.dropdown.notification .dropdown-menu .header .markall').removeClass('hidden');
			}
		} else{
			alert(data.msg);
		}
	}

	function updateNotificationHtmlNoUnread(){
		$('.dropdown.notification .dropdown-menu .action').html('<li class="empty">There is no New Notification</li>' + seeAllHtml );

		$('.dropdown.notification .avatar-icon-counter').addClass('hidden');
		$('.dropdown.notification .avatar-icon').removeClass('faa-shake');
		$('.dropdown.notification .avatar-icon').removeClass('animated');
		$('.dropdown.notification .dropdown-menu .header .markall').addClass('hidden');
	}
});