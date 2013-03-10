$(document).ready(function(){
	
	$('#social-stream').dcSocialStream({
		feeds:{
			facebook:{
				id: '132416226824065',
				out: 'intro,thumnb,title,user,share',
				icon: 'facebook.png'
			},
			/*twitter:{
				id: 'HIPAASecureNow',
			}*/
		},
		//twitterId: 'designchemical',
		days: 30,
		iconPath: '/js/jquery-social-stream/images/',
		imagePath: '/js/jquery-social-stream/images/'
	});
	
	$('#social-wall').dcSocialStream({
		feeds:{
			facebook: {
				id: '132416226824065,Facebook Timeline/132416226824065'
			},
		},
		days: 30,
		iconPath: '/js/jquery-social-stream/images/',
		imagePath: '/js/jquery-social-stream/images/'
	})

	// Slide show for risk assessment
	$(function(){
		$('#slides').slides({
			preload: true,
			//generateNextPrev: true
		});
	});	
		
	$('.organizationProfiles ul.tabs').each(function(){
	    // For each set of tabs, we want to keep track of
	    // which tab is active and it's associated content
	    var $active, $content, $links = $(this).find('a');
	
	    // If the location.hash matches one of the links, use that as the active tab.
	    // If no match is found, use the first link as the initial active tab.
	    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
	    $active.addClass('active');
	    $content = $($active.attr('href'));
	
	    // Hide the remaining content
	    $links.not($active).each(function () {
	        $($(this).attr('href')).hide();
	    });
	
	    // Bind the click event handler
	    $(this).on('click', 'a', function(e){
	        // Make the old tab inactive.
	        $active.removeClass('active');
	        $content.hide();
	
	        // Update the variables with the new link and content
	        $active = $(this);
	        $content = $($(this).attr('href'));
	
	        // Make the tab active.
	        $active.addClass('active');
	        $content.show();
	
	        // Prevent the anchor's default click action
	        e.preventDefault();
	    });
	});	

	// Jwplayer	
	function showVideo(mp4Name) {
		jwplayer("mediaplayer").setup({
			'autostart' : 'true',
			'id' : 'playerID',
			'width' : '800',
			'height' : '480',
			'provider' : 'rtmp',
			'streamer' : 'rtmp://stream.entegration.net/vod',
			'file' : 'http://stream.entegration.net/vod/' + mp4Name + '.mp4',
			'modes' : [
				{
					type : 'flash',
					src : 'https://www.hipaasecurenow.com/jwplayer/player.swf'
				},
				{
					type : 'html5',
					config : {
						'file' : 'http://stream.entegration.net/vod/' + mp4Name + '.mp4',
						'provider' : 'video',
						'autostart' : 'true'
					}
				},
				{
					type : 'download',
					config : {
						'file' : 'http://stream.entegration.net/vod/' + mp4Name + '.mp4',
						'provider' : 'video'
					}
				}
			]			
		});
	
		$('#videooverlay').css('display', 'inline');
		$('#videocontainer').css('display', 'inline');
	}	
	
	// load education videos
	$('.educationCenter .dashBox.eduVideo, .educationCenter dd.eduVideo a').click(function(){
		var eduVideo = $(this).attr('id');
		eduVideo = encodeURIComponent(eduVideo);
		showVideo(eduVideo);
	});
		
	// Policies and Procedures Video
	$('.papVideo a.policyName').click(function(){		
		var videoName = $('span.videoName').text();
		videoName = encodeURIComponent(videoName);
		showVideo(videoName);
	});

	// Stop and Close Video Player. Hide pop up region
	$('.closeVideo').click(function(){
       $('#videooverlay').css('display', 'none');               
       $('#videocontainer').css('display', 'none');
       jwplayer().stop();
       $('#mediaplayer').empty();
	});
	
	// instantiate date picker and format date
	$('.datePick').datepicker({ dateFormat: 'mm/dd/yy',  defaultDate: '' });
});

