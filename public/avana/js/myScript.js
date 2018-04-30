$(document).ready(function(){
	$('.home_score').on('click',function(e){
		e.preventDefault();
		var teamName = $(this).data('team');
		var teamId = $(this).data('id');

		swal(teamName + " will score ...", {
			content:{
				element:"input",
				attributes:{
					type:"number"
				}
			},
			buttons:true,

		}).then((value) => {
			if(value !== null && value !== ''){
				swal("Great!", "Your prediction of " + teamName + "(" + teamId + ") scoring " + value + " goals is recorded!", "success");	
			}		
		});	
	});

	$('.away_score').on('click',function(e){
		e.preventDefault();
		var teamName = $(this).data('team');
		var teamId = $(this).data('id');

		swal(teamName + " will score ...", {
			content:{
				element:"input",
				attributes:{
					type:"number"
				}
			},
			buttons:true,

		}).then((value) => {
			if(value !== null && value !== ''){
				swal("Great!", "Your prediction of " + teamName + "(" + teamId + ") scoring " + value + " goals is recorded!", "success");
				$.ajax({
					method:'POST',
					url:storeAwayGoal,
					data:{
						teamId : teamId
					},

					success:function(result){

					}
				});
			}		
		});	
	});

	$('.yellow_card').on('click',function(e){
		e.preventDefault();		
		$.confirm({
			theme:'supervan',
			title:'Yellow Card',
			content:'Do you see a yellow card in this match?',
			buttons:{
				confirm:function(){
					$.alert('Confirmed!');
				},
				cancel:function(){
					$.alert('Canceled!');
				}
			}
		});
	});

	$('.hat_trick').on('click',function(e){
		e.preventDefault();		
		$.confirm({
			theme:'supervan',
			title:'Hat Trick',
			content:'Do you see a hat trick in this match?',
			buttons:{
				confirm:function(){
					$.alert('Confirmed!');
				},
				cancel:function(){
					$.alert('Canceled!');
				}
			}
		});
	});

	$('.own_goal').on('click',function(e){
		e.preventDefault();		
		$.confirm({
			theme:'supervan',
			title:'Own Goal',
			content:'Do you see a own goal in this match?',
			buttons:{
				confirm:function(){
					$.alert('Confirmed!');
				},
				cancel:function(){
					$.alert('Canceled!');
				}
			}
		});
	});

	$('.red_card').on('click',function(e){
		e.preventDefault();		
		$.confirm({
			theme:'supervan',
			title:'Red Card',
			content:'Do you see a red card in this match?',
			buttons:{
				confirm:function(){
					$.alert('Confirmed!');
				},
				cancel:function(){
					$.alert('Canceled!');
				}
			}
		});
	});
});