require(['jquery', 'app/form', 'tabspaging', 'ckeditor'], function($, formhelper) {
	function camelize(string) {
	    var a = string.split('_'), i;
	    s = [];
	    for (i=0; i<a.length; i++){
	        s.push(a[i].charAt(0).toUpperCase() + a[i].substring(1));
	    }
	    s = s.join('');
	    return s;
	}
	
	// ajax form submission for org prof tabs
	function submitOrgProf($form) {
        var success = true;
        function onSuccess(data) {
            $('.error-message').remove();
            $('.error').each(function() {
                $(this).removeClass('error');
            });
            $.each(data, function(field, errors){
                var $field = $("#OrganizationProfile" + camelize(field));
                $error_div = $(document.createElement('div')).insertAfter($field);
                $error_div.addClass('error-message').text(errors[0]);
                $error_div.parent().addClass('error');
                $field.focus();
                success = false;
            });
        }
        if ($form[0].checkValidity()) { // check html5 form validation
            $.ajax({
                type: 'post',
                url: $form.attr('action'),
                data:  $form.serialize(),
                success: onSuccess,
                dataType: 'json',
                async: false
            });
            return success;
        } else {
            // click submit here to show html5 form validation errors
            $form.find(':submit').click(); 
            return false;
        }
    }
    
    $(document).ready(function() {
    	$('.orgProfTabs').tabs({
	        activate: function(event, ui) {
	            $('.orgProfNextTab').show();
	            var active = $('.orgProfTabs').tabs('option', 'active');
	            if (active + 1 == $('.orgProfTabs >ul >li').size()) {
	                $('.orgProfNextTab').hide();
	            }
	        },
	        beforeActivate: function(event, ui) {
	            if (event.originalEvent !== undefined) {
	                return submitOrgProf($('#OrganizationProfileEditForm'));
	            }
	            return true;
	        }
	    });
	    
	    $('.fouc').show(); // content hidden until here to avoid FOUC
	    $('.orgProfTabs').tabs('paging', {followOnActive : true, follow: true});
	    $('.orgProfNextTab').click(function(){
	        if (submitOrgProf($(this).closest("form"))) {
	            var active = $('.orgProfTabs').tabs('option', 'active');
	            var next_tab = (active + 1) % $('.orgProfTabs >ul>li').size();
	            $('.orgProfTabs').tabs('option', 'active', next_tab);
	            window.scrollTo(0,0);
	        }
	    });
	    
		// toggle field visibility
  		$('.orgCheck2').change(function () {
     		$('.orgSecondLocation').toggle(this.checked);
  		}).change();

		$('.orgCheck3').change(function () {
     		$('.orgThirdLocation').toggle(this.checked);
  		}).change();

		$('.orgCheck4').change(function () {
     		$('.orgFourthLocation').toggle(this.checked);
  		}).change();
		$('.orgCheck5').change(function () {
     		$('.orgFifthLocation').toggle(this.checked);
  		}).change();
  		
  		// toggle other email
  		formhelper.conditional($('#OrganizationProfileEmailVendor'), 'Other', $('.otherEmail'));
  		
  		// toggle other OS
  		formhelper.conditional($('#OrganizationProfileEmrEhrOs'), 'Other', $('.otherEmrOs'));
  		
  		// toggle other EMR/EHR Location
  		formhelper.conditional($('#OrganizationProfileEmrEhrLocation'), 'Other', $('.emrEhrOtherLoc'));
  	
  		// toggle backup media
  		formhelper.conditional($('#OrganizationProfileBackupMedia'), 'Yes', $('.backupMediaDetails'));

    });
});
