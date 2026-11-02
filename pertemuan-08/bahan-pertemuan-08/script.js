// Navigasi responsif.
const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

if (navToggle && navMenu) {
  navToggle.addEventListener("click", () => {
    const isOpen = navMenu.classList.toggle("nav-open");
    navToggle.setAttribute("aria-expanded", String(isOpen));
    navToggle.setAttribute(
      "aria-label",
      isOpen ? "Tutup navigasi" : "Buka navigasi",
    );
  });
}

// Validasi formulir Rencana Kegiatan.
const activityForm = document.querySelector('form[data-validation="activity"]');

if (activityForm) {
  const activityFeedback = activityForm.querySelector("[data-activity-feedback]");
  const activityFields = [
    activityForm.elements.namedItem("nama_kegiatan"),
    activityForm.elements.namedItem("kategori_kegiatan"),
    activityForm.elements.namedItem("tanggal_pelaksanaan"),
    activityForm.elements.namedItem("lokasi_kegiatan"),
    activityForm.elements.namedItem("deskripsi_kegiatan"),
  ];

  activityForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const [nama, kategori, tanggal, lokasi, deskripsi] = activityFields;
    const errors = [];

    if (nama.value.trim().length < 3 || nama.value.trim().length > 100) {
      errors.push("Nama kegiatan harus berisi 3 sampai 100 karakter.");
    }
    if (!kategori.value) {
      errors.push("Pilih kategori kegiatan.");
    }
    if (!tanggal.value || !tanggal.validity.valid) {
      errors.push("Masukkan tanggal pelaksanaan yang valid.");
    }
    if (lokasi.value.trim().length < 2 || lokasi.value.trim().length > 100) {
      errors.push("Lokasi kegiatan harus berisi 2 sampai 100 karakter.");
    }
    if (deskripsi.value.trim().length < 10 || deskripsi.value.trim().length > 500) {
      errors.push("Deskripsi kegiatan harus berisi 10 sampai 500 karakter.");
    }

    if (errors.length > 0) {
      if (activityFeedback) {
        activityFeedback.textContent = errors.join(" ");
        activityFeedback.className = "form-feedback-error";
      }
      return;
    }

    HTMLFormElement.prototype.submit.call(activityForm);
  });

  activityForm.addEventListener("reset", () => {
    if (activityFeedback) {
      activityFeedback.textContent = "";
      activityFeedback.className = "form-feedback";
    }
  });

  activityForm.addEventListener("input", () => {
    if (activityFeedback) {
      activityFeedback.textContent = "";
      activityFeedback.className = "form-feedback";
    }
  });
}

// Validasi formulir Kontak.
// Selector menggunakan atribut/class, bukan ID formulir tertentu,
// sehingga formulir lain dapat ditambahkan dengan ID yang berbeda.
const contactForms = document.querySelectorAll(
  'form[data-validation="contact"]',
);

contactForms.forEach((contactForm) => {
  const formFeedback = contactForm.querySelector("[data-form-feedback]");

  const ambilInput = (nama) => contactForm.elements.namedItem(nama);

  contactForm.addEventListener("submit", (event) => {
    // Mencegah pengiriman otomatis sebelum seluruh validasi selesai.
    event.preventDefault();

    const namaInput = ambilInput("nama");
    const emailInput = ambilInput("email");
    const semesterInput = ambilInput("semester");
    const tanggalInput = ambilInput("tanggal");
    const prodiInput = ambilInput("prodi");
    const pesanInput = ambilInput("pesan");
    const jenisPesan = contactForm.querySelector(
      'input[name="jenis_pesan"]:checked',
    );
    const topikDipilih = contactForm.querySelectorAll(
      'input[name="minat[]"]:checked',
    );

    const nama = namaInput.value.trim();
    const email = emailInput.value.trim();
    const semester = Number(semesterInput.value);
    const tanggal = tanggalInput.value;
    const prodi = prodiInput.value;
    const pesan = pesanInput.value.trim();

    const tampilkanKesalahan = (pesanKesalahan) => {
      if (formFeedback) {
        formFeedback.textContent = pesanKesalahan;
        formFeedback.className = "form-feedback-error";
      }
    };

    if (formFeedback) {
      formFeedback.textContent = "";
      formFeedback.className = "form-feedback";
    }

    if (nama.length < 3 || nama.length > 50) {
      tampilkanKesalahan("Nama lengkap harus diisi 3 sampai 50 karakter.");
      return;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      tampilkanKesalahan("Masukkan alamat email yang valid.");
      return;
    }

    if (
      semesterInput.value.trim() === "" ||
      !Number.isInteger(semester) ||
      semester < 1 ||
      semester > 14
    ) {
      tampilkanKesalahan("Semester harus diisi dengan angka 1 sampai 14.");
      return;
    }

    if (tanggal === "") {
      tampilkanKesalahan("Tanggal kunjungan harus diisi.");
      return;
    }

    if (!jenisPesan) {
      tampilkanKesalahan("Pilih jenis pesan.");
      return;
    }

    if (topikDipilih.length === 0) {
      tampilkanKesalahan("Pilih minimal satu topik yang diminati.");
      return;
    }

    if (prodi === "") {
      tampilkanKesalahan("Pilih program studi.");
      return;
    }

    if (pesan.length === 0 || pesan.length > 300) {
      tampilkanKesalahan("Pesan harus diisi dan maksimal 300 karakter.");
      return;
    }

    // Mengirim formulir setelah seluruh validasi JavaScript berhasil.
    // HTMLFormElement.submit() tidak memicu event submit kembali.
    contactForm.submit();
  });

  contactForm.addEventListener("reset", () => {
    if (formFeedback) {
      formFeedback.textContent = "";
      formFeedback.className = "form-feedback";
    }
  });

  contactForm.addEventListener("input", () => {
    if (formFeedback) {
      formFeedback.textContent = "";
      formFeedback.className = "form-feedback";
    }
  });
});
