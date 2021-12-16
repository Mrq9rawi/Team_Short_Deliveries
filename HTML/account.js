"use strict"

$(()=>{
    var $password1 = $("#password1").val().trim();
    var $password2 = $("#password2").val().trim();
    var $isValid = true;
    $("#submit").click(evt =>{
        if ($password1 != $password2) {
            isValid = false;
            $("#password2").next("Passwords must match");
        }
        else {
            $isValid = true;
        }
        if ($isValid == false) {
            evt.preventDefault();
        }
        else {
            isValid = true;
            return true;
        }
    });
});