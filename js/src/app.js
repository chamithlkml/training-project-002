$(window).on('load', function(){
$(".signup").css("display","none");

$("#linkcreatAcc").click(function(){
   $(".signin").css("display","none");
   $(".signup").css("display","");
});

$("#linkloging").click(function(){
    $(".signin").css("display","");
    $(".signup").css("display","none");
 });
 





let is_form_validated = function(){
   let first_name_validation = function(){
        let first_name = $("#fname").val();
        if(first_name==""){
                $("#fname_error").html("**First name should not be emplty");
                return false;
            }else if(new RegExp("[a-zA-Z]").test(first_name)==false){
                $("#fname_error").html("**Invalid First name ");
                return false;
            }else{
                $("#fname_error").html("");
                return true;  
            }
    };
   let last_name_validation = function(){
        let last_name = $("#lname").val();
        if(last_name==""){
                $("#lname_error").html("**Last name should not be emplty");
                return false;
            }else if(new RegExp("[a-zA-Z]").test(last_name)==false){
                $("#lname_error").html("**Invalid last name ");
                return false;
            }else{
                $("#lname_error").html("");
                return true;  
            }
    };
    let email_validation = function(){
        let email_name = $("#nemail").val();
        let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
        if(email_name==""){
                $("#email_error").html("**Email Address should not be emplty");
                return false;
            }else if(regex.test(email_name)==false){
                $("#email_error").html("**Invalid Email Address ");
                return false;
            }else{
                $("#email_error").html("");
                return true;  
            }
    };
    let bday_validation = function(){
        let bday_name = $("#bday").val();
        if(bday_name==""){
                $("#bday_error").html("**Birthday should be selected");
                return false;
            }else{
                $("#bday_error").html("");
                return true;  
            }
    };
    let pass_validation = function(){
        let pass_name = $("#pass").val();
        if(pass_name==""){
                $("#pass_error").html("**Password should not be emplty");
                return false;
            }else{
                $("#pass_error").html("");
                return true;  
            }
    };
    let con_pass_validation = function(){
        let pass_name = $("#pass").val();
        let con_pass_name = $("#conpass").val();
        if(con_pass_name!=pass_name){
                $("#re_pass_error").html("**Password not matched");
                return false;
            }else{
                $("#re_pass_error").html("");
                return true;  
            }
    };
   first_name_validation(),last_name_validation(),email_validation(),bday_validation(),pass_validation(),con_pass_validation();
    if(first_name_validation()==true && last_name_validation()==true && email_validation() && bday_validation() && pass_validation() && con_pass_validation()){
    
        return true;
    }else{
        return false;
    }
};

$('#signup_form').on('submit', function(e){
    

    if(is_form_validated()==true){
        e.preventDefault();
        console.log('my form submitted');
        // @todo Show error messages below the inputs
    }else{
        e.preventDefault();
        console.log('my form not submitted');
    }
});
});