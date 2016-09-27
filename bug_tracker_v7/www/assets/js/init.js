$(document).ready(function(){

	//* je fait des inits ici par ce que j'ai envie
	 $(".button-collapse").sideNav();

	 
    $('input#input_text, textarea#textarea1').characterCounter();
  
	
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
 

	
    $('select').material_select();
  
	
	$('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });  
    

    
    
	  Materialize.showStaggeredList('.container');
        

	var hauteur= $(window).height();
	var largeur = $(window).width();
	
	$("#display_login")
		.css({
		"height" : hauteur,
		"width" : largeur/1.1,
		})

	$( window ).resize(function() {
			
			largeur = ($(window).width()/1.1);
			hauteur= ($(window).height());
 
      		$("#display_login")
				.css({
				
				"height" : hauteur,
				"width" : largeur,
				})
			
			console.log(hauteur);

     });
	

});