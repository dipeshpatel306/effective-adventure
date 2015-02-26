require(['jquery', 'app/form', 'app/video', 'tabspaging'], function($, formhelper, videohelper) {
	$(document).ready(function(){
		$('.raTabs').tabs({
	        activate: function(event, ui) {
	            $('.raNextTab').show();
	            if (ui.newTab.hasClass('outerTab')) {
	                // always make the first inner tab active when switch outer tabs
	                ui.newPanel.tabs('option', 'active', 0);
	            } else {
	                var active_outer = $('.raTabs').tabs('option', 'active');
	                if (active_outer == $('.raTabs.tabsOuter >ul >li').size() - 1 &&
	                    ui.newTab.index() == $('#outerTab' + (active_outer + 1) + ' >ul >li').size() - 1) {
	                    $('.raNextTab').hide();
	                }
	            }
	        },
	        beforeActivate: function(event, ui) {
	            if (event.originalEvent !== undefined) {
	                var $form = $('#RiskAssessmentEditForm');
	                $.post($form.attr('action'), $form.serialize()); // submit form with ajax
	            }
	        }
	    });
	    
	    $('.raNextTab').click(function(){
	        $form = $(this).closest('form');
	        $.post($form.attr('action'), $form.serialize()); // submit form with ajax
	        var active_outer = $('.raTabs').tabs('option', 'active'); 
	        var $inner_tab = $('#outerTab' + (active_outer + 1));
	        var active_inner = $inner_tab.tabs('option', 'active');
	        var len_outer = $('.raTabs.tabsOuter >ul >li').size();
	        var len_inner = $('#outerTab' + (active_outer + 1) + ' >ul >li').size();
	        if (active_inner + 1 < len_inner) {
	            // next inner tab
	            $inner_tab.tabs('option', 'active', active_inner + 1);
	        } else if (active_outer + 1 < len_outer) {
	            // on the last inner tab, switch the outer tab
	            $('.raTabs').tabs('option', 'active', active_outer + 1);
	            $('#outerTab' + (active_outer + 2)).tabs('option', 'active', 0);
	        }
	        window.scrollTo(0,0);
	    });
	    
	    // handle yes/no icon changes
	    $('#RiskAssessmentTakeRiskAssessmentForm, #RiskAssessmentEditForm').find('select').each(function(){
	        var $tab_parent = $(this).parent().parent();
	        var tab_done = true;
	        $tab_parent.find('select').each(function(){
	            tab_done = tab_done && ($(this).val() != '');
	        });
	        var tab_id = $tab_parent.attr('id');
	        var $outer_img = $("a[href='#outerTab" + tab_id.slice(-1) + "'] >img");
	        var $inner_img = $("a[href='#" + $tab_parent.attr('id') + "'] >img");
	        
	        if (tab_done) {
	            $inner_img.attr('src', '/img/yes.png');
	        } else {
	            $inner_img.attr('src', '/img/no.png');
	        }
	        
	        inner_tabs_done = true;
	        $('#outerTab' + tab_id.slice(-1) + '>ul >li >a >img').each(function(){
	            inner_tabs_done = inner_tabs_done && ($(this).attr('src') === '/img/yes.png');
	        });
	        
	        if (inner_tabs_done) {
	            $outer_img.attr('src', '/img/yes.png');
	        } else {
	            $outer_img.attr('src', '/img/no.png');
	        }
	        
	        $(this).on('change', function(){
	            var selected = $(this).val();
	            if (selected != '') {
	                $(this).next().attr('src', '/img/yes.png');
	            } else {
	                $(this).next().attr('src', '/img/no.png');
	            }
	            
	            var tab_done = true;
	            $tab_parent.find('select').each(function(){
	                tab_done = tab_done && ($(this).val() != '');
	            });
	            
	            var tab_id = $tab_parent.attr('id');
	            var $outer_img = $("a[href='#outerTab" + tab_id.slice(-1) + "'] >img");
	            var $inner_img = $("a[href='#" + $tab_parent.attr('id') + "'] >img");
	            
	            if (tab_done) {
	                $inner_img.attr('src', '/img/yes.png');
	            } else {
	                $inner_img.attr('src', '/img/no.png');
	            }
	            
	            inner_tabs_done = true;
	            $('#outerTab' + tab_id.slice(-1) + '>ul >li >a >img').each(function(){
	                inner_tabs_done = inner_tabs_done && ($(this).attr('src') === '/img/yes.png');
	            });
	            
	             if (inner_tabs_done) {
	                $outer_img.attr('src', '/img/yes.png');
	            } else {
	                $outer_img.attr('src', '/img/no.png');
	            }
	        }); 
	    });
	    
	    $('.fouc').show(); // content hidden until here to avoid FOUC
	    $('.raTabs.tabsInner').tabs('paging', {followOnActive : true, follow: true});
	    
	    // embedded videos
	    $('.raVideo').each(function() {
       		videohelper.showVideo($(this).attr('id'), $(this).attr('id'), 'false', '600', '300', '/img/raq_previews/' + $(this).attr('qnum') + '.png'); 
    	});
	});
});
