$(document).ready(function () {
	var id = 0;
	var text = '';
	var selected = -1;

	$('button.jqPredict').on('click', function () {
		var self = $(this);
		id = self.data('id');
		text = self.data('text');
		console.log(id, text);

		$('#modal_predict').show();
		$('h5.jqModalTitle').text(text);

		if (id === 1 || id === 2 || id === 3 || id === 4) {
			$.ajax({
				method: 'GET',
				url: teamUrl,

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
		// console.log(selected);
	});


	$('button.jqClose').on('click', function () {
		$('#modal_predict').hide();
	});

	$('button.jqSave').on('click', function () {
		console.log(selected);
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
						if (id === 1) {
							$('.jqWinner').text($('.jqSelect option:selected').text());
							$('.jqWinner').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 2) {
							$('.jqRunner').text($('.jqSelect option:selected').text());
							$('.jqRunner').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 3) {
							$('.jq3rd').text($('.jqSelect option:selected').text());
							$('.jq3rd').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 4) {
							$('.jq4th').text($('.jqSelect option:selected').text());
							$('.jq4th').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 5) {
							$('.jqA').text($('.jqSelect option:selected').text());
							$('.jqA').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 6) {
							$('.jqB').text($('.jqSelect option:selected').text());
							$('.jqB').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 7) {
							$('.jqC').text($('.jqSelect option:selected').text());
							$('.jqC').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 8) {
							$('.jqD').text($('.jqSelect option:selected').text());
							$('.jqD').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 9) {
							$('.jqE').text($('.jqSelect option:selected').text());
							$('.jqE').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 10) {
							$('.jqF').text($('.jqSelect option:selected').text());
							$('.jqF').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 11) {
							$('.jqG').text($('.jqSelect option:selected').text());
							$('.jqG').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						} else if (id === 12) {
							$('.jqH').text($('.jqSelect option:selected').text());
							$('.jqH').prev().prop('hidden', 'hidden');
							$('#modal_predict').hide();
						}
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