require(['jquery', 'jqueryui', 'ckeditor'], function($) {
	$(document).ready(function(){
		// Mark Risk Assessment Complete. Modal Window
		$('.markComplete').click(function(){
			$('.completeBox').dialog({
				height: 500,
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
	});
});
