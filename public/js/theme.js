function themeLoad() {
  if (window.name === "") {
    window.name = "dark";
  }

  if (window.name === "dark") {
    document.body.classList.add("dark");
  } else {
    document.body.classList.add("light");
  }
}

function changeTheme() {
  if (document.body.classList.contains("dark")) {
    window.name = "light";
    document.body.classList.remove("dark");
    document.body.classList.add("light");
  } else {
    window.name = "dark";
    document.body.classList.remove("light");
    document.body.classList.add("dark");
  }
}
