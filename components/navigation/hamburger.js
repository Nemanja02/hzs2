function toggleBurger() {
  var burger = document.getElementById("burger");

  if (burger.classList.contains("is-active")) {
    burger.classList.remove("is-active");
  } else burger.classList.add("is-active");

  var burger = document.getElementById("nav");

  if (burger.classList.contains("is-active")) {
    burger.classList.remove("is-active");
  } else burger.classList.add("is-active");
}
