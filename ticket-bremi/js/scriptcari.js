// Pencarian
const tombolCari = document.querySelector(".tombol-cari");
const keyword = document.querySelector(".input-cari");
const container = document.querySelector(".container");

// hilangkan tombol cari

tombolCari.style.display = "none";

// event ketika keyword di isi
keyword.addEventListener("keyup", function () {
  //   cara ajax lama
  //   const xhr = new XMLHttpRequest();
  //   xhr.onreadystatechange = function () {
  //     if (xhr.readyState == 4 && xhr.status == 200) {
  //       //   console.log(xhr.responseText);
  //       container.innerHTML = xhr.responseText;
  //     }
  //   };
  //   xhr.open("get", "ajax/ajax_cari.php?keyword=" + keyword.value);
  //   xhr.send();

  //   ajax fetch
  fetch("ajax/ajax_cari.php?keyword=" + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));
});
