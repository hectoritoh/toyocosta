
				//var $j = jQuery.noConflict();
$(document).ready(function() {


 	$('div[id^="montacargas"]').hover(

		function( e ) {
			e.preventDefault();
	     	e.stopPropagation();
	      	var id= $(this).attr('id');
	      	var a = id.split('-');
	      	var num = a[1];
	      
			//$(this).css({'top':'35%'});	
		  $("#contenido-interno-"+num).stop(true, true).animate({
			  height: '150px', top:'120px', overflow: 'hidden' //adds 250px
			}, 'slow' //sets animation speed to slow
		  );
		 
		},
		//on mouseout
		function( e ) {
			e.preventDefault();
	     	e.stopPropagation();
	      	var id= $(this).attr('id');
	      	var a = id.split('-');
	      	var num = a[1];
			//$(this).css({'top':'77%'});	
		  $("#contenido-interno-"+num).animate({
			    height: '54px', top:'190px' //changes back to 50px
		   }, 'slow'
		  );	 
		}
  	);


	$('li[id^="sub-menu-productos"]').hover(

		function( e ) {
			e.preventDefault();
	     	e.stopPropagation();
	      	var id= $(this).attr('id');
	      	var a = id.split('-');
	      	var num = a[3];
	      	$(id).css({'opacity': '0.7'});
	      	if(num==1){
	      		$('#sub-categorias-menu-'+num).css({'display':'block'});
	      	}else if(num==2){
	      		$('#sub-categorias-menu-'+num).css({'display':'block','right': '280px'});
	      	}else if(num==3){
				$('#sub-categorias-menu-'+num).css({'display':'block','right': '140px'});
	      	}else if(num==4){
				$('#sub-categorias-menu-'+num).css({'display':'block','right': '0px'});
	      	}
	 	 
		},
		//on mouseout
		function( e ) {
			e.preventDefault();
	     	e.stopPropagation();
	      	var id= $(this).attr('id');
	      	var a = id.split('-');
	      	var num = a[3];
			$('#sub-categorias-menu-'+num).css({'display':'none'});	
		 
		 
		}

	);


	$('li[id^="sub-sub-menu"]').hover(

		function( e ) {
			e.preventDefault();
	     	e.stopPropagation();
	      	var id= $(this).attr('id');
	      	var a = id.split('-');
	      	var num = a[3];
	      	$(id).css({'opacity': '0.7'});
	      	if(num==1){
	      		$('#sub-'+num).css({'display':'block'});
	      	}else if(num==2){
	      		$('#sub-'+num).css({'display':'block','right': '280px'});
	      	}else if(num==3){
				$('#sub-'+num).css({'display':'block','left':'138px','top':'74px'});
	      	}else if(num==4){
				$('#sub-'+num).css({'display':'block','right': '0px'});
	      	}
	  
		 
		},
		//on mouseout
		function( e ) {
			e.preventDefault();
	     	e.stopPropagation();
	      	var id= $(this).attr('id');
	      	var a = id.split('-');
	      	var num = a[3];
			$('#sub-'+num).css({'display':'none'});	
		 
		 
		}

	);


});

function mostrarSubmenu(a){
	if($("#"+a).is(":hidden") ) {
		$("#"+a).css({'display':'block'});
	}else{
		$("#"+a).css({'display':'none'});
	}
}


