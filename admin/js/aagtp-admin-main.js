
var inputstring = "";
var current_val = [];
var inputname = [];
let mediaUploader;
class aagtp_admin_main{  
    constructor(){}

    tab_split(tabid){
        var tabslice = tabid.split("-");
        let contentid = "#"+tabslice[0]+("-cont");

        return contentid;
    }

    color_val_change(id){ 
        var hexid = "#" + id + "-hex";
        return hexid;
    }

    // valToHiddenInput(val, name){
        
    //     //push values into array if not existing else stop function
    //     // if(jQuery.inArray(val, current_val) == -1){
    //     //     current_val.push(val);
    //     //     inputname.push(name);
    //     //     //To add in hidden input 
    //     //     if(inputstring != ""){
    //     //         inputstring = inputstring + ", " +  val;
    //     //     }else{
    //     //         inputstring = val;
    //     //     }
    //     //     return inputstring;
    //     //     console.log(current_val);
    //     // }else{
    //     //     return;
    //     // }
    // }



}


jQuery(document).ready(function(){

    var aagtpMain = new aagtp_admin_main();
    //admin tab click
    jQuery(".aagtp_popuptab").click(function(){
        jQuery(".aagtp_popuptab").removeClass("active");
        var tab_id =  jQuery(this).toggleClass("active");
        
        //show content
        let tabid = jQuery(this).attr("id");
        var contentid = aagtpMain.tab_split(tabid);
        
        jQuery(".aagtp_popupcont").removeClass("active");
        jQuery(contentid).toggleClass("active");
    });

    //color text pass value to input
    jQuery(".color-input > input:first-child").on('input change', function(){
        var inputid = jQuery(this).attr("id");

        var hexid = aagtpMain.color_val_change(inputid);
        jQuery(hexid).val(jQuery(this).val());
    });

    //Page targeting
    
    // jQuery("select#aagtp_page_target").on("change", function(){
        
    //     //get value and text
    //     // var clickedval = jQuery(this).val();
    //     // var clickedname = jQuery(this).text();
    //     // aagtpMain.valToHiddenInput(clickedval, clickedname);
        
    //     // //add ids to hidden input to pass as post meta for page conditionals
    //     // jQuery("input#aagtp_target_ids").val(inputstring);
        

    //     //displayTargets(inputstring);

    // });

});