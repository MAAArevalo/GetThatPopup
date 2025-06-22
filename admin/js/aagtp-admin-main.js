//admin tab click 
jQuery(document).ready(function(){
    jQuery(".aagtp_popuptab").click(function(){
        jQuery(".aagtp_popuptab").removeClass("active");
        jQuery(this).toggleClass("active");
        
        //show content
        let tabid = jQuery(this).attr("id");
        var tabslice = tabid.split("-");
        let contentid = "#"+tabslice[0]+("-cont");
        
        jQuery(".aagtp_popupcont").removeClass("active");
        jQuery(contentid).toggleClass("active");
    });
});