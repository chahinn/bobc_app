$(document).ready(function(){
		

        $("#createstartup").click(function(){
            if($("#insertform").is(":visible")){
                $("#insertform").hide();
            } else {
                $("#insertform").show();
            }
            //don't follow the link (optional, seen as the link is just an anchor)
            return false;
        });      
        
        
});