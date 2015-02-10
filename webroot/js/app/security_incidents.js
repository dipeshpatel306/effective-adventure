require(['jquery', 'app/form', 'jqueryui'], function($, formhelper) {
	$(document).ready(function() {
		$('.dialogClose').click(function(){
		    $(this).parent().closest('.dialogBox').dialog('close');
		});
		
		formhelper.conditional($('#SecurityIncidentCauseOfIncident'), 'Other', $('.causeOther'));
		formhelper.conditional($('#SecurityIncidentAssetsInvolved'), 'Other', $('.otherAssets'));
		formhelper.conditional($('#SecurityIncidentSystemsInvolved'), 'Other', $('.otherSystemsInvolved'));
		
		/* ##### Breach Notification ##### */
		
		if( $('.securityIncidents form #SecurityIncidentBreachNotificationRa').val() === 'Yes'){
			$('.breach_notication_yes').show();
		}
		
		$('#SecurityIncidentBreachNotificationRa').on('change', function(){  
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
		if( $('#SecurityIncidentAfterCompleting').val() === 'Yes'){
			$('.breach_required_yes').show();
		}
		$('#SecurityIncidentAfterCompleting').on('change', function(){
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
		
		if( $('#SecurityIncidentInformedIndividual').val() === 'Yes'){
			$('.informed_individuals_yes').show();
		}	
		
		$('#SecurityIncidentInformedIndividual').on('change', function(){  // Informed individuals
			var selected = $(this).val();
			if(selected === 'Yes'){
				$('.informed_individuals_yes').show();	
			} else if (selected === 'No') {
				$('.informed_individuals_yes').hide();	
			}	
		});
		
		if( $('#SecurityIncidentEffectMoreThan500').val() === 'Yes'){
			$('.effect_more_500_yes').show();
		}
			
		$('#SecurityIncidentEffectMoreThan500').on('change', function(){
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
		
		if( $('#SecurityIncidentNotifyIndividuals').val() === 'Yes'){
			$('.notify_individual_date').show();		
		}
		
		$('#SecurityIncidentNotifyIndividuals').on('change', function(){
			var selected = $(this).val();
			if(selected === 'Yes'){
				$('.notify_individual_date').show();
			} else if (selected === 'No'){
				$('.notify_individuals_date').hide();
			}
		});
		
		if( $('#SecurityIncidentNotifyMedia').val() === 'Yes'){
			$('.notifyMediaDate').show();
		}	
		
		$('#SecurityIncidentNotifyMedia').on('change', function(){
			var selected = $(this).val();
			if(selected === 'Yes'){
				$('.notifyMediaDate').show();
			} else if (selected === 'No'){
				$('.notifyMediaDate').hide();
			}
		});
			
		if( $('#SecurityIncidentNotifyHhs').val() === 'Yes'){
			$('.notifyHhsDate').show();
		}		
		$('#SecurityIncidentNotifyHhs').on('change', function(){
			var selected = $(this).val();
			if(selected === 'Yes'){
				$('.notifyHhsDate').show();
			} else if (selected === 'No'){
				$('.notifyHhsDate').hide();
			}
		});	
	});
});
