require(['jquery', 'app/form'], function($, formhelper) {
	$(document).ready(function() {
		$('#UserEmail').focus();
		$('#UserGroupId').on('change', function(){
			$('.partnerSelect').toggle($(this).val() == '5');
			if ($(this).val() == '5') {
				$('#UserClientId').val('1');
			}
		});
	});
});