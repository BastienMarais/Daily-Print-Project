jQuery(document).ready(function($) {
  var header = ["#","ID","Fichier","Date de retour","status"]
  var content = "<tbody>"
  for(i=0; i<header.length; i++){
    content += '<tr><th>' + i + '</th><td>nom'+i+'</td><td>prenom'+i+'</td><td>email'+i+'@mail.fr</td><td>status'+i+'</td><td>departement'+i+'</td><td><form><input type="submit" id="acc4" value="Accepter" class="btn background-gradient-green"/><input type="submit" id="acc4" value="Refuser" class="btn background-gradient-red"/></td></tr>';
  }
  content+="</tbody>"
  content += "</table>"
  $('table').append(content);
  
  
});
