$(document).ready(function () {
	$('.home_score').on('click', function (e) {
		e.preventDefault();
		var teamName = $(this).data('team');
		var teamId = $(this).data('id');
		var matchId = $(this).data('matchid');

		swal(teamName + " will score ...", {
			content: {
				element: "input",
				attributes: {
					type: "number"
				}
			},
			buttons: true,

		}).then((value) => {
			if (value !== null && value !== '') {
				$.ajax({
					method: 'GET',
					url: storeHomeGoal,
					data: {
						matchId: matchId,
						score: value
					},

					success: function (result) {
						console.log(result);
						if (result.success) {
							swal("Great!", "Your prediction of " + teamName + "(" + teamId + ") scoring " + value + " goals is recorded!", "success");
						} else {
							swal("Oops", "Something went wrong!", "error");
						}
					},
					error: function () {
						swal("Oops", "Something went wrong!", "error");
					}
				});
			}
		});
	});

	$('.away_score').on('click', function (e) {
		e.preventDefault();
		var teamName = $(this).data('team');
		var teamId = $(this).data('id');
		var matchId = $(this).data('matchid');

		swal(teamName + " will score ...", {
			content: {
				element: "input",
				attributes: {
					type: "number"
				}
			},
			buttons: true,

		}).then((value) => {
			if (value !== null && value !== '') {
				$.ajax({
					method: 'GET',
					url: storeAwayGoal,
					data: {
						matchId: matchId,
						score: value
					},

					success: function (result) {
						console.log(result);
						if (result.success) {
							swal("Great!", "Your prediction of " + teamName + "(" + teamId + ") scoring " + value + " goals is recorded!", "success");
						} else {
							swal("Oops", "Something went wrong!", "error");
						}
					},
					error: function () {
						swal("Oops", "Something went wrong!", "error");
					}
				});
			}
		});
	});

	$('.yellow_card').on('click', function (e) {
		e.preventDefault();
		var matchId = $(this).data('matchid');
		$.confirm({
			theme: 'supervan',
			title: 'Yellow Card',
			content: 'Do you see a yellow card in this match?',
			buttons: {
				confirm: function () {
					$.ajax({
						method: 'GET',
						url: storeYellowCard,
						data: {
							matchId: matchId,
						},

						success: function (result) {
							console.log(result);
							if (result.success) {
								$.alert('Prediction Recorded!');
							} else {
								swal("Oops", "Something went wrong!", "error");
							}
						},
						error: function () {
							swal("Oops", "Something went wrong!", "error");
						}
					});
				},
				cancel: function () {
					$.alert('Canceled!');
				}
			}
		});
	});

	$('.hat_trick').on('click', function (e) {
		e.preventDefault();
		var matchId = $(this).data('matchid');
		$.confirm({
			theme: 'supervan',
			title: 'Hat Trick',
			content: 'Do you see a hat trick in this match?',
			buttons: {
				confirm: function () {
					$.ajax({
						method: 'GET',
						url: storeHatTrick,
						data: {
							matchId: matchId,
						},

						success: function (result) {
							console.log(result);
							if (result.success) {
								$.alert('Prediction Recorded!');
							} else {
								swal("Oops", "Something went wrong!", "error");
							}
						},
						error: function () {
							swal("Oops", "Something went wrong!", "error");
						}
					});
				},
				cancel: function () {
					$.alert('Canceled!');
				}
			}
		});
	});

	$('.own_goal').on('click', function (e) {
		e.preventDefault();
		var matchId = $(this).data('matchid');
		$.confirm({
			theme: 'supervan',
			title: 'Own Goal',
			content: 'Do you see a own goal in this match?',
			buttons: {
				confirm: function () {
					$.ajax({
						method: 'GET',
						url: storeOwnGoal,
						data: {
							matchId: matchId,
						},

						success: function (result) {
							console.log(result);
							if (result.success) {
								$.alert('Prediction Recorded!');
							} else {
								swal("Oops", "Something went wrong!", "error");
							}
						},
						error: function () {
							swal("Oops", "Something went wrong!", "error");
						}
					});
				},
				cancel: function () {
					$.alert('Canceled!');
				}
			}
		});
	});

	$('.red_card').on('click', function (e) {
		e.preventDefault();
		var matchId = $(this).data('matchid');
		$.confirm({
			theme: 'supervan',
			title: 'Red Card',
			content: 'Do you see a red card in this match?',
			buttons: {
				confirm: function () {
					$.ajax({
						method: 'GET',
						url: storeRedCard,
						data: {
							matchId: matchId,
						},

						success: function (result) {
							console.log(result);
							if (result.success) {
								$.alert('Prediction Recorded!');
							} else {
								swal("Oops", "Something went wrong!", "error");
							}
						},
						error: function () {
							swal("Oops", "Something went wrong!", "error");
						}
					});
				},
				cancel: function () {
					$.alert('Canceled!');
				}
			}
		});
	});
});