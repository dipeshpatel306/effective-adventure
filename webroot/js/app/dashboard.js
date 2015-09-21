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
			videohelper.showVideo('#introvideo');
		});
		
		// Stop and Close Video Player. Hide pop up region
		$('.closeVideo').click(videohelper.closeVideo);
		
		$('#ClientDisplayIntroVideo').change(function() {
			var display = this.checked ? '0' : '1';
			var data = { 'data[Client][display_intro_video]' : display };
			$.post($('#ClientIndexForm').attr('action'), data);
		});
		
		$('#showintro').click(function() {
			videohelper.showVideo('#introvideo');
		});
	});
});
