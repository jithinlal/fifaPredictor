$(document).ready(function () {
	var id = 0;
	var text = '';
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
				url: url,

				success: function (data) {
					var option = '';
					for (var i = 0; i < data.length; i++) {
						option = '<option id={0}>{1}</option>'
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

	$('button.jqClose').on('click', function () {
		$('#modal_predict').hide();
	});

	$('button.jqSave').on('click', function () {
		if (id === 1) {
			console.log('You selected world cup winners :', $('.jqSelect option:selected').val());
			$('.jqWinner').text($('.jqSelect option:selected').val());
		} else if (id === 2) {
			console.log('You selected runners up : ', $('.jqSelect option:selected').val());
		} else if (id === 3) {
			console.log('You selected 3rd place winners : ', $('.jqSelect option:selected').val());
		} else if (id === 4) {
			console.log('You selected 4th place winners : ', $('.jqSelect option:selected').val());
		}

	});
})