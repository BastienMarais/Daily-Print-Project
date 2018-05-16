jQuery(document).ready(function($) {
	var header = ["#","Numéro de la demande","Etat de la demande"];
	var content = "<tbody>"
	for (i=0;i<header.length;i++){
		content +='<tr><th>'+i+'</th><td>'+'000'+i+'</td><td data-toggle="modal" data-target="#forgetPassword">email'+i+'@dailyprint.xyz</td><td><select class="custom-select">'
		content +='<option selected>Statut de la demande</option><option value="1">En attente</option><option value="2">En cours</option><option value="3">Prêt</option><option value="4">Annulé</option><input class="btn btn-primary" type="button" value="Modifier le statut"></td></tr>'
	}
	content += "</tbody>"
	content += "</table>"
	$('table').append(content);
});
