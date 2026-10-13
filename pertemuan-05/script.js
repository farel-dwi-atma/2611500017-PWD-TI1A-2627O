document.documentElement.classList.add("js");

const menuButton = document.querySelector(".nav-toggle");
const navigation = document.querySelector("#primary-navigation");
const form = document.querySelector("#contact-form");
const feedback = document.querySelector("#form-feedback");

function setMenuOpen(isOpen, restoreFocus = false) {
    navigation.classList.toggle("is-open", isOpen);
    menuButton.setAttribute("aria-expanded", String(isOpen));
    menuButton.textContent = isOpen ? "Tutup" : "Menu";

    if (restoreFocus) {
        menuButton.focus();
    }
}

menuButton.addEventListener("click", () => {
    const isOpen = menuButton.getAttribute("aria-expanded") === "true";
    setMenuOpen(!isOpen);
});

navigation.addEventListener("click", (event) => {
    if (event.target.closest("a")) {
        setMenuOpen(false);
    }
});

document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && menuButton.getAttribute("aria-expanded") === "true") {
        setMenuOpen(false, true);
    }
});

const desktopViewport = window.matchMedia("(min-width: 768px)");
desktopViewport.addEventListener("change", (event) => {
    if (event.matches) {
        setMenuOpen(false);
    }
});

const validationRules = [
    {
        control: document.querySelector("#nama"),
        error: document.querySelector("#nama-error"),
        focus: document.querySelector("#nama"),
        validate() {
            const value = this.control.value.trim();
            if (value.length === 0) return "Nama wajib diisi.";
            if (value.length < 3) return "Nama harus terdiri dari minimal 3 karakter.";
            if (value.length > 50) return "Nama tidak boleh lebih dari 50 karakter.";
            return "";
        }
    },
    {
        control: document.querySelector("#email"),
        error: document.querySelector("#email-error"),
        focus: document.querySelector("#email"),
        validate() {
            if (this.control.value.trim().length === 0) return "Email wajib diisi.";
            if (!this.control.validity.valid) return "Masukkan alamat email dengan format yang benar.";
            return "";
        }
    },
    {
        control: document.querySelector("#semester"),
        error: document.querySelector("#semester-error"),
        focus: document.querySelector("#semester"),
        validate() {
            const value = this.control.valueAsNumber;
            if (this.control.value === "") return "Semester wajib diisi.";
            if (!Number.isInteger(value) || value < 1 || value > 14) {
                return "Semester harus berupa bilangan bulat dari 1 sampai 14.";
            }
            return "";
        }
    },
    {
        control: document.querySelector("#tanggal"),
        error: document.querySelector("#tanggal-error"),
        focus: document.querySelector("#tanggal"),
        validate() {
            return this.control.value === "" ? "Tanggal kunjungan wajib diisi." : "";
        }
    },
    {
        control: document.querySelector("#jenis-pesan-group"),
        error: document.querySelector("#jenis-pesan-error"),
        focus: document.querySelector('input[name="jenis_pesan"]'),
        validate() {
            return form.querySelector('input[name="jenis_pesan"]:checked')
                ? ""
                : "Pilih salah satu jenis pesan.";
        }
    },
    {
        control: document.querySelector("#prodi"),
        error: document.querySelector("#prodi-error"),
        focus: document.querySelector("#prodi"),
        validate() {
            return this.control.value === "" ? "Program studi wajib dipilih." : "";
        }
    },
    {
        control: document.querySelector("#pesan"),
        error: document.querySelector("#pesan-error"),
        focus: document.querySelector("#pesan"),
        validate() {
            if (this.control.value.trim().length === 0) return "Pesan wajib diisi.";
            if (this.control.value.length > 300) return "Pesan tidak boleh lebih dari 300 karakter.";
            return "";
        }
    }
];

function validateForm() {
    const invalidRules = [];

    for (const rule of validationRules) {
        const message = rule.validate();
        rule.error.textContent = message;

        if (message) {
            rule.control.setAttribute("aria-invalid", "true");
            invalidRules.push(rule);
        } else {
            rule.control.removeAttribute("aria-invalid");
        }
    }

    return invalidRules;
}

let hasSubmitted = false;

form.addEventListener("submit", (event) => {
    event.preventDefault();
    hasSubmitted = true;
    const invalidRules = validateForm();

    if (invalidRules.length > 0) {
        feedback.textContent = "Periksa kembali isian yang ditandai.";
        feedback.className = "form-feedback is-error";
        invalidRules[0].focus.focus();
        return;
    }

    feedback.textContent = "Form berhasil divalidasi.";
    feedback.className = "form-feedback is-success";
});

form.addEventListener("input", updateValidationFeedback);
form.addEventListener("change", updateValidationFeedback);

function updateValidationFeedback() {
    if (!hasSubmitted) return;

    const invalidRules = validateForm();
    feedback.textContent = invalidRules.length === 0
        ? "Semua kolom memenuhi aturan. Tekan Kirim untuk validasi."
        : "Masih ada isian yang perlu diperbaiki.";
    feedback.className = invalidRules.length === 0
        ? "form-feedback is-success"
        : "form-feedback is-error";
}

form.addEventListener("reset", () => {
    window.requestAnimationFrame(() => {
        hasSubmitted = false;
        for (const rule of validationRules) {
            rule.error.textContent = "";
            rule.control.removeAttribute("aria-invalid");
        }
        feedback.textContent = "";
        feedback.className = "form-feedback";
    });
});