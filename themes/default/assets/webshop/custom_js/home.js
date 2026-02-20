$(document).ready(function(){
    section_ready = true;
    var load_sections = ['section_features_list','section_top_categories'];
    
    $.each( load_sections, function( index, seactionName ) {
         
       // load_section(seactionName);
            
    });    
    
    //Category Active Tab Products Show.
    $('.active_tab_product').show();      
    $('.active_tab_product').removeClass('active_tab_product'); 
    $('._tab_product').show();      
    $('._tab_product').removeClass('_tab_product'); 
     
    
     
    
    
});



function load_section(seaction_name) {
    
    
    var callurl = $('#base_url').val();
    
    var postData = 'action=get_section';
        postData = postData + '&section=' + seaction_name;;

    $.ajax({
        type: "POST",
        url: callurl + "webshop/webshop_request",
        data: postData,
        beforeSend: function(){                    
            $("#"+seaction_name).html("<div class='overlay'><i class='fa fa-refresh fa-spin'></i></div>");                    
        },
        success: function(data){
            section_ready = true;
            $("."+seaction_name).html(data);			 
        }
    });
        
} 