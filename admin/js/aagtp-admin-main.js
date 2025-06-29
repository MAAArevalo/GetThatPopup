 
jQuery(document).ready(function(){
    //admin tab click
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

    //color text pass value to input
    jQuery(".color-input > input:first-child").on('input change', function(){
        var inputid = jQuery(this).attr("id");
        var hexid = "#" + inputid + "-hex";
        jQuery(hexid).val(jQuery(this).val());
    });

    //Page targeting
    var current_val = [];
    var inputstring = "";
    var inputname = [];
    jQuery("select#aagtp_page_target").on("change", function(){
        
        //get value and text
        var clickedval = jQuery(this).val();
        var clickedname = jQuery(this).text();

        //push values into array if not existing else stop function
        if(jQuery.inArray(clickedval, current_val) == -1){
            current_val.push(clickedval);
            inputname.push(clickedname);
        }else{
            return;
        }

        //To add in hidden input 
        if(inputstring != ""){
            inputstring = inputstring + ", " +  clickedval;
        }else{
            inputstring = clickedval;
        }

        //add ids to hidden input to pass as post meta for page conditionals
        jQuery("input#aagtp_target_ids").val(inputstring);

        

    });
});