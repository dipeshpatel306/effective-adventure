require(['jquery', 'app/video', 'jqueryui', 'ckeditor'], function($, videohelper) {
	$(document).ready(function(){
		// Mark Risk Assessment Complete. Modal Window
		$('.markComplete').click(function(){
			$('.completeBox').dialog({
				height: 400,
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
