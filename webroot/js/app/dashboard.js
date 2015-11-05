require(['jquery', 'app/video', 'jqueryui', 'ckeditor'], function($, videohelper) {
	$(document).ready(function(){
		// Mark Risk Assessment Complete. Modal Window
		$('.markComplete').click(function(){
			$('.completeBox').dialog({
				height: 500,
				width: 600,
				modal: true,
				resizable: false,
			});
		});

		$('.completeClose').click(function(){
			$('.completeBox').dialog('close');
			$('.thanksBox').dialog({
			    height: 270,
			    width: 675,
			    modal: true,
			    resizable: false
			});
		});
		
		$('#introvideo').each(function() {
			if ($(this).attr('show') == 1 && (document.referrer.indexOf('login') >= 0 || document.referrer.indexOf('backdoor') >= 0)) {
				videohelper.showVideo('introvideo');
				$('.videoForm').show();
			}
		});
		
		$('.videoOnClick').click(function() {
			videohelper.showVideo($(this).attr('id'));
		});
		
		// Stop and Close Video Player. Hide pop up region
		$('.closeVideo').click(function() {
			videohelper.closeVideo();
			$('.videoForm').hide();
		});
		
		$('#UserDisplayIntroVideo').change(function() {
			var display = this.checked ? '0' : '1';
			var data = { 'data[User][display_intro_video]' : display };
			$.post($('#UserIndexForm').attr('action'), data);
		});
		
		$('#showintro').click(function() {
			videohelper.showVideo('introvideo');
			$('.videoForm').show();
		});
	});
});
