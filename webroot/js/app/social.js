require(['jquery', 'socialstream'], function($) {
	$(document).ready(function() {
		$('#social-stream').dcSocialStream({
			feeds:{
				facebook:{
					id: '132416226824065',
					out: 'intro,thumb,title,text,user,share',
					icon: 'facebook.png',
					url: '/js/lib/jquery-social-stream/facebook.php'
				},
				twitter:{
					id: 'HIPAASecureNow',
					url: '/js/lib/jquery-social-stream/twitter.php'
				}
			},
			twitterId: 'HIPAASecureNow',
			days: 30,
			iconPath: '/js/lib/jquery-social-stream/images/dcsns-dark/',
			imagePath: '/js/lib/jquery-social-stream/images/dcsns-light-1/'
		});

		$('#social-wall').dcSocialStream({
			feeds:{
				facebook: {
					id: '132416226824065,Facebook Timeline/132416226824065',
					url: '/js/lib/jquery-social-stream/facebook.php'
				},
				twitter: {
				    id: 'hipaasecurenow',
	                thumb: true
				}
			},
			days: 30,
			iconPath: '/js/lib/jquery-social-stream/images/dcsns-dark/',
			imagePath: '/js/lib/jquery-social-stream/images/dcsns-light-1/',
			height: '635'
		});
	});
});
