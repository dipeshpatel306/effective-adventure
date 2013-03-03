$(document).ready(function(){
	//CKEDITOR.replace( 'textEdit'); // initialize WYSIWYG Editor
	
	// instantiate date picker and format date
	$('.datePick').datepicker({ dateFormat: 'mm/dd/yy',  defaultDate: '' });
	
	// Multistep form wizard for Risk Assessment Questionnaire
	$('form#RiskAssessmentTakeRiskAssessmentForm .step1').siblings().hide('fast');  // hide all except question one
	
	$('form#RiskAssessmentTakeRiskAssessmentForm .next').click(function(){
		$(this).closest('.step').hide().next('.step').show();
		return false;
	})
	$('form#RiskAssessmentTakeRiskAssessmentForm .back').click(function(){
		$(this).closest('.step').hide().prev('.step').show();
		return false;
	});
	
	//$('form').quickWizard();
	
// Jwplayer	
	function showVideo(mp4Name) {
		jwplayer("mediaplayer").setup({
			'autostart' : 'true',
			'id' : 'playerID',
			'width' : '800',
			'height' : '480',
			//'provider' : 'rtmp',
			// /'streamer' : 'rtmp://stream.entegration.net/vod',
			'file' : 'http://stream.entegration.net/vod/' + mp4Name + '.mp4'
			/*'modes' : [
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
			]*/
		});
	
		$('#videooverlay').css('display', 'inline');
	
		$('#videocontainer').css('display', 'inline');
	}	
	
	// Event Handlers for loading pop up javascript videos
	$('.WhatIsHIPAAPart1').click(function(){
		showVideo('WhatIsHIPAAPart1');	
	});
	$('.WhatIsHIPAAPart2').click(function(){
		showVideo('WhatIsHIPAAPart2');	
	});
	$('.BestPracticesforProtectingePHI').click(function(){
		showVideo('BestPracticesforProtectingePHI');	
	});
	$('.Overview').click(function(){
		showVideo('Overview');	
	});
	
	// Stop and Close Video Player. Hide pop up regeion
	$('.closeVideo').click(function(){
       $('#videooverlay').css('display', 'none');               
       $('#videocontainer').css('display', 'none');
       jwplayer().stop();
       $('#mediaplayer').empty();
	});
});



	