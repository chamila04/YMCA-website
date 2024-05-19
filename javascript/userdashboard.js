$(document).ready(function(){
    $("#roombookdiv").on('click',function(){
        window.open("viewroom.php","_self");
    });
});

$(document).ready(function(){
   $("#courtbookdiv").on('click',function(){
        window.open("viewcourt.php","_self");
    }); 
});

$(document).ready(function(){
    $("#back_btn").on('click',function(){
         window.open("userdashboard.php","_self");
     }); 
 });

$(document).ready(function(){
    $("#acc_btn").on('click',function(){
         window.open("database/db_updateacc.php","_self");
     }); 
 });