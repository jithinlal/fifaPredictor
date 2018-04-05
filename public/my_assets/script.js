$(document).ready(function () {
	var id = 0;
	var text = '';
	var selected = -1;
	var predictionText = '';

	$('button.jqPredict').on('click', function () {
		var self = $(this);
		id = self.data('id');
		text = self.data('text');
		console.log(id, text);

		$('#modal_predict').show();
		$('h5.jqModalTitle').text(text);

		if (id > 1 && id < 5) {
			$.ajax({
				method: 'GET',
				url: teamUrl,

				success: function (data) {
					$.ajax({
						method: 'GET',
						url: getPredicted,

						success:function (predictedArray) {
							var option = '<option value=-1>Select</option>';
							$('.jqSelect').html('');
							$('.jqSelect').append(option);
							for (var i = 0; i < data.length; i++) {
								if(!predictedArray.includes(data[i].name)){
									option = '<option value={0}>{1}</option>'
										.replace('{0}', data[i].id)
										.replace('{1}', data[i].name);

									$('.jqSelect').append(option);
								}
							}
						},
						error:function(){
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
				url: playerUrl,

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
					console.log('error');
				}
			});
		}

	});

	$('.jqSelect').change(function () {
		selected = $('.jqSelect').val();
		predictionText = $('.jqSelect :selected').text();
		// console.log(selected);
	});


	$('button.jqClose').on('click', function () {
		$('#modal_predict').hide();
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
})