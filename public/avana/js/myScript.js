$(document).ready(function () {
	var score;
	var matchId;
	var teamName;
	var teamId;
	var flag;

	$('.match_lock_alert').on('click', function (e) {
		swal("Oops", "Prediction Time Over!", "error");
	});

	$('.home_score').on('click', function (e) {
		e.preventDefault();
		teamName = $(this).data('team');
		teamId = $(this).data('id');
		matchId = $(this).data('matchid');
		flag = 1;

		$('#scoreHomeModal').modal('show');
	});

	$(".btn-group > button.btn").on("click", function () {
		score = $(this).data('value');
		if (flag) {
			$.ajax({
				method: 'GET',
				url: storeHomeGoal,
				data: {
					matchId: matchId,
					score: score,
					teamId: teamId
				},

				success: function (result) {
					console.log(result);
					if (result.success) {
						swal("Great!", "Your prediction of " + teamName + " scoring " + score + " goals is recorded!", "success");
						$('#scoreHomeModal').modal('hide');
						$('#homeScorePredict').text('');
						$('#homeScorePredicth2').empty();
						if(score == 5){
							$('#homeScorePredict').text('5+');
							$('#homeScorePredicth2').html(`<span id="homeScorePredict">5+</span>`);
						}else{
							$('#homeScorePredict').text(score);
							$('#homeScorePredicth2').html(`<span id="homeScorePredict">` + score + `</span>`);
						}

					} else {
						swal("Oops", "Something went wrong!", "error");
					}
				},
				error: function () {
					swal("Oops", "Something went wrong!", "error");
				}
			});
		} else {
			$.ajax({
				method: 'GET',
				url: storeAwayGoal,
				data: {
					matchId: matchId,
					score: score,
					teamId: teamId
				},

				success: function (result) {
					console.log(result);
					if (result.success) {
						swal("Great!", "Your prediction of " + teamName + " scoring " + score + " goals is recorded!", "success");
						$('#scoreAwayModal').modal('hide');
						$('#awayScorePredict').text('');
						$('#awayScorePredicth2').empty();
						if(score == 5){
							$('#awayScorePredict').text('5+');
							$('#awayScorePredicth2').html(`<span id="awayScorePredict">5+</span>`);
						}else{
							$('#awayScorePredict').text(score);
							$('#awayScorePredicth2').html(`<span id="awayScorePredict">` + score + `</span>`);
						}

					} else {
						swal("Oops", "Something went wrong!", "error");
					}
				},
				error: function () {
					swal("Oops", "Something went wrong!", "error");
				}
			});
		}
		console.log(score);
	});

	$('.away_score').on('click', function (e) {
		e.preventDefault();
		teamName = $(this).data('team');
		teamId = $(this).data('id');
		matchId = $(this).data('matchid');
		flag = 0;

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
									$('#yellowCardPredict').text('');
									$('#yellowCardPredict').text('YES');
									$('#yellowCardPredicth2').empty();
									$('#yellowCardPredicth2').html(`<span id="yellowCardPredict">YES</span>`);
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
									$('#yellowCardPredict').text('');
									$('#yellowCardPredict').text('NO');
									$('#yellowCardPredicth2').empty();
									$('#yellowCardPredicth2').html(`<span id="yellowCardPredict">NO</span>`);
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
									$('#hatTrickPredict').text('');
									$('#hatTrickPredict').text('YES');
									$('#hatTrickPredicth2').empty();
									$('#hatTrickPredicth2').html(`<span id="hatTrickPredict">YES</span>`);
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
									$('#hatTrickPredict').text('');
									$('#hatTrickPredict').text('NO');
									$('#hatTrickPredicth2').empty();
									$('#hatTrickPredicth2').html(`<span id="hatTrickPredict">NO</span>`);
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
									$('#ownGoalPredict').text('');
									$('#ownGoalPredict').text('YES');
									$('#ownGoalPredicth2').empty();
									$('#ownGoalPredicth2').html(`<span id="ownGoalPredict">YES</span>`);
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
									$('#ownGoalPredict').text('');
									$('#ownGoalPredict').text('NO');
									$('#ownGoalPredicth2').empty();
									$('#ownGoalPredicth2').html(`<span id="ownGoalPredict">NO</span>`);
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
									$('#redCardPredict').text('');
									$('#redCardPredict').text('YES');
									$('#redCardPredicth2').empty();
									$('#redCardPredicth2').html(`<span id="redCardPredict">YES</span>`);
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
									$('#redCardPredict').text('');
									$('#redCardPredict').text('NO');
									$('#redCardPredicth2').empty();
									$('#redCardPredicth2').html(`<span id="redCardPredict">NO</span>`);
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