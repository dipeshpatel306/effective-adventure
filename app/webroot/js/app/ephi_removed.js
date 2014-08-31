require(['jquery', 'app/form'], function($, formhelper) {
	$(document).ready(function() {
		formhelper.conditional($('#EphiRemovedItem'), 'Other', $('.otherDescription'));
		formhelper.conditional($('#EphiRemovedReason'), 'Other', $('.otherReason'));
	});
});
