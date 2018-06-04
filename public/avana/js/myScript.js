$(document).ready(function () {
	var score;
	var matchId;
	var teamName;

	$('.match_lock_alert').on('click', function (e) {
		swal("Oops", "Prediction Time Over!", "error");
	});

	$('.home_score').on('click', function (e) {
		e.preventDefault();
		teamName = $(this).data('team');
		var teamId = $(this).data('id');
		matchId = $(this).data('matchid');

		$('#scoreHomeModal').modal('show');
	});

	$('#predictHomeGoal').on('click', function () {
		$.ajax({
			method: 'GET',
			url: storeHomeGoal,
			data: {
				matchId: matchId,
				score: score
			},

			success: function (result) {
				console.log(result);
				if (result.success) {
					swal("Great!", "Your prediction of " + teamName + " scoring " + score + " goals is recorded!", "success");
					$('#scoreHomeModal').modal('hide');
				} else {
					swal("Oops", "Something went wrong!", "error");
				}
			},
			error: function () {
				swal("Oops", "Something went wrong!", "error");
			}
		});
	});

	$(".btn-group > button.btn").on("click", function () {
		score = $(this).data('value');
		console.log(score);
	});

	$('#predictAwayGoal').on('click', function () {
		$.ajax({
			method: 'GET',
			url: storeAwayGoal,
			data: {
				matchId: matchId,
				score: score
			},

			success: function (result) {
				console.log(result);
				if (result.success) {
					swal("Great!", "Your prediction of " + teamName + " scoring " + score + " goals is recorded!", "success");
					$('#scoreAwayModal').modal('hide');
				} else {
					swal("Oops", "Something went wrong!", "error");
				}
			},
			error: function () {
				swal("Oops", "Something went wrong!", "error");
			}
		});
	});

	$('.away_score').on('click', function (e) {
		e.preventDefault();
		teamName = $(this).data('team');
		var teamId = $(this).data('id');
		matchId = $(this).data('matchid');

		$('#scoreAwayModal').modal('show');
	});

	$('.yellow_card').on('click', function (e) {
		e.preventDefault();
		var matchId = $(this).data('matchid');
		$.confirm({
			theme: 'supervan',
			title: 'Yellow Card',
			content: 'Do you see more than 5 yellow cards in this match?',
			buttons: {
				Yes: {
					btnClass: 'btn-green',
					action: function () {
						$.ajax({
							method: 'GET',
							url: storeYellowCard,
							data: {
								matchId: matchId,
								predictionText: 1
							},
							success: function (result) {
								console.log(result);
								if (result.success) {
									$.alert('Prediction Recorded!');
								} else {
									swal("Oops", "Already Predicted!", "error");
								}
							},
							error: function () {
								swal("Oops", "Something went wrong!", "error");
							}
						});
					}
				},
				No: {
					btnClass: 'btn-red',
					action: function () {
						$.ajax({
							method: 'GET',
							url: storeYellowCard,
							data: {
								matchId: matchId,
								predictionText: 0
							},
							success: function (result) {
								console.log(result);
								if (result.success) {
									$.alert('Prediction Recorded!');
								} else {
									swal("Oops", "Already Predicted!", "error");
								}
							},
							error: function () {
								swal("Oops", "Something went wrong!", "error");
							}
						});
					}
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
				Yes: {
					btnClass: 'btn-green',
					action: function () {
						$.ajax({
							method: 'GET',
							url: storeHatTrick,
							data: {
								matchId: matchId,
								predictionText: 1
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
					}
				},
				No: {
					btnClass: 'btn-red',
					action: function () {
						$.ajax({
							method: 'GET',
							url: storeHatTrick,
							data: {
								matchId: matchId,
								predictionText: 0
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
					}
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
				Yes: {
					btnClass: 'btn-green',
					action: function () {
						$.ajax({
							method: 'GET',
							url: storeOwnGoal,
							data: {
								matchId: matchId,
								predictionText: 1
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
					}
				},
				No: {
					btnClass: 'btn-red',
					action: function () {
						$.ajax({
							method: 'GET',
							url: storeOwnGoal,
							data: {
								matchId: matchId,
								predictionText: 0
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
					}
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
				Yes: {
					btnClass: 'btn-green',
					action: function () {
						$.ajax({
							method: 'GET',
							url: storeRedCard,
							data: {
								matchId: matchId,
								predictionText: 1
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
					}
				},
				No: {
					btnClass: 'btn-red',
					action: function () {
						$.ajax({
							method: 'GET',
							url: storeRedCard,
							data: {
								matchId: matchId,
								predictionText: 0
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
					}
				},
				cancel: function () {
					$.alert('Canceled!');
				}
			}
		});
	});
});