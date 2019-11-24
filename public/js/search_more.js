function toggleMore() {
    var more = document.getElementById("more");
  
    if (more.classList.contains("is-active")) {
      more.classList.remove("is-active");
    } else {
      more.classList.add("is-active");
    }
  }
  