
				//var $j = jQuery.noConflict();
$(document).ready(function() {

  $("#div2").hover(
	//on mouseover .css({'opacity':'0.2'})
	
	function() {
		//$(this).css({'top':'35%'});	
	  $("#contenido-interno").animate({
		  height: '50%', top:'-120px', overflow:'hidden'//adds 250px
		}, 'slow' //sets animation speed to slow
	  );
	},
	//on mouseout
	function() {
		//$(this).css({'top':'77%'});	
	  $("#contenido-interno").animate({
		   top:'-54px' //changes back to 50px
	   }, 'slow'
	  );
	}
  );

});
	