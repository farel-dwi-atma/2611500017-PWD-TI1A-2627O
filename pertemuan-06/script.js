document.documentElement.classList.add("js");

const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

function setNavigationOpen(isOpen, restoreFocus = false) {
    navMenu.classList.toggle("nav-open", isOpen);
    navToggle.setAttribute("aria-expanded", isOpen);
    navToggle.setAttribute("aria-label", isOpen ? "Tutup navigasi" : "Buka navigasi");

    if (restoreFocus) {
        navToggle.focus();
    }
}

navToggle.addEventListener("click", () => {
    const isOpen = navToggle.getAttribute("aria-expanded") !== "true";
    setNavigationOpen(isOpen);
});

navMenu.addEventListener("click", (event) => {
    if (event.target.closest("a")) {
        setNavigationOpen(false);
    }
});

document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && navToggle.getAttribute("aria-expanded") === "true") {
        setNavigationOpen(false, true);
    }
});

window.matchMedia("(min-width: 768px)").addEventListener("change", (event) => {
    if (event.matches) {
        setNavigationOpen(false);
    }
});