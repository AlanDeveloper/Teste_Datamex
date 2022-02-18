function fillTbody(data) {
	data.forEach((e, index) => {
		if (index > 4) return;
		$('tbody').append(`
			<tr>
				<td class="text-bold">${index + 1}</td>
				<td>${e.nome}</td>
				<td>${e.nFilhos}</td>
			</tr>
		`);
	});
	if (data.length > 5) createBottomBar(data);
}

function createBottomBar(data) {
	$('tbody').append(`
		<tr id="bottomBar">
			<td class="text-bold" colspan="3">${data.length > 5 ? 'Existem mais de 5 registros, refine sua pesquisa' : 'Nenhum registro foi encontrado'}</td>
		</tr>
	`);
}

$(document).ready(function () {
	$.ajax({
		url: "http://localhost:3000/people"
	}).done(function (res) {
		fillTbody(res);
	});
});