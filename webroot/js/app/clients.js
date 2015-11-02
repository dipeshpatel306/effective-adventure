require(['jquery', 'app/form'], function($, formhelper) {
	$(document).ready(function() {
		if ($('#ClientAccountType').val() === 'AYCE Training') {
			$('.display_ra_org').hide();
		}
		$('#ClientAccountType').on('change', function() {
			$('.display_ra_org').toggle($(this).val() !== 'AYCE Training');
		});
	});
});