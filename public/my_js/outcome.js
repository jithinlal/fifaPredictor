$(document).ready(function () {
	$('.predictOutcome').on('click', function () {
		var myPrediction = $(this).data('myprediction');
		var originalOutcome = $(this).data('originaloutcome');
		var userPoint = $(this).data('userredpoint');
		var title = $(this).data('title');
		var comment = $(this).data('comment')

		$('#InfoModal').modal('show');
		$('#yourPre').empty();
		$('#oriOutcome').empty();
		$('#totalPoint').empty();
		$('.modal-title').empty();
		$('#commentSection').empty();

		$('#yourPre').text(myPrediction);
		$('#oriOutcome').text(originalOutcome);
		$('#totalPoint').text(userPoint);
		$('.modal-title').text(title);
		$('#commentSection').text(comment);
	});

	$('.bonusOutcome').on('click', function () {
		var goalPoints = $(this).data('goalpoints');
		var goals = $(this).data('goals');
		var bonusPoints = $(this).data('bonuspoints');
		var favTeam = $(this).data('team');
		var result = $(this).data('result');

		$('#bonusInfoModal').modal('show');
		$('#resultOfMatch').empty();
		$('#winBonus').empty();
		$('#goalsScored').empty();
		$('#goalBonus').empty();

		$('.bonusModalTitle').html('Bonus Points for : <span style="color:red;">' + favTeam + '</span>');
		$('#resultOfMatch').text(result);
		$('#winBonus').text(bonusPoints);
		$('#goalsScored').text(goals);
		$('#goalBonus').text(goalPoints);
	});
})