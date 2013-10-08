$(document).ready(function(){

	$('#social-stream').dcSocialStream({
		feeds:{
			facebook:{
				id: '132416226824065',
				out: 'intro,thumnb,title,user,share',
				icon: 'facebook.png'
			},
			twitter:{
				id: 'HIPAASecureNow',
				url: '/webroot/js/jquery-social-stream/twitter.php'
			}
		},
		twitterId: 'HIPAASecureNow',
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

	// Toggle div based upon checkbox (org profile)

		$('.orgSecondLocation, .orgThirdLocation, .orgFourthLocation, .orgFifthLocation, .otherEmail, .otherReason, .otherDescription, .otherReason').hide(); // first hide fields
		// toggle field visibility
  		$('.orgCheck2').change(function () {
     		$('.orgSecondLocation').toggle(this.checked);
  		}).change();

		$('.orgCheck3').change(function () {
     		$('.orgThirdLocation').toggle(this.checked);
  		}).change();

		$('.orgCheck4').change(function () {
     		$('.orgFourthLocation').toggle(this.checked);
  		}).change();
		$('.orgCheck5').change(function () {
     		$('.orgFifthLocation').toggle(this.checked);
  		}).change();

  		// toggle other email
		$('#OrganizationProfileEmailVendor').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Other'){
				$('.otherEmail').toggle(this.checked);
			} else {
				$('.otherEmail').hide();
			}
		}).change();

  		// toggle other OS
		$('#OrganizationProfileEmrEhrOs').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Other'){
				$('.otherEmrOs').toggle(this.checked);
			} else {
				$('.otherEmrOs').hide();
			}
		}).change();

  		// toggle other EMR/EHR Location
		$('#OrganizationProfileEmrEhrLocation').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Other'){
				$('.emrEhrOtherLoc').toggle(this.checked);
			} else {
				$('.emrEhrOtherLoc').hide();
			}
		}).change();

		 // toggle server room access
		$('#ServerRoomAccessReason').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Other'){
				$('.otherReason').toggle(this.checked);
			} else {
				$('.otherReason').hide();
			}
		}).change();

		 // toggle server room access
		$('#ServerRoomAccessChanged').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Yes'){
				$('.whatChanged').toggle(this.checked);
			} else {
				$('.whatChanged').hide();
			}
		}).change();

		// toggle Ephi removed
		$('#EphiRemovedItem, #EphiReceivedItem').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Other'){
				$('.otherDescription').toggle(this.checked);
			} else {
				$('.otherDescription').hide();
			}
		}).change();

		// toggle Ephi removed reason
		$('#EphiRemovedReason, #EphiReceivedReason').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Other'){
				$('.otherReason').toggle(this.checked);
			} else {
				$('.otherReason').hide();
			}
		}).change();
		
		// Security Incidents
		$('#SecurityIncidentCauseOfIncident').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Other'){
				$('.causeOther').toggle(this.checked);
			} else {
				$('.causeOther').hide();
			}
		}).change();		
		
		$('#SecurityIncidentAssetsInvolved').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Other'){
				$('.otherAssets').toggle(this.checked);
			} else {
				$('.otherAssets').hide();
			}
		}).change();	
		
		$('#SecurityIncidentSystemsInvolved').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Other'){
				$('.otherSystemsInvolved').toggle(this.checked);
			} else {
				$('.otherSystemsInvolved').hide();
			}
		}).change();	
		
		$('#SecurityIncidentBreachNotificationRa').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'No'){
					$('.breachBox').dialog({
					height: 200,
					width: 300,
					modal: true,
					resizable: false,
				});
				$('.breachQuestion').hide();
			} else if (selected === 'Yes'){
				$('.breachQuestion').toggle(this.checked);
				
			} else {
				$('.breachQuestion').hide();
			}
		}).change();		
		
		$('#SecurityIncidentInformedIndividual').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Yes'){
				$('.breachDetails').toggle(this.checked);
			} else {
				$('.breachDetails').hide();
			}
		}).change();	
		
		$('#SecurityIncidentNotifyHhs').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Yes'){
				$('.notifyHhs').toggle(this.checked);
			} else {
				$('.notifyHhs').hide();
			}
		}).change();	
		
		$('#SecurityIncidentNotifyMedia').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Yes'){
				$('.notifyMediaDate').toggle(this.checked);
			} else {
				$('.notifyMediaDate').hide();
			}
		}).change();	
		
		$('#SecurityIncidentEffectMoreThan500').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Yes'){
				$('.notifyDetails').toggle(this.checked);
				$('.500individualsBox').dialog({
					height: 300,
					width: 400,
					modal: true,
					resizable: false,
				});
			} else if(selected === 'No'){
				$('.notifyDetails').hide();
				$('.500individualsBox').dialog({
					height: 300,
					width: 400,
					modal: true,
					resizable: false,
				});
			} else {
				$('.notifyDetails').hide();
			}
		}).change();			
		
		$('#SecurityIncidentAfterCompleting').change(function(){
			var selected;
			selected = $(this).val();
			if(selected === 'Yes'){
				$('.breachCompleteYes').dialog({
					height: 630,
					width: 700,
					modal: true,
					resizable: false,
				});
			} else if(selected === 'No'){
				$('.breachCompleteNo').dialog({
					height: 300,
					width: 300,
					modal: true,
					resizable: false,
				});
			} else {
				$('.breachCompleteYes, .breachCompleteNo').hide();
			}
		}).change();			
		
	// Mark Risk Assessment Complete. Modal Window
		$('.markComplete').click(function(){
			$('.completeBox').dialog({
				height: 400,
				width: 600,
				modal: true,
				resizable: false,
			});
		});

		$('.closeBox').click(function(){
			$('.completeBox').dialog('close');

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

