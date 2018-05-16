jQuery(document).ready(function($) {
  var header = ["#","ID","Fichier","Date de retour","status"]
  var content = "<tbody>"
  for(i=0; i<header.length; i++){
    content += '<tr id="'+i+'"><th>' + i + '</th><td>'+'000'+i+'</td><td>'+'link.fr</td><td>'+'01/01/18</td><td>'+'status</td>'
	content+='<td id="'+"><button type="button" class="close" aria-label="Close" data-toogle="confirmation" id="'+i+'"><span aria-hidden="true">&times;</span></button></td></tr>'
  }
  content+="</tbody>"
  content += "</table>"

  $('table').append(content);
  for(i=0; i<header.length; i++){
    $('#'+i).on("click",function() {
		 r = confirm("Annuler la demande ?");
		 if (r == true){
			 $('#'+i).on("click",function() {
				 
			 }
		 }
		else{
			
		}
	 });
  }
});
