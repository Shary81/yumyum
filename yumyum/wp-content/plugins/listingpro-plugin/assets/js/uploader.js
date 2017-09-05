jQuery(document).ready(function($){
	
	'use-strict';


	var abc = 1;      // Declaring and defining global increment variable.
	$(document).ready(function() {


		$('body').on('change', '#file', function(event) {
			var files = event.target.files; //FileList object
            var output = document.getElementById("filediv");
            
            for(var i = 0; i< files.length; i++)
            {
				var file = files[i];
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("ul");
                    div.className = 'jFiler-items-list jFiler-items-grid grid'+i;
                    div.innerHTML = '<li class="jFiler-item">\
										<div class="jFiler-item-container">\
											<div class="jFiler-item-inner">\
												<div class="jFiler-item-thumb">\
													 <img  class="thumbnail" src="'+ picFile.result +'" title="' + picFile.name + '"/>\
												</div>\
											</div>\
										</div><a class="icon-jfi-trash jFiler-item-trash-action"></a>\
									</li>';
					
					
					
                    
                    output.insertBefore(div,null);  
					
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
				
            }    
			$('.jFiler-item-trash-action').on('click',function() {
					$(this).parent().parent().parent().remove();
			});
			$(output).find('input').hide();
					$(output).before($("<div/>", {
					id: 'filediv'
					}).fadeIn('slow').append($("<input/>", {
						name: 'listingfiles[]',
						type: 'file',
						id: 'file',
						multiple: 'multiple' 
					})));
		});
		// To Preview Image
		function imageIsLoaded(e) {
			$('#previewimg' + abc).attr('src', e.target.result);
		}; 

		
/* 		window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("files");
        
        filesInput.addEventListener("change", function(event){
            
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                if(!file.type.match('image'))
                  continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    
                    var div = document.createElement("div");
                    
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
} */
    
		
		
		
		
		
	});	
	
	function initialize() {
        var input = document.getElementById('inputAddress');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize); 
	
});
