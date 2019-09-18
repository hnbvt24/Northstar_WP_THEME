// Look for .hamburger
var hamburger = document.querySelector(".hamburger");
var mainNav = document.querySelector(".sub-menu");
var body = document.querySelector("body");
// On click
hamburger.addEventListener("click", function() {
  // Toggle class "is-active"
  hamburger.classList.toggle("is-active");
  mainNav.classList.toggle("is-open");
  body.classList.toggle("noscroll");

});