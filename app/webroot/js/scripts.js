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
		iconPath: '/js/jquery-social-stream/images/dcsns-dark/',
		imagePath: '/js/jquery-social-stream/images/dcsns-light-1/'
	});

	$('#social-wall').dcSocialStream({
		feeds:{
			facebook: {
				id: '132416226824065,Facebook Timeline/132416226824065'
			},
			twitter: {
			    id: 'hipaasecurenow',
                thumb: true
			}
		},
		days: 30,
		iconPath: '/js/jquery-social-stream/images/dcsns-dark/',
		imagePath: '/js/jquery-social-stream/images/dcsns-light-1/',
		height: '635'
	});

	// Slide show for risk assessment
	$(function(){
		$('#slides').slides({
			preload: true,
			//generateNextPrev: true
		});
	});

    $('input[type=tel]').mask('999-999-9999');

	$('.organizationProfiles ul.tabs').each(function(){
	    // For each set of tabs, we want to keep track of
	    // which tab is active and it's associated content
	    var $active, $content, $links = $(this).find('a');
	    var nextIdx;

	    // If the location.hash matches one of the links, use that as the active tab.
	    // If no match is found, use the first link as the initial active tab.
	    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
	    $active.addClass('active');
	    $content = $($active.attr('href'));
	    
	    // Hide the remaining content
	    $links.not($active).each(function () {
	        $($(this).attr('href')).hide();
	    });
	    
	    nextIdx = parseInt($active.attr('href').charAt($active.attr('href').length-1)) + 1;
	    if (nextIdx > $links.length) {
	        $('.nexttab').hide();
	    } else {
	        $('.nexttab').show();
	        $('.nexttab').attr('href', '#tab' + nextIdx);
	    }

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

            nextIdx = parseInt($active.attr('href').charAt($active.attr('href').length-1)) + 1;
            if (nextIdx > $links.length) {
                $('.nexttab').hide();
            } else {
                $('.nexttab').show();
                $('.nexttab').attr('href', '#tab' + nextIdx);
            }

	        // Prevent the anchor's default click action
	        e.preventDefault();
	    });
	    
	    $('.nexttab').click(function(e){
	        $active.removeClass('active');
	        $content.hide();
	        
	        $active = $($links.filter("[href=" + $(this).attr('href') + "]")[0]);
	        $content = $($(this).attr('href'));
	        
	        $active.addClass('active');
	        $content.show(); 
	        
	        window.scrollTo(0,0);
	        
	        nextIdx = parseInt($active.attr('href').charAt($active.attr('href').length-1)) + 1;
            if (nextIdx > $links.length) {
                $('.nexttab').hide();
            } else {
                $('.nexttab').show();
                $('.nexttab').attr('href', '#tab' + nextIdx);
            }
    	        
	        e.preventDefault();
        });
	});
	
	// Toggle div based upon checkbox (org profile)

		$('.orgSecondLocation, .orgThirdLocation, .orgFourthLocation, .orgFifthLocation, .otherEmail, .otherReason, .otherDescription, .otherRelationship').hide(); // first hide fields
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
  		if($('#OrganizationProfileEmailVendor').val() == 'Other'){
  			$('.otherEmail').show();
  		}
		$('#OrganizationProfileEmailVendor').on('change', function(){
			var selected = $(this).val();
			if(selected === 'Other'){
				$('.otherEmail').show();
			} else {
				$('.otherEmail').hide();
			}
		});

  		// toggle other OS
  		if($('#OrganizationProfileEmrEhrOs').val() == 'Other'){
  			$('.otherEmrOs').show();
  		}
		$('#OrganizationProfileEmrEhrOs').on('change', function(){
			var selected = $(this).val();
			if(selected === 'Other'){
				$('.otherEmrOs').show();
			} else {
				$('.otherEmrOs').hide();
			}
		});

  		// toggle other EMR/EHR Location
  		if($('#OrganizationProfileEmrEhrLocation').val() == 'Other'){
  			$('.emrEhrOtherLoc').show();
  		}
		$('#OrganizationProfileEmrEhrLocation').change(function(){
			var selected = $(this).val();
			if(selected === 'Other'){
				$('.emrEhrOtherLoc').show();
			} else {
				$('.emrEhrOtherLoc').hide();
			}
		});

        if($('#BusinessAssociateAgreementRelationship').val() == 'Other'){
            $('.otherRelationship').show();
        }
        $('#BusinessAssociateAgreementRelationship').on('change', function(){
           var selected = $(this).val();
           if (selected === 'Other') {
               $('.otherRelationship').show();
           } else {
               $('.otherRelationship').hide();
           }
        });

		 // toggle server room access
		if($('#ServerRoomAccessReason').val() == 'Other'){
			$('.otherReason').show();
		}
		$('#ServerRoomAccessReason').on('change', function(){
			var selected = $(this).val();
			if(selected === 'Other'){
				$('.otherReason').show();
			} else {
				$('.otherReason').hide();
			}
		});

		 // toggle server room access
		if($('#ServerRoomAccessChanged').val() == 'Yes'){
			$('.whatChanged').show();
		}
		$('#ServerRoomAccessChanged').on('change', function(){
			var selected = $(this).val();
			if(selected === 'Yes'){
				$('.whatChanged').show();
			} else {
				$('.whatChanged').hide();
			}
		});

		// toggle Ephi removed
		if($('#EphiRemovedItem, #EphiReceivedItem').val() == 'Other'){
			$('.otherDescription').show();
		} 
		$('#EphiRemovedItem, #EphiReceivedItem').on('change', function(){
			var selected = $(this).val();
			if(selected === 'Other'){
				$('.otherDescription').show();
			} else {
				$('.otherDescription').hide();
			}
		});

		// toggle Ephi removed reason
		if($('#EphiRemovedReason, #EphiReceivedReason').val() == 'Other'){
			$('.otherReason').show();
		}
		$('#EphiRemovedReason, #EphiReceivedReason').on('change', function(){
			var selected = $(this).val();
			if(selected === 'Other'){
				$('.otherReason').show();
			} else {
				$('.otherReason').hide();
			}
		});


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

		$('.dialogClose').click(function(){
		    $(this).parent().closest('.dialogBox').dialog('close');
		});


	// Jwplayer
	function showVideo(mp4Name) {
		jwplayer("mediaplayer").setup({
		    playlist: [{
		        sources: [{
		            file: "rtmp://stream.entegration.net/vod/mp4:" + mp4Name + ".mp4",
		        },{
		            file: "http://stream.entegration.net/vod/mp4:" + mp4Name + ".mp4",
		        }]
		    }],
		    width: '800',
		    height: '480',
		    autostart : 'true',
		    primary : 'flash'
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

    $('.staticvideo').each(function(){
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
	
/** ##### Security Incidents ##### **/
	// Show field if box is selected
	
		// Security Incidents
	if ( $('.securityIncidents form #SecurityIncidentCauseOfIncident').val() === 'Other'){
		$('.causeOther').show();
	}
	$('.securityIncidents form #SecurityIncidentCauseOfIncident').on('change', function(){
		var selected = $(this).val();
		if(selected === 'Other'){
			$('.causeOther').show();
		} else {
			$('.causeOther').hide();
		}
	});	
	
	if( $('.securityIncidents form #SecurityIncidentAssetsInvolved').val() === 'Other'){
		$('.otherAssets').show();
	}
	$('.securityIncidents form #SecurityIncidentAssetsInvolved').on('change', function(){
		var selected = $(this).val();
		if(selected === 'Other'){
			$('.otherAssets').show();
		} else {
			$('.otherAssets').hide();
		}
	});	
	
	if( $('.securityIncidents form #SecurityIncidentSystemsInvolved').val() === 'Other'){
		$('.otherSystemsInvolved').show();
	}
	$('.securityIncidents form #SecurityIncidentSystemsInvolved').on('change', function(){
		var selected = $(this).val();
		if(selected === 'Other'){
			$('.otherSystemsInvolved').show();
		} else {
			$('.otherSystemsInvolved').hide();
		}
	});	

/* ##### Breach Notification ##### */

	// Show field if Yes is selected
	
	if( $('.securityIncidents form #SecurityIncidentBreachNotificationRa').val() === 'Yes'){
		$('.breach_notication_yes').show();
	}
	$('.securityIncidents form #SecurityIncidentBreachNotificationRa').on('change', function(){  
		var selected = $(this).val();
		if(selected === 'No'){
			$('.breach_notification_please_complete').dialog({
				height: 200,
				width: 300,
				modal: true,
				resizable: false,
			});
			$('.breach_notication_yes').hide();  
		} else if (selected === 'Yes') {  
			$('.breach_notication_yes').show();
		}
	});
	if( $('.securityIncidents form #SecurityIncidentAfterCompleting').val() === 'Yes'){
		$('.breach_required_yes').show();
	}
	$('.securityIncidents form #SecurityIncidentAfterCompleting').on('change', function(){
		var selected = $(this).val();
		if(selected === 'No'){
			$('.breach_not_required').dialog({
				height: 200,
				width: 300,
				modal: true,
				resizable: false,
			});
			$('.breach_required_yes').hide();  
		} else if (selected === 'Yes'){
			$('.breach_required_yes').show();
			
				$('.breachCompletePop').dialog({  // pop up dialog if yes
					height: 630,
					width: 700,
					modal: true,
					resizable: false,
				});	
		}
	});
	if( $('.securityIncidents form #SecurityIncidentInformedIndividual').val() === 'Yes'){
		$('.informed_individuals_yes').show();
	}	
	$('.securityIncidents form #SecurityIncidentInformedIndividual').on('change', function(){  // Informed individuals
		var selected = $(this).val();
		if(selected === 'Yes'){
			$('.informed_individuals_yes').show();	
		} else if (selected === 'No') {
			$('.informed_individuals_yes').hide();	
		}	
	});
	if( $('.securityIncidents form #SecurityIncidentEffectMoreThan500').val() === 'Yes'){
		$('.effect_more_500_yes').show();
	}	
	$('.securityIncidents form #SecurityIncidentEffectMoreThan500').on('change', function(){
		var selected = $(this).val();
		if(selected === 'Yes'){
			$('.effect_more_500_yes').show();	
				$('.500individualsBox').dialog({  // pop up dialog if yes
					height: 300,
					width: 500,
					modal: true,
					resizable: false,
				});	
		} else if (selected === 'No'){
			$('.effect_more_500_yes').hide();	
				$('.500individualsBox').dialog({  // pop up dialog if yes
					height: 300,
					width: 500,
					modal: true,
					resizable: false,
				});		
		}
	});
	if( $('.securityIncidents form #SecurityIncidentNotifyIndividuals').val() === 'Yes'){
		$('.notify_individual_date').show();		
	}
	$('.securityIncidents form #SecurityIncidentNotifyIndividuals').on('change', function(){
		var selected = $(this).val();
		if(selected === 'Yes'){
			$('.notify_individual_date').show();
		} else if (selected === 'No'){
			$('.notify_individuals_date').hide();
		}
	});
	
	if( $('.securityIncidents form #SecurityIncidentNotifyMedia').val() === 'Yes'){
		$('.notifyMediaDate').show();
	}	
	$('.securityIncidents form #SecurityIncidentNotifyMedia').on('change', function(){
		var selected = $(this).val();
		if(selected === 'Yes'){
			$('.notifyMediaDate').show();
		} else if (selected === 'No'){
			$('.notifyMediaDate').hide();
		}
	});
		
	if( $('.securityIncidents form #SecurityIncidentNotifyHhs').val() === 'Yes'){
		$('.notifyHhsDate').show();
	}		
	$('.securityIncidents form #SecurityIncidentNotifyHhs').on('change', function(){
		var selected = $(this).val();
		if(selected === 'Yes'){
			$('.notifyHhsDate').show();
		} else if (selected === 'No'){
			$('.notifyHhsDate').hide();
		}
	});		
	
	$('.checkall').on('click', function () {
        $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
    });	
	
});





		
