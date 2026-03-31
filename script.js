// menggunakan xmlhttrequest
let cari = document.getElementById("cari");
let hasil = document.getElementById("hasil");

cari.addEventListener("keyup", function () {
  let xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      hasil.innerHTML = xhr.responseText;
    }
  };
  xhr.open("GET", "hasilpencarian.php?keyword=" + cari.value, true);
  xhr.send();
});
