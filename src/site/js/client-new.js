jQuery(document).ready(function($) {
	
   $("#protectedPublicationTitle").on("click",function() {
		 if ($("#protectedPublication").is(":hidden")) {
			$("#protectedPublication").show("slow");
		 }
		 else {
			$("#protectedPublication").hide("slow");
		 }
	});
});