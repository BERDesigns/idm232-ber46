var tabletMode = window.matchMedia("(min-width: 768px) and (max-width: 1279px)");

document.getElementById("main-pg").style.minHeight = (window.innerHeight - document.getElementById("navbar-header").getBoundingClientRect().height - document.getElementById("navbar-header").getBoundingClientRect().height) + "px";
