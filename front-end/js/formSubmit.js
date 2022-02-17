$('#form').submit(function(event) {
	let val = $('input#search').val();
	let url = "http://localhost:3000/people";
	
	if ( val !== "") url = url + "/" + val;

	$.ajax({
		url: url,
	}).done(function (res) {
		console.log(res)
		$('tbody').empty()
		fillTbody(res);
	});
	event.preventDefault();
});