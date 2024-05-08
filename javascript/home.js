// signup button function
$(document).ready(function(){
    $("#signup_btn").on('click',function(){
        window.open("signup.php","_self");
    });
    $("#loginbtn").on('click',function(){
        window.open("login.php","_self");
    });
});

// booking modal functions
$(document).ready(function(){
    $(".checkdate").datepicker({
        autoclose:true,
        clearBtn:true,
        endDate:'+30d',
        startDate:'+1d',
        format:'yyyy-mm-dd',
        todayHighlight:true
    });

    $("#roomcount").bootstrapNumber({
        center:true,
        downClass:'danger',
        upClass:'success'
    });
});
