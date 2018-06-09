$(function () {

	function login() {

		// function newLogin(user) {
		// 	if (user) {
		// 		app(user);
		// 	} else {
		var provider = new firebase.auth.GoogleAuthProvider();
		firebase.auth().signInWithPopup(provider).then(function (result) {
			// This gives you a Google Access Token. You can use it to access the Google API.
			var token = result.credential.accessToken;
			// The signed-in user info.
			var user = result.user;
			console.log('USER :', user);
			userName = user.displayName;
			userEmail = user.email;
			userEmailVerified = user.emailVerified;
			userPhoto = user.photoURL;
			userRefreshToken = user.refreshToken;
			userUid = user.uid;
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

			$.ajax({
				type: 'POST',
				url: loginUser,
				data: {
					_token: CSRF_TOKEN,
					username: userName,
					email: userEmail,
					password: userEmail,
					verify: userEmailVerified,
					photo: userPhoto,
					refreshtoken: userRefreshToken,
					useruid: userUid
				},
				success: function (result) {
					if (result) {
						window.location.href = '/';
					} else {
						window.location.href = '/rule-set';
					}
				},
				error: function (err) {
					console.log(err);
				}
			});

		}).catch(function (error) {
			// Handle Errors here.
			var errorCode = error.code;
			var errorMessage = error.message;
			// The email of the user's account used.
			var email = error.email;
			// The firebase.auth.AuthCredential type that was used.
			var credential = error.credential;
			// ...
		});

		// // firebase.auth().signInWithRedirect(provider);
		// firebase.auth().getRedirectResult().then(function (result) {
		// 	if (result.credential) {
		// 		// This gives you a Google Access Token. You can use it to access the Google API.
		// 		var token = result.credential.accessToken;
		// 		console.log('token', token);
		// 		// ...
		// 	}
		// 	// The signed-in user info.
		// 	var user = result.user;
		// 	console.log('user', user);

		// 	console.log('result', result);
		// }).catch(function (error) {
		// 	// Handle Errors here.
		// 	var errorCode = error.code;
		// 	var errorMessage = error.message;
		// 	// The email of the user's account used.
		// 	var email = error.email;
		// 	// The firebase.auth.AuthCredential type that was used.
		// 	var credential = error.credential;
		// 	// ...
		// });
		// 	}

		// }

		// firebase.auth().onAuthStateChanged(newLogin);

	}

	function app(user) {

		var name, email, photoUrl, uid, emailVerified;

		if (user != null) {
			name = user.displayName;
			email = user.email;
			photoUrl = user.photoURL;
			emailVerified = user.emailVerified;
			uid = user.uid; // The user's ID, unique to the Firebase project. Do NOT use
			// this value to authenticate with your backend server, if
			// you have one. Use User.getToken() instead.

		}
		console.log(name, email, photoUrl, emailVerified, uid);
	}

	$('.signin').on('click', function () {
		login();
	});

	// $('.signout').on('click', function () {
	// 	firebase.auth().signOut().then(function () {
	// 		console.log('Signed Out');
	// 	}, function (error) {
	// 		console.error('Sign Out Error', error);
	// 	});
	// });

	$("input[type='password'][data-eye]").each(function (i) {
		let $this = $(this);

		$this.wrap($("<div/>", {
			style: 'position:relative'
		}));
		$this.css({
			paddingRight: 60
		});
		$this.after($("<div/>", {
			html: 'Show',
			class: 'btn btn-primary btn-sm',
			id: 'passeye-toggle-' + i,
			style: 'position:absolute;right:10px;top:50%;transform:translate(0,-50%);padding: 2px 7px;font-size:12px;cursor:pointer;'
		}));
		$this.after($("<input/>", {
			type: 'hidden',
			id: 'passeye-' + i
		}));
		$this.on("keyup paste", function () {
			$("#passeye-" + i).val($(this).val());
		});
		$("#passeye-toggle-" + i).on("click", function () {
			if ($this.hasClass("show")) {
				$this.attr('type', 'password');
				$this.removeClass("show");
				$(this).removeClass("btn-outline-primary");
			} else {
				$this.attr('type', 'text');
				$this.val($("#passeye-" + i).val());
				$this.addClass("show");
				$(this).addClass("btn-outline-primary");
			}
		});
	});
});