// signup button function
$(document).ready(function(){
    $("#signup_btn").on('click',function(){
        window.open("signup.php","_self");
    });
});

$(document).ready(function(){
    $("#logoutdiv").on('click',function(){
        window.open("userdashboard.php","_self");
    })
})

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

    $(".daycount").bootstrapNumber({
        center:true,
        downClass:'danger',
        upClass:'success'
    });

    function roomprice(){
        var nor=$("#roomcount").val();
        var nodr=$("#daycountr").val();
        var rtot= nor*nodr*500;

        $("#pricevalr").val(rtot);
    }

    function courtprice(){
        var nodc=$("#daycountc").val();
        
        if($("#morningcheck").is(":checked")){
            if($("#afternooncheck").is(":checked")){
                var ctot=nodc*500;
            }
            else{
                var ctot=nodc*300; 
            }
        }
        else if($("#afternooncheck").is(":checked")){
            var ctot=nodc*300;
        }

        $("#pricevalc").val(ctot);
    }

    $("#daycountr").on('change',function(){
        roomprice();
    })

    $("#roomcount").on('change',function(){
        roomprice();
    })

    $("#daycountc").on('change',function(){
        courtprice();
    })

});
