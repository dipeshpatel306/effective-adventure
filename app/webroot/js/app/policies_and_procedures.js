require(['jquery', 'app/video', 'app/form', 'ckeditor'], function($, videohelper) {
	$(document).ready(function() {
		// Policies and Procedures Video
		$('.papVideo a.policyName').click(function(){
			videohelper.showVideo('Policy' + $(this).attr('id'));
		});
		
		// Stop and Close Video Player. Hide pop up region
		$('.closeVideo').click(videohelper.closeVideo);
	});
});
