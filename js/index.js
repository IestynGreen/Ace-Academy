
var itemBut = document.querySelectorAll('.buttonID');

function disableBodyScroll(){
    const element = document.querySelector("#appBody");
    element.classList.add("stopScroll");
}
   
function enableBodyScroll(){
    const element = document.querySelector("#appBody");
    element.classList.remove("stopScroll");
}

document.getElementById("xSymbol").addEventListener("click", function(){
    document.getElementById("loginOverlay").style.visibility = "hidden";
    document.getElementById("loginOverlay").style.position = "fixed ";

    document.getElementById("signUp").style.visibility = "hidden";
    document.getElementById("signUp").style.position = "absolute";
    document.getElementById("login").style.visibility = "hidden";
    document.getElementById("login").style.position = "absolute";

    document.getElementById("letsChat").style.visibility = "visible";
    enableBodyScroll()
});

document.getElementById("signUpLoad").addEventListener("click", function(){
    document.getElementById("login").style.visibility = "hidden";
    document.getElementById("login").style.position = "absolute";

    document.getElementById("signUp").style.visibility = "visible";
    document.getElementById("signUp").style.position = "absolute";

});


document.getElementById("loginLoad").addEventListener("click", function(){
    document.getElementById("login").style.visibility = "visible";
    document.getElementById("login").style.position = "sticky";

    document.getElementById("signUp").style.visibility = "hidden";
    document.getElementById("signUp").style.position = "absolute";
});

document.getElementById("topBarLogin").addEventListener("click", function(){
    document.getElementById("loginOverlay").style.visibility = "visible";


    document.getElementById("login").style.position = "fixed";
    document.getElementById("login").style.visibility = "visible";
    document.getElementById("login").style.position = "absolute";

    disableBodyScroll()
});



var course = document.getElementById("courseSelect");

document.getElementById("typeSelect").addEventListener('change', function () {
    var style = this.value == "Tutor" ? 'none' : 'block';
    document.getElementById('courseSelect').style.display = style;
    document.getElementById("course1").checked = false;
    document.getElementById("course2").checked = false;
});


