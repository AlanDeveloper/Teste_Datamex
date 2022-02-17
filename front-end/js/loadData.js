function fillTbody(data) {
	data.forEach((e, index) => {
		if (index > 4) return;
		$('tbody').before(`
			<tr>
				<td class="text-bold">${e.id}</td>
				<td>${e.nome}</td>
				<td>${e.idade}</td>
			</tr>
		`);
	});
	if (data.length > 5) createBottomBar(data);
}

function createBottomBar(data) {
	$('tbody').before(`
		<tr id="bottomBar">
			<td class="text-bold" colspan="3">${data.length <= 5 ? 'Existem mais de 5 registros, refine sua pesquisa' : 'Nenhum registro foi encontrado'}</td>
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