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
				url: '/js/jquery-social-stream/twitter.php'
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

    $('.raTabs').tabs({
        activate: function(event, ui) {
            $('.raNextTab').show();
            if (ui.newTab.hasClass('outerTab')) {
                // always make the first inner tab active when switch outer tabs
                ui.newPanel.tabs('option', 'active', 0);
            } else {
                var active_outer = $('.raTabs').tabs('option', 'active');
                if (active_outer == $('.raTabs.tabsOuter >ul >li').size() - 1 &&
                    ui.newTab.index() == $('#outerTab' + (active_outer + 1) + ' >ul >li').size() - 1) {
                    $('.raNextTab').hide();
                }
            }
        }
    });
    
    $('.raNextTab').click(function(){
        var active_outer = $('.raTabs').tabs('option', 'active'); 
        var $inner_tab = $('#outerTab' + (active_outer + 1));
        var active_inner = $inner_tab.tabs('option', 'active');
        var len_outer = $('.raTabs.tabsOuter >ul >li').size();
        var len_inner = $('#outerTab' + (active_outer + 1) + ' >ul >li').size();
        if (active_inner + 1 < len_inner) {
            // next inner tab
            $inner_tab.tabs('option', 'active', active_inner + 1);
        } else if (active_outer + 1 < len_outer) {
            // on the last inner tab, switch the outer tab
            $('.raTabs').tabs('option', 'active', active_outer + 1);
            $('#outerTab' + (active_outer + 2)).tabs('option', 'active', 0);
        }
        window.scrollTo(0,0);
    });
    
    $('.orgProfTabs').tabs();
    $('.orgProfTabs').tabs('paging', {followOnActive : true, follow: true});
    $('.orgProfNextTab').click(function(){
       $.ajax({
            data: $(this).closest("form").serialize(),
            dataType: "html",
            type: "post",
        });
       var active = $('.orgProfTabs').tabs('option', 'active');
       var next_tab = (active + 1) % $('.orgProfTabs >ul>li').size();
       $('.orgProfTabs').tabs('option', 'active', next_tab);
       window.scrollTo(0,0); 
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
		
		if ($('#OrganizationProfileBackupMedia').val() == 'Yes'){
		    $('.backupMediaDetails').show();
		}
		$('#OrganizationProfileBackupMedia').on('change', function(){
		    var selected = $(this).val();
		    if (selected === 'Yes') {
		        $('.backupMediaDetails').show();
		    } else {
		        $('.backupMediaDetails').hide();   
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
		    flashplayer : '/js/jwplayer/jwplayer.flash.swf'
		});
		$('#videooverlay').css('display', 'inline');
		$('#videocontainer').css('display', 'inline');
	}

	// load education videos
	$('.educationCenter .dashBox.eduVideo, .educationCenter dd.eduVideo a').click(function(){
		showVideo($(this).attr('id'));
	});

    $('.staticvideo').each(function(){
       showVideo($(this).attr('id')); 
    });
    
    $('.raVideo').each(function() {
       showVideo($(this).attr('id'), $(this).attr('id'), 'false', '600', '300'); 
    });

	// Policies and Procedures Video
	$('.papVideo a.policyName').click(function(){
		showVideo('Policy' + $(this).attr('id'));
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
    
    $('#RiskAssessmentTakeRiskAssessmentForm, #RiskAssessmentEditForm').find('select').each(function(){
        var $tab_parent = $(this).parent().parent();
        var tab_done = true;
        $tab_parent.find('select').each(function(){
            tab_done = tab_done && ($(this).val() != '');
        });
        var tab_id = $tab_parent.attr('id');
        var $outer_img = $("a[href='#outerTab" + tab_id.slice(-1) + "'] >img");
        var $inner_img = $("a[href='#" + $tab_parent.attr('id') + "'] >img");
        
        if (tab_done) {
            $inner_img.attr('src', '/img/yes.png');
        } else {
            $inner_img.attr('src', '/img/no.png');
        }
        
        inner_tabs_done = true;
        $('#outerTab' + tab_id.slice(-1) + '>ul >li >a >img').each(function(){
            inner_tabs_done = inner_tabs_done && ($(this).attr('src') === '/img/yes.png');
        });
        
        if (inner_tabs_done) {
            $outer_img.attr('src', '/img/yes.png');
        } else {
            $outer_img.attr('src', '/img/no.png');
        }
        
        $(this).on('change', function(){
            var selected = $(this).val();
            if (selected != '') {
                $(this).next().attr('src', '/img/yes.png');
            } else {
                $(this).next().attr('src', '/img/no.png');
            }
            
            var tab_done = true;
            $tab_parent.find('select').each(function(){
                tab_done = tab_done && ($(this).val() != '');
            });
            
            var tab_id = $tab_parent.attr('id');
            var $outer_img = $("a[href='#outerTab" + tab_id.slice(-1) + "'] >img");
            var $inner_img = $("a[href='#" + $tab_parent.attr('id') + "'] >img");
            
            if (tab_done) {
                $inner_img.attr('src', '/img/yes.png');
            } else {
                $inner_img.attr('src', '/img/no.png');
            }
            
            inner_tabs_done = true;
            $('#outerTab' + tab_id.slice(-1) + '>ul >li >a >img').each(function(){
                inner_tabs_done = inner_tabs_done && ($(this).attr('src') === '/img/yes.png');
            });
            
             if (inner_tabs_done) {
                $outer_img.attr('src', '/img/yes.png');
            } else {
                $outer_img.attr('src', '/img/no.png');
            }
        }); 
    });
    
    $(document).tooltip({
        track: true,
        items: 'input, select',
        content: function() {
            $tooltip = $(".tooltip[for='" + $(this).attr('id') + "']").html();
            if ($tooltip) {
                return $tooltip;
            }    
        }
    });
    
    if ($('#EphiReceivedWasReturned').val() == 'Yes') {
        $('.ephiReturnedInfo').show();
    }
    
    $('#EphiReceivedWasReturned').on('change', function(){
       if ($(this).val() == 'Yes') {
            $('.ephiReturnedInfo').show();
       } else {
            $('.ephiReturnedInfo').hide();
       }
    });
});





		
