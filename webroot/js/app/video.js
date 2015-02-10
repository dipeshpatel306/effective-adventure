define(['jquery', 'jwplayer'], function($, jwplayer) {
	// Jwplayer
	function showVideo(mp4Name, containerid, autostart, width, height) {
	    containerid = (typeof containerid === "undefined") ? "mediaplayer" : containerid;
	    autostart = (typeof autostart === "undefined") ? "true" : autostart;
	    width = (typeof width === "undefined") ? "800" : width;
	    height = (typeof height === "undefined") ? "480" : height;
		jwplayer(containerid).setup({
		    playlist: [{
		        sources: [{
		            file: "rtmp://stream.entegration.net/vod/mp4:" + encodeURIComponent(mp4Name) + ".mp4",
		        },{
		            file: "http://stream.entegration.net/vod/" + encodeURIComponent(mp4Name) + ".mp4",
		        }]
		    }],
		    width: width,
		    height: height,
		    autostart : autostart,
		    primary : 'flash',
		    flashplayer : '/js/lib/jwplayer/jwplayer.flash.swf'
		});
		$('#videooverlay').css('display', 'inline');
		$('#videocontainer').css('display', 'inline');
	}
	
	function closeVideo() {
		// Stop and Close Video Player. Hide pop up region
    	$('#videooverlay').css('display', 'none');
       	$('#videocontainer').css('display', 'none');
       	jwplayer().stop();
       	$('#mediaplayer').empty();
	}
	
	return { showVideo : showVideo, closeVideo : closeVideo };
});
