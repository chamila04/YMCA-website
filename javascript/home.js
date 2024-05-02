// signup button function
$(document).ready(function(){
    $("#signupbtn").on('click',function(){
        window.open("signup.html", "_blank");
    });
});

// booking modal functions
$(document).ready(function(){
    $(".checkdate").datepicker({
        autoclose:true,
        clearBtn:true,
        endDate:'+30d',
        startDate:'+1d',
        format:'dd/mm/yyyy',
        todayHighlight:true
    });

    $("#roomcount").bootstrapNumber({
        center:true,
        downClass:'danger',
        upClass:'success'
    });
});