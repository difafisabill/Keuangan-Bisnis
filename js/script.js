// Meminta user untuk memasukkan nama
let name = prompt("Masukkan nama Anda:");

// Menampilkan pesan selamat datang dengan nama yang dimasukkan user
let welcomeMessage = `Selamat datang, ${name}!`;
alert(welcomeMessage);

// Menampilkan nama user di halaman dashboard
let adminName = document.querySelector('.admin_name');
adminName.textContent = name;

sidebarButton.addEventListener("click", () => {
  sidebar.classList.toggle("active");
});

