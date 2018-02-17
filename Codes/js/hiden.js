jQuery(document).ready(function($) {
   // Votre code ici avec les appels à la fonction $()
   $("input#sup1").on("click",function(){
     alert("Voulez-vous réellement supprimer ce compte?")
     $("#1").hide("slow");
     return false;
});

$("input#sup2").on("click",function(){
  alert("Voulez-vous réellement supprimer ce compte?")
  $("#2").hide("slow");
  return false;
});

$("input#sup3").on("click",function(){
  alert("Voulez-vous réellement supprimer ce compte?")
  $("#3").hide("slow");
  return false;
});

$("input#sup4").on("click",function(){
  alert("Voulez-vous réellement supprimer ce compte?")
  $("#4").hide("slow");
  return false;
});

});
