define(['jquery', 'jqueryui', 'maskedinput'], function($){
	$(document).ready(function(){
		// instantiate date picker and format date
		$('.datePick').datepicker({ dateFormat: 'mm/dd/yy',  defaultDate: '' });
		
		// masked input for telephone fields
		$('input[type=tel]').mask('999-999-9999');
		
		// tooltips
		$(document).tooltip({
	        track: true,
	        items: 'input, select',
	        content: function() {
	            $tooltip = $(".tooltip[for='" + $(this).attr('id') + "']").html();
	            if ($tooltip) {
	                return $tooltip;
	            }    
	        }
	    });
	});
	
	function conditional($eChoice, val, $eDisplay) {
		if ($eChoice.val() === val) {
			$eDisplay.show();
		}
		$eChoice.on('change', function() {
			$eDisplay.toggle($(this).val() === val);
		});
	}
	
	return { conditional : conditional };
});
