require(['jquery', 'app/video'], function($, videohelper) {
	$(document).ready(function() {
		// load education videos
		$('.educationCenter .dashBox.eduVideo, .educationCenter dd.eduVideo a').click(function(){
			videohelper.showVideo($(this).attr('id'));
		});
	
	    $('.staticvideo').each(function(){
	       videohelper.showVideo($(this).attr('id')); 
	    });
	    
	    // Stop and Close Video Player. Hide pop up region
		$('.closeVideo').click(videohelper.closeVideo);
	});
});
