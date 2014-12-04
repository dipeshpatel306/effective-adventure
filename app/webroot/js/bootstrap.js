requirejs.config({
	baseUrl : '/js/lib',
	paths : {
		app : '../app',
		jquery : 'jquery-1.9.0.min',
		jqueryui : 'jquery-ui-1.10.0.custom/js/jquery-ui-1.10.0.custom.min',
		ckeditor : 'ckeditor/ckeditor',
		socialstream : 'jquery-social-stream/js/jquery.social.stream.1.5.7.min',
		jwplayer : 'jwplayer/jwplayer',
		maskedinput : 'jquery.maskedinput.min',
		tabspaging : 'ui.tabs.paging'
	},
	shim : {
		jqueryui : {
			deps : ['jquery']
		},
		socialstream : {
			deps : ['jquery']
		},
		maskedinput : {
			deps : ['jquery']
		},
		jwplayer : {
			deps : ['jquery'],
			exports : 'jwplayer'
		},
		tabspaging : {
			deps : ['jquery', 'jqueryui']
		}
	}
});


