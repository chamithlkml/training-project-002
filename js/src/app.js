$(window).on('load', function(){
    
    let is_form_validated = function(){
        $('#fname').val('Priya');
    

        let first_name = $('#fname').val();

        return false;
    };

    $('#signup_form').on('submit', function(e){
        
        if(!is_form_validated()){
            e.preventDefault();
            console.log('my form submitted');
            // @todo Show error messages below the inputs
        }
    });
});