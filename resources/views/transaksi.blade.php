<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tes- Venturo Camp tahap 2</title>
  </head>
  <body>
    <h4 class="mb-4">Venturo - Laporan penjualan tahunan per menu</h4>
    <div class="container">
      <div class="row">
          <div class="row">
              <div class="col-2">
                  <select id="menuSelect" class="form-select" aria-label="Default select example">
                      <option selected>pilih menu</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                  </select>
              </div>
              <div class="col-2">
                  <a id="tampilkanButton" href="#" class="btn btn-primary">Tampilkan</a>
              </div>
          </div>
      </div>
  </div>
  
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
      $("#tampilkanButton").click(function (e) {
          e.preventDefault(); // Mencegah tindakan bawaan tombol
  
          // Mendapatkan nilai yang dipilih dalam dropdown
          var selectedOption = $("#menuSelect").val();
  
          // Membuat URL berdasarkan pilihan
          var url = "";
          if (selectedOption === "2021") {
              url = "{{ route('transaksi2021') }}";
          } else if (selectedOption === "2022") {
              url = "{{ route('transaksi2022') }}";
          } else {
              // Jika pilihan adalah "pilih menu," arahkan ke rute "transaksi"
              url = "{{ route('transaksi') }}";
          }
  
          // Mengarahkan ke URL yang sesuai
          window.location.href = url;
      });
  });
  </script>
  
</html>