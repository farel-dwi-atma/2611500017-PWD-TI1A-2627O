document.documentElement.classList.add("js");

const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

function setNavigationOpen(isOpen, restoreFocus = false) {
    navMenu.classList.toggle("nav-open", isOpen);
    navToggle.setAttribute("aria-expanded", isOpen);
    navToggle.setAttribute("aria-label", isOpen ? "Tutup navigasi" : "Buka navigasi");
    navToggle.textContent = isOpen ? "Tutup" : "Menu";

    if (restoreFocus) {
        navToggle.focus();
    }
}

navToggle.addEventListener("click", () => {
    const isOpen = navMenu.classList.toggle("nav-open");
    navToggle.setAttribute("aria-expanded", isOpen);
    navToggle.setAttribute("aria-label", isOpen ? "Tutup navigasi" : "Buka navigasi");
    navToggle.textContent = isOpen ? "Tutup" : "Menu";
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

const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");
const namaInput = document.getElementById("nama");
const emailInput = document.getElementById("email");
const semesterInput = document.getElementById("semester");
const tanggalInput = document.getElementById("tanggal");
const prodiInput = document.getElementById("prodi");
const pesanInput = document.getElementById("pesan");

contactForm.addEventListener("submit", (event) => {
    event.preventDefault();
    formFeedback.className = "form-feedback-error";

    const nama = namaInput.value.trim();
    if (nama.length < 3 || nama.length > 50) {
        formFeedback.textContent = "Nama lengkap harus diisi 3 sampai 50 karakter.";
        return;
    }

    const email = emailInput.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        formFeedback.textContent = "Masukkan alamat email yang valid.";
        return;
    }

    const semester = Number(semesterInput.value);
    if (semesterInput.value === "" || semester < 1 || semester > 14) {
        formFeedback.textContent = "Semester harus diisi dengan angka 1 sampai 14.";
        return;
    }

    const tanggal = tanggalInput.value;
    if (tanggal === "") {
        formFeedback.textContent = "Tanggal kunjungan harus diisi.";
        return;
    }

    const jenisPesan = document.querySelector('input[name="jenis_pesan"]:checked');
    if (!jenisPesan) {
        formFeedback.textContent = "Pilih jenis pesan.";
        return;
    }

    const topikDipilih = document.querySelectorAll('input[name="minat"]:checked');
    if (topikDipilih.length === 0) {
        formFeedback.textContent = "Pilih minimal satu topik yang diminati.";
        return;
    }

    const prodi = prodiInput.value;
    if (prodi === "") {
        formFeedback.textContent = "Pilih program studi.";
        return;
    }

    const pesan = pesanInput.value.trim();
    if (pesan.length === 0) {
        formFeedback.textContent = "Pesan harus diisi.";
        return;
    }

    if (pesan.length > 300) {
        formFeedback.textContent = "Pesan maksimal 300 karakter.";
        return;
    }

    formFeedback.textContent = "Form berhasil divalidasi.";
    formFeedback.className = "form-feedback-success";
});

contactForm.addEventListener("reset", () => {
    formFeedback.textContent = "";
    formFeedback.className = "form-feedback";
});

contactForm.addEventListener("input", () => {
    formFeedback.textContent = "";
    formFeedback.className = "form-feedback";
});