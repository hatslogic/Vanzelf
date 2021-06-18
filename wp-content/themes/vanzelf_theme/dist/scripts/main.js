jQuery(document).ready(function() {

	jQuery('#gform_1').validate({

	    rules: {
	      input_3: {
	        required: true,
	      },input_1: {
	        required: true
	      }
	    },
	    errorElement: "div",
	    errorPlacement: function(error, element) {
	      element.after(error);
	    }

	});

    jQuery(".nav-trigger-cont").click(function() {
        jQuery(this).toggleClass("open");
        jQuery("body").toggleClass("mobilenav-activeblock");
    });

    jQuery("#gform_1").on("submit",function(e) {
        e.preventDefault();
        
     	if(jQuery(this).valid()) {
            
            var buttonText = jQuery("#gform_submit_button_1").val();    
            jQuery("#gform_submit_button_1").val("Loading...");
            jQuery("#gform_submit_button_1").attr("disabled",'disabled');
     		var postcode = jQuery("#input_1_3").val();
     		var housenumber = jQuery("#input_1_1").val();
     		var addition = jQuery("#input_1_4").val();
     		
            jQuery.ajax({
        	type: "POST",
        	url: "/wp-admin/admin-ajax.php",
        	data: {
            action: 'addresslookup',
            postcode: postcode,
            housenumber : housenumber,
            addition :addition
        	},
        	success: function (output) {
        		jQuery("#gform_submit_button_1").val(buttonText);
                jQuery("#gform_submit_button_1").removeAttr("disabled");
        		var output = jQuery.parseJSON( output );
           		if(output.status){
           			window.location.href = output.redirecturl;
                       
           		}else{
           			jQuery("#gform_fields_1").before(output.message);
           		}
        	}
       		});
        }	
    });

    jQuery("#gform_submit_button_1").on("click",function(e){ 
    	e.preventDefault();
    	jQuery("#gform_1").submit();
    });

});