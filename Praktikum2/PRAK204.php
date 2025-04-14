<!DOCTYPE html>
<html>
<head>
  <title>Konversi Bilangan</title>
</head>
<body>
  Nilai : <input type="text" id="nilai">
  <button onclick="konversi()">Konversi</button>
  <h2 id="hasil">Hasil:</h2>

  <script>
    function konversi() {
      let input = parseInt(document.getElementById("nilai").value);
      let hasil = "";

      if (input < 0 || input >= 1000) {
        hasil = "Anda Menginput Melebihi Limit Bilangan";
      } else if (input === 0) {
        hasil = "Nol";
      } else if (input >= 1 && input <= 9) {
        hasil = "Satuan";
      } else if (input >= 10 && input <= 19) {
        hasil = "Belasan";
      } else if (input >= 20 && input <= 99) {
        hasil = "Puluhan";
      } else if (input >= 100 && input <= 999) {
        hasil = "Ratusan";
      }

      document.getElementById("hasil").innerHTML = "Hasil: " + hasil;
    }
  </script>
</body>
</html>
