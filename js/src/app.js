$(window).on('load', function(){


// Navigate user to SignUp form
    $(".signup").css("display","none");

$("#linkcreatAcc").click(function(){
   $(".signin").css("display","none");
   $(".signup").css("display","");
});

// Navigate user to SignIn form
$("#linkloging").click(function(){
    $(".signin").css("display","");
    $(".signup").css("display","none");
 });


//Arays for form unput
let check_for_emptyness = [
    {
        id: 'fname',
        error_id: 'fname_error',
        name: 'First name'
    },
    {
        id: 'lname',
        error_id: 'lname_error',
        name: 'Last name'
    },
    {
        id: 'nemail',
        error_id: 'email_error',
        name: 'Email address'
    },
    {
        id: 'bday',
        error_id: 'bday_error',
        name: 'Birth day'
    },
    {
        id: 'pass',
        error_id: 'pass_error',
        name: 'Password'
    },
    {
        id: 'conpass',
        error_id: 're_pass_error',
        name: 'Confirm Password'
    }
];
//For check validation of input
let input_email_validation=true;
let password_comfirm_field=true;
let input_error=true;
let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;

//Check validation when form editing
check_for_emptyness.forEach(function(field){
    $(document).on("change", '#'+field['id'], function(){
        let input_value =$(this).val();
        if(input_value=="" && field['id']!= 'conpass'){
            $('#'+field['error_id']).html("**"+field['name']+" should not be empty");  
        }else{
            $('#'+field['error_id']).html("");
        };
        if(field['id']=="nemail" && regex.test(input_value)==false){
            $('#'+field['error_id']).html("**Invalid Email Address ");   
 
        };
        if($("#pass").val() != $("#conpass").val()){
            $("#re_pass_error").html("**Password not matched");
            password_comfirm_field=true;
        }else{
            password_comfirm_field=false;
        };
    });

});
//check validation when submit
$('#signup_form').on('submit', function(e){

    check_for_emptyness.forEach(function(field){
        let input_value =$('#'+field['id']).val();
        if(input_value=="" ){
            $('#'+field['error_id']).html("**"+field['name']+" should not be empty");
            input_error=true;    
        }else{
            $('#'+field['error_id']).html("");
            input_error=false;
        };
    });

    if(regex.test($("#nemail").val())==false){
        $("#email_error").html("**Invalid Email Address "); 
        input_email_validation=true;  
    }else{
        input_email_validation=false;
    };
  
    if(input_email_validation==false && password_comfirm_field==false && input_error==false){
        e.preventDefault();
        console.log('my form submitted');
    }else{
       e.preventDefault();
       console.log('my form not submitted');
    }
});
}); 

 //Code sample to call a method on its value changed event
 //$(document).on("change","#fname", function(){
 //    console.log('firstname changed');
 //});

 //var my_int = 1;
// var my_sstr = 'asdfadsf';
 //let non_empty_fields = ['fname', 'lname'];// Javascript array
 // console.log(non_empty_fields[0]);
 // console.log(non_empty_fields.length);
 // non_empty_fields.push()
 // non_empty_fields.pop{}
 // non_empty_fields.shift
 // non_empty_fields.unshift
 
 // loop through array, Iteration
 // non_empty_fields.forEach(function(el){
 //     console.log(el);
 // });
/*check_for_emptyness.forEach(function(input_id){
    $(document).on("change", '#'+input_id, function(){
        // Get value of the input example 1
        // let input_value = $('#'+input_id).val();
        // Get value of the input example 2
        let input_value = $(this).val();
        console.log('input value: '+input_value);
    });
});*/
/*
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
}; */