const PhoneInputWithFlags = (() => {
  function init({ containerId, placeholder = "Enter phone number", flags, defaultFlag }) {
    // Dapatkan elemen container berdasarkan ID
    const container = document.getElementById(containerId);

    if (!container) {
      console.error(`Container dengan ID "${containerId}" tidak ditemukan.`);
      return;
    }

    // Buat elemen div untuk input dengan bendera
    const inputContainer = document.createElement("div");
    inputContainer.className = "phone-input-container";

    // Tambahkan ikon bendera default
    const flagIcon = document.createElement("img");
    flagIcon.src = defaultFlag;
    flagIcon.alt = "Flag Icon";
    flagIcon.className = "flag-icon";
    
    // Tambahkan input teks
    const inputElement = document.createElement("input");
    inputElement.type = "text";
    inputElement.placeholder = placeholder;
    inputElement.className = "phone-number-input";

    // Fungsi untuk memperbarui bendera berdasarkan kode negara
    function updateFlag() {
      const value = inputElement.value.trim();
      let flagFound = false;
      for (const code in flags) {
        if (value.startsWith(code)) {
          flagIcon.src = flags[code];
          flagFound = true;
          break;
        }
      }
      // Gunakan bendera default jika kode negara tidak ditemukan
      if (!flagFound) {
        flagIcon.src = defaultFlag;
      }
    }

    // Tambahkan event listener untuk perubahan input
    inputElement.addEventListener("input", updateFlag);

    // Susun elemen
    inputContainer.appendChild(flagIcon);
    inputContainer.appendChild(inputElement);

    // Tambahkan ke dalam container yang sudah ada
    container.appendChild(inputContainer);
  }

  // Ekspor fungsi init
  return { init };
})();
