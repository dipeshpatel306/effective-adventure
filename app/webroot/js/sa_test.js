
		
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
		