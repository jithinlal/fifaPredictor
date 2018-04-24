$('.home_score').on('click',function(e){
	e.preventDefault();
	var teamName = $(this).data('team');

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
			swal("Great!", "Your prediction of " + teamName + " scoring " + value + " goals is recorded!", "success");	
		}		
	});	
})