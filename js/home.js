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

var cal = document.getElementById("calendarBig");
var quiz = document.getElementById("quizBig");
var home = document.getElementById("overview");
var grades = document.getElementById("gradesBig");

// makes home appear 
document.getElementById("homeClick").addEventListener("click", function(){
  disableBodyScroll();
  cal.style.visibility = "hidden";
  quiz.style.visibility = "hidden";
  grades.style.visibility = "hidden";

  let allClickLinks = document.getElementById("active");
  allClickLinks.removeAttribute("id");

  document.getElementById("homeClick").parentElement.setAttribute("id", "active");
  home.style.visibility = "visible";
});

// makes quiz Appear
document.getElementById("quizClick").addEventListener("click", function(){
  enableBodyScroll();
  home.style.visibility = "hidden";
  cal.style.visibility = "hidden";
  grades.style.visibility = "hidden";


  let allClickLinks = document.getElementById("active");
  allClickLinks.removeAttribute("id");

  document.getElementById("quizClick").parentElement.setAttribute("id", "active");
  quiz.style.visibility = "visible";
});

// Makes cal appear
document.getElementById("timeClick").addEventListener("click", function(){
  disableBodyScroll();
  home.style.visibility = "hidden";
  quiz.style.visibility = "hidden";
  grades.style.visibility = "hidden";

  let allClickLinks = document.getElementById("active");
  allClickLinks.removeAttribute("id");

  document.getElementById("timeClick").parentElement.setAttribute("id", "active");
  cal.style.visibility = "visible";
});


// Makes grades appear
document.getElementById("gradesClick").addEventListener("click", function(){
  enableBodyScroll();
  home.style.visibility = "hidden";
  cal.style.visibility = "hidden";
  quiz.style.visibility = "hidden";

  let allClickLinks = document.getElementById("active");
  allClickLinks.removeAttribute("id");

  document.getElementById("gradesClick").parentElement.setAttribute("id", "active");
  grades.style.visibility = "visible";
});
