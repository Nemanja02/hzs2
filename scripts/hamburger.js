function toggleBurger() {
  var burger = document.getElementById("burger");
  var nav = document.getElementById("nav");

  if (burger.classList.contains("is-active")) {
    burger.classList.remove("is-active");
    nav.classList.remove("is-active");
  } else {
    burger.classList.add("is-active");
    nav.classList.add("is-active");
  }
}
