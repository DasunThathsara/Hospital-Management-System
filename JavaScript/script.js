const header = document.querySelector("header");

/*----------------------- Sticky Navbar -----------------------*/

function stickyNavbar(){
    header.classList.toggle("scrolled", window.pageYOffset > 0);
}

stickyNavbar();
window.addEventListener("scroll", stickyNavbar)

/*----------------------- Reveal Animation -----------------------*/

let sr = ScrollReveal({
    duration: 2500, 
    distance: "60px",
});

sr.reveal(".anmd", { delay : 600 });
sr.reveal(".anmt", { origin : "top", delay : 700 });
sr.reveal(".anms", { origin : "top", delay : 200 });
sr.reveal(".anml", { origin : "left", delay : 700 });
