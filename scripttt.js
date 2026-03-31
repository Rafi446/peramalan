let cari = document.getElementById("cari");
let hasil = document.getElementById("hasil");

cari.addEventListener("keyup", function () {
  let keyword = cari.value;
  fetch("hasilpencarian.php?keyword=" + keyword)
    .then((response) => response.text())
    .then((data) => {
      hasil.innerHTML = data;
    });
});
