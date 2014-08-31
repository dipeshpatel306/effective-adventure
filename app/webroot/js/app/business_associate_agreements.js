require(['jquery', 'app/form'], function($, formhelper) {
	$(document).ready(function(){
		formhelper.conditional($('#BusinessAssociateAgreementRelationship'), 'Other', $('.otherRelationship'));
	});
});
