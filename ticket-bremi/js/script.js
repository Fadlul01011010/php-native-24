const jumlahPengunjung = document.querySelector(".jumlah-pengunjung");
const totalBayar = document.querySelector(".total-bayar");
let harga = 10000;

jumlahPengunjung.addEventListener("keyup", function () {
  const jml = jumlahPengunjung.value;
  //   if (jml == 0) {
  //     jumlahPengunjung.value = 1;
  //   } else {
  totalBayar.innerHTML = `<p>Rp. ${
    harga * parseInt(jumlahPengunjung.value)
  }</p>`;
  //   }
  //   console.log(parseInt(jumlahPengunjung.value));
});
