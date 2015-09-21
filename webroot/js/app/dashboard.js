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
			if ($(this).attr('show') == 1) {
				videohelper.showVideo('#introvideo');
			}
		});
		
		// Stop and Close Video Player. Hide pop up region
		$('.closeVideo').click(videohelper.closeVideo);
		
		$('#UserDisplayIntroVideo').change(function() {
			var display = this.checked ? '0' : '1';
			var data = { 'data[User][display_intro_video]' : display };
			$.post($('#UserIndexForm').attr('action'), data);
		});
		
		$('#showintro').click(function() {
			videohelper.showVideo('#introvideo');
		});
	});
});
