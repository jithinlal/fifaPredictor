$(document).ready(function(){
	$('.predictOutcome').on('click',function(){
		var myPrediction = $(this).data('myprediction');
		var originalOutcome = $(this).data('originaloutcome');
		var userPoint = $(this).data('userredpoint');
		var title = $(this).data('title');

		$('#InfoModal').modal('show');
		$('#yourPre').empty();
		$('#yourPre').text(myPrediction);
		$('#oriOutcome').text(originalOutcome);
		$('#totalPoint').text(userPoint);
		$('.modal-title').text(title);
	});
})
