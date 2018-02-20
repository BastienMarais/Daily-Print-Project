jQuery(document).ready(function($) {
   // Votre code ici avec les appels à la fonction $()
   $("#datehour").hide();
   $("#datehour2").hide();
   $("#datehour3").hide();
   $("#datehour4").hide();

   $("input#acc1").on("click",function(){
     if(confirm("Voulez-vous valider cette demande?")){
       //$("#acc1").hide("fast"); $("#ref1").hide("fast");
        alert("Demande validé !");
       $("#1").hide("fast");
       //$("#datehour").show("fast");
       return false;
    }
    else{return false;}
});

$("input#acc2").on("click",function(){
  if(confirm("Voulez-vous valider cette demande?")){
    alert("Demande validé !");
    $("#2").hide("fast");
    //$("#acc2").hide("fast"); $("#ref2").hide("fast");
    //$("#datehour2").show("fast");
    return false;
  }
  else{return false;}
});

$("input#acc3").on("click",function(){
  if(confirm("Voulez-vous valider cette demande?")){
    alert("Demande validé !");
    $("#3").hide("fast");
    //$("#acc3").hide("fast"); $("#ref3").hide("fast");
    //$("#datehour3").show("fast");
    return false;
  }
  else{return false;}
});

$("input#acc4").on("click",function(){
  if(confirm("Voulez-vous valider cette demande?")){
    alert("Demande validé !");
    $("#4").hide("fast");
    //$("#acc4").hide("fast"); $("#ref4").hide("fast");
    //$("#datehour4").show("fast");
    return false;
  }
  else{return false;}
});

//Refuser
$("input#ref1").on("click",function(){
  if(confirm("Voulez-vous supprimer cette demande?")){
    alert("Demande supprimée !");
    $("#1").hide("fast");
    return false;
  }
  else{return false;}
});

$("input#ref2").on("click",function(){
  if(confirm("Voulez-vous supprimer cette demande?")){
    alert("Demande supprimée !");
    $("#2").hide("fast");
    return false;
  }
  else{return false;}
});

$("input#ref3").on("click",function(){
  if(confirm("Voulez-vous supprimer cette demande?")){
    alert("Demande supprimée !");
    $("#3").hide("fast");
    return false;
  }
  else{return false;}
});

$("input#ref4").on("click",function(){
  if(confirm("Voulez-vous supprimer cette demande?")){
    alert("Demande supprimée !");
    $("#4").hide("fast");
    return false;
  }
  else{return false;}
});

});
