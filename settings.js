var account = document.getElementById("account");
var courses = document.getElementById("courses");
var content = document.getElementById("content");
var password = document.getElementById("password");

const goToTop = () => window.scrollTo(0, 0);


function disableBodyScroll(){
    const element = document.querySelector("#appBody");
    element.classList.add("stopScroll");
    goToTop();
}

function enableBodyScroll(){
    const element = document.querySelector("#appBody");
    element.classList.remove("stopScroll");
}
  

disableBodyScroll();
courses.style.visibility = "hidden";
courses.style.position = "absolute";
password.style.visibility = "hidden";
password.style.position = "absolute";
content.style.position = "hidden";
content.style.visibility = "absolute";

// account appear
document.getElementById("accountClick").addEventListener("click", function(){
    disableBodyScroll();
    courses.style.visibility = "hidden";
    courses.style.position = "absolute";
    password.style.visibility = "hidden";
    password.style.position = "absolute";
    content.style.position = "hidden";
    content.style.visibility = "absolute";

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
    content.style.position = "hidden";
    content.style.visibility = "absolute";

    courses.style.position = "relative"
    courses.style.visibility = "visible";
});

// content appear
document.getElementById("contentClick").addEventListener("click", function(){
    enableBodyScroll()
    account.style.visibility = "hidden";
    account.style.position = "absolute";
    courses.style.visibility = "hidden";
    courses.style.position = "absolute";
    password.style.visibility = "hidden";
    password.style.position = "absolute";

    content.style.position = "relative";
    content.style.visibility = "visible";
});


// password appear
document.getElementById("passwordClick").addEventListener("click", function(){
    disableBodyScroll();

    account.style.visibility = "hidden";
    account.style.position = "absolute";
    courses.style.visibility = "hidden";
    courses.style.position = "absolute"; 
    content.style.position = "hidden";
    content.style.visibility = "absolute";

    password.style.position = "relative"
    password.style.visibility = "visible";
});
