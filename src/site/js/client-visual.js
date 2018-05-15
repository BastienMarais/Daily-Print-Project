jQuery(document).ready(function($) {
  var header = ["#","ID","Fichier","Date de retour","status"]
  var content = "<tbody>"
  for(i=0; i<header.length; i++){
    content += '<tr><th>' + i + '</th><td>'+'000'+i+'</td><td>'+'link.fr</td><td>'+'01/01/18</td><td>'+'status</td></tr>';
  }
  content+="</tbody>"
  content += "</table>"

  $('table').append(content);
});
