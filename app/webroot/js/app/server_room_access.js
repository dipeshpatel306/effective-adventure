require(['jquery', 'app/form'], function($, formhelper) {
	$(document).ready(function(){
		formhelper.conditional($('#ServerRoomAccessReason'), 'Other', $('.otherReason'));
		formhelper.conditional($('#ServerRoomAccessChanged'), 'Yes', $('.whatChanged'));
	});
});
