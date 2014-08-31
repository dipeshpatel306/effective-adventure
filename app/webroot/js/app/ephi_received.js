require(['jquery', 'app/form'], function($, formhelper) {
	$(document).ready(function() {
		formhelper.conditional($('#EphiReceivedItem'), 'Other', $('.otherDescription'));
		formhelper.conditional($('#EphiReceivedReason'), 'Other', $('.otherReason'));
		formhelper.conditional($('#EphiReceivedWasReturned'), 'Yes', $('.ephiReturnedInfo'));
	});
});