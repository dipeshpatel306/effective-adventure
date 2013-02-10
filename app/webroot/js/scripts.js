$(document).ready(function(){
	//CKEDITOR.replace( 'textEdit'); // initialize WYSIWYG Editor
	
	// instantiate date picker and format date
	$('.datePick').datepicker({ dateFormat: 'mm/dd/yy'});
	
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
	
});
