$(document).ready(function(){
    $('#signup_form').submit(function(e){
        let pwd=$('#cre_pwd').val();
        let c_pwd=$('#con_pwd').val();

        if(pwd != c_pwd){
            alert("passwords do not match!");
            e.preventDefault();
        }
    });
});