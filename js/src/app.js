/*$(".signup").css("display","none");

$("#linkcreatAcc").click(function(){
   $(".signin").css("display","none");
   $(".signup").css("display","");
});

$("#linkloging").click(function(){
    $(".signin").css("display","");
    $(".signup").css("display","none");
 });*/
 
$(".signin").css("display","none");
$(window).on('load', function(){
    
});



let is_form_validated = function(){
    $('#fname').val('');

    alert("ab");
        
    let first_name = $('#fname').val();
    console.log(first_name);
    let fname_er = true;
    if(first_name==""){
        $(".fname_error").html("First name should not be emplty");
        return false;
        fname_er=false;
        alert("a");
        

    }
};

$('#signup_form').on('submit', function(e){
    
    if(!is_form_validated()){
        e.preventDefault();
        console.log('my form submitted');
        // @todo Show error messages below the inputs
    }
})