var account = document.getElementById("account");
var courses = document.getElementById("courses");
var password = document.getElementById("password");

function disableBodyScroll(){
    const element = document.querySelector("#appBody");
    element.classList.add("stopScroll");
}

disableBodyScroll();
// account appear
document.getElementById("accountClick").addEventListener("click", function(){
    courses.style.visibility = "hidden";
    courses.style.position = "absolute";
    password.style.visibility = "hidden";
    password.style.position = "absolute";

    account.style.position = "relative";
    account.style.visibility = "visible";
});

// course appear 
document.getElementById("courseClick").addEventListener("click", function(){
    disableBodyScroll();
    account.style.visibility = "hidden";
    account.style.position = "absolute";
    password.style.visibility = "hidden";
    password.style.position = "absolute";


    courses.style.position = "relative"
    courses.style.visibility = "visible";
});

// password appear
document.getElementById("passwordClick").addEventListener("click", function(){

    account.style.visibility = "hidden";
    account.style.position = "absolute";
    courses.style.visibility = "hidden";
    courses.style.position = "absolute"; 

    password.style.position = "relative"
    password.style.visibility = "visible";
});
