function clearTbody() {
	$('tbody').remove();
}

$('#form').submit(function(event) {
	$.ajax({
		url: "http://localhost:3000/people",
		data: {
			search: $('input#search').val()
		}
	}).done(function (res) {
		clearTbody();
		fillTbody(res);
	});
	event.preventDefault();
});