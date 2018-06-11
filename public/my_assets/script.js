$(document).ready(function () {
	// $('.selectpicker').selectpicker();
	// $('select').niceSelect();
	var id = 0;
	var text = '';
	var selected = -1;
	var predictionText = '';

	var countrySelected = -1;
	var playerSelected = -1;
	var playerPredictedText = '';

	$('.favTeamSelect').on('click', function () {
		var teamId = $(this).data('teamid');
		swal({
				title: "Are you sure?",
				text: "Once selected, there is no turning back!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((value) => {
				if (value) {
					$.ajax({
						method: 'GET',
						url: favTeamSelect,
						data: {
							'team': teamId
						},
						success: function (data) {
							if (data.success) {
								swal("Your Team is : " + data.team, {
									icon: "success",
								});
								window.location.href = '/';
							}
						},
						error: function (err) {
							console.log(err);
						}
					});

				} else {
					swal("You haven't selected!");
				}
			});
	});

	$('button.jqPredict').on('click', function () {
		// $('select').awselect();
		var self = $(this);
		id = self.data('id');
		text = self.data('text');
		console.log(id, text);
		selected = -1;
		countrySelected = -1;
		playerSelected = -1;
		if (id < 13) {
			$('#modal_predict').show();
		} else {
			$('.jqSavePlayer').prop('hidden', false);
			$('.jqSelectPlayer').html('');
			$('#player_modal').show();
		}
		$('h5.jqModalTitle').text(text);

		if (id > 0 && id < 5) {
			$.ajax({
				method: 'GET',
				url: teamUrl,

				success: function (data) {
					loaders = document.getElementsByClassName('loader-wrapper');
					loaders[0].style.display = "inherit";
					$.ajax({
						method: 'GET',
						url: getPredicted,

						success: function (predictedArray) {
							// $('select').niceSelect();
							var option = '<option value=-1>Select</option>';
							$('.jqSelect').html('');
							$('.jqSelect').append(option);
							// $('.jqSelect').selectpicker('render').selectpicker('refresh');
							// $('select').niceSelect('update');
							for (var i = 0; i < data.length; i++) {
								if (!predictedArray.includes(data[i].name)) {
									option = '<option value={0}>{1}</option>'
										.replace('{0}', data[i].id)
										.replace('{1}', data[i].name);
									$('.jqSelect').append(option);
									// $('.jqSelect').selectpicker('render').selectpicker('refresh');
									// $('select').niceSelect('update');
								}
							}
							loaders[0].style.display = "none";
							// $('select').niceSelect('updaplayer_modalte');
							// $('.selectpicker').selectpicker();
						},
						error: function () {
							console.log('error getting predicted values');
						}
					});
				},

				error: function () {
					console.log('error');
				}
			});
		}

		if (id > 4 && id < 13) {
			$.ajax({
				method: 'GET',
				url: groupAUrl,
				data: {
					'id': id
				},

				success: function (data) {
					var option = '<option value=-1>Select</option>';
					$('.jqSelect').html('');
					$('.jqSelect').append(option);
					for (var i = 0; i < data.length; i++) {
						option = '<option value={0}>{1}</option>'
							.replace('{0}', data[i].id)
							.replace('{1}', data[i].name);
						$('.jqSelect').append(option);
					}
				},
				error: function () {
					console.log('error in group');
				}
			});
		}

		if (id > 12 && id < 17) {
			$.ajax({
				method: 'GET',
				url: teamUrl,

				success: function (data) {
					var option = '<option value=-1>Select Country</option>';
					$('.jqSelectCountry').html('');
					$('.jqSelectCountry').append(option);
					for (var i = 0; i < data.length; i++) {
						option = '<option value={0}>{1}</option>'
							.replace('{0}', data[i].id)
							.replace('{1}', data[i].name);
						$('.jqSelectCountry').append(option);
					}
				},
				error: function () {
					console.log('error getting predicted values');
				}
			});
		}

	});

	$('.jqSelect').change(function () {
		selected = $('.jqSelect').val();
		predictionText = $('.jqSelect :selected').text();
		// console.log(selected);
	});

	$('.jqSelectPlayer').change(function () {
		playerSelected = $('.jqSelectPlayer').val();
		playerPredictedText = $('.jqSelectPlayer :selected').text();
	});


	$('button.jqClose').on('click', function () {
		$('#modal_predict').hide();
	});

	$('button.jqCloseClose').on('click', function () {
		$('#player_modal').hide();
	});

	$('button.jqClosePlayer').on('click', function () {
		$('#player_modal').hide();
	});

	$('button.jqSave').on('click', function () {
		// console.log(selected);

		if (selected == -1) {
			swal("Prediction aborted!", "You haven't chosen anything!", "error");
		} else {
			swal({
					title: "Are you sure?",
					text: "Once submitted you can't change your prediction!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willPredict) => {
					if (willPredict) {
						$('#prediction-overall-' + id + ' > p').text($('.jqSelect option:selected').text());
						$('#prediction-overall-' + id + ' > p').prev().prop('hidden', 'hidden');
						var predictedId = selected;
						selected = -1;
						$('#modal_predict').hide();

						$.ajax({
							method: 'GET',
							url: predictionSubmit,
							data: {
								prediction_id: id,
								match_id: 0,
								predictionId: predictedId,
								predictionText: predictionText
							},
							success: function (data) {
								console.log('Predicted data :', data);
							},
							error: function () {
								console.log('Prediction error on submit');
							}
						});

						swal("Yaay! You prediction is marked!", {
							icon: "success",
						});
					} else {
						swal("Your prediction is not recorded!");
						$('#modal_predict').hide();
					}
				});
		}
	});


	$('button.jqSavePlayer').on('click', function () {
		// console.log(selected);

		if (playerSelected == -1) {
			swal("Prediction aborted!", "You haven't chosen anything!", "error");
		} else {
			swal({
					title: "Are you sure?",
					text: "Once submitted you can't change your prediction!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willPredict) => {
					if (willPredict) {
						$('#prediction-overall-' + id + ' > p').text($('.jqSelectPlayer option:selected').text());
						$('#prediction-overall-' + id + ' > p').prev().prop('hidden', 'hidden');
						var predictedId = playerSelected;
						playerSelected = -1;
						$('#player_modal').hide();

						$.ajax({
							method: 'GET',
							url: predictionSubmit,
							data: {
								prediction_id: id,
								match_id: 0,
								predictionId: predictedId,
								predictionText: playerPredictedText
							},
							success: function (data) {
								console.log('Predicted data :', data);
							},
							error: function () {
								console.log('Prediction error on submit');
							}
						});

						swal("Yaay! You prediction is marked!", {
							icon: "success",
						});
					} else {
						swal("Your prediction is not recorded!");
						$('#player_modal').hide();
					}
				});
		}
	});

	$('.jqSelectCountry').change(function () {
		countrySelected = $('.jqSelectCountry').val();
		// playerPredictedText = $('.jqSelectCountry :selected').text();
		// console.log(id);

		if (countrySelected == -1) {
			swal("Prediction aborted!", "You haven't chosen anything!", "error");
		} else {
			$.ajax({
				method: 'GET',
				url: playerUrl,
				data: {
					'id': countrySelected,
					'prediction': id
				},

				success: function (data) {
					data = data.result;
					console.log(data);
					if (data.length == 0) {
						var option = '<option value=-1>No Young Player Nominee</option>';
						$('.jqSelectPlayer').html('');
						$('.jqSelectPlayer').append(option);
						$('.jqSavePlayer').prop('hidden', true);
					} else {
						var option = '<option value=-1>Select Player</option>';
						$('.jqSelectPlayer').html('');
						$('.jqSelectPlayer').append(option);
						$('.jqSavePlayer').prop('hidden', false);
					}
					for (var i = 0; i < data.length; i++) {
						option = '<option value={0}>{1}</option>'
							.replace('{0}', data[i]['id'])
							.replace('{1}', data[i]['name']);

						$('.jqSelectPlayer').append(option);
					}
				},
				error: function () {
					console.log('error');
				}
			});
		}
	});
})