<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Transaksi extends Controller
{
    public function index()
    {

        return view('transaksi');
    }

    public function transaksi2022()
    {
        $data = [
            ["menu" => "Nasi Goreng", "kategori" => "makanan"],
            ["menu" => "Mie Freno", "kategori" => "makanan"],
            ["menu" => "Nasi Teriyaki", "kategori" => "makanan"],
            ["menu" => "Nasi Ayam Katsu", "kategori" => "makanan"],
            ["menu" => "Nasi Goreng Mawut", "kategori" => "makanan"],
            ["menu" => "Teh Hijau", "kategori" => "minuman"],
            ["menu" => "Teh Lemon", "kategori" => "minuman"],
            ["menu" => "Teh", "kategori" => "minuman"],
            ["menu" => "Kopi Hitam", "kategori" => "minuman"],
            ["menu" => "Kopi Susu", "kategori" => "minuman"],

        ];

        $transaksi2022 = [
            [
                ["tanggal" => "2022-01-01", "menu" => "Kopi Hitam", "total" => 3000],
                ["tanggal" => "2022-01-01", "menu" => "Nasi Teriyaki", "total" => 13000],
                ["tanggal" => "2022-01-01", "menu" => "Teh", "total" => 12000],
                ["tanggal" => "2022-01-01", "menu" => "Kopi Hitam", "total" => 3000],
                ["tanggal" => "2022-01-01", "menu" => "Kopi Hitam", "total" => 3000],
                ["tanggal" => "2022-01-01", "menu" => "Mie Freno", "total" => 20000],
                ["tanggal" => "2022-01-01", "menu" => "Nasi Goreng", "total" => 30000],
                ["tanggal" => "2022-01-01", "menu" => "Nasi Goreng Mawut", "total" => 26000],
                ["tanggal" => "2022-01-01", "menu" => "Nasi Teriyaki", "total" => 13000],
                ["tanggal" => "2022-01-01", "menu" => "Nasi Goreng", "total" => 10000],
                ["tanggal" => "2022-01-01", "menu" => "Nasi Teriyaki", "total" => 39000],
                ["tanggal" => "2022-01-01", "menu" => "Kopi Hitam", "total" => 3000]
            ]
        ];
        $makananData = array_filter($data, function ($item) {
            return $item['kategori'] == 'makanan';
        });
        $minumanData = array_filter($data, function ($item) {
            return $item['kategori'] == 'minuman';
        });

        $totalMenuPerBulan = [];

        foreach ($transaksi2022[0] as $transaksi) {
            $tanggal = $transaksi['tanggal'];
            $bulan = date('M', strtotime($tanggal)); // Mengambil bulan dari tanggal
            $menu = $transaksi['menu'];
            $total = $transaksi['total'];

            if (!isset($totalMenuPerBulan[$bulan][$menu])) {
                $totalMenuPerBulan[$bulan][$menu] = 0;
            }

            $totalMenuPerBulan[$bulan][$menu] += $total;
        }
        // fungsi array_reduce untuk menghitung total transaksi per bulan
        $totalPerBulan = array_reduce($transaksi2022, function ($carry, $item) {
            foreach ($item as $transaction) {
                $tanggal = $transaction['tanggal'];
                $total = $transaction['total'];
                $bulan = date('Y-m', strtotime($tanggal));

                if (isset($carry[$bulan])) {
                    $carry[$bulan] += $total;
                } else {
                    $carry[$bulan] = $total;
                }
            }
            return $carry;
            //  fungsi callback yang digunakan untuk menyimpan hasil akumulasi
        }, []);

        // Hasil dari adalah array total per bulan
        // print_r($totalPerBulan);


        return view('transaksi2022', compact('makananData', 'minumanData', 'totalPerBulan', 'totalMenuPerBulan'));
    }

    public function transaksi2021()
    {
        $data = [
            ["menu" => "Nasi Goreng", "kategori" => "makanan"],
            ["menu" => "Mie Freno", "kategori" => "makanan"],
            ["menu" => "Nasi Teriyaki", "kategori" => "makanan"],
            ["menu" => "Nasi Ayam Katsu", "kategori" => "makanan"],
            ["menu" => "Nasi Goreng Mawut", "kategori" => "makanan"],
            ["menu" => "Teh Hijau", "kategori" => "minuman"],
            ["menu" => "Teh Lemon", "kategori" => "minuman"],
            ["menu" => "Teh", "kategori" => "minuman"],
            ["menu" => "Kopi Hitam", "kategori" => "minuman"],
            ["menu" => "Kopi Susu", "kategori" => "minuman"],

        ];

        $makananData = array_filter($data, function ($item) {
            return $item['kategori'] == 'makanan';
        });
        $minumanData = array_filter($data, function ($item) {
            return $item['kategori'] == 'minuman';
        });
        return view('transaksi2021', compact('makananData', 'minumanData'));
    }
}



// [{"tanggal":"2021-01-01","menu":"Nasi Goreng","total":50000},{"tanggal":"2021-01-01","menu":"Teh Lemon","total":15000},{"tanggal":"2021-01-01","menu":"Teh Hijau","total":20000},{"tanggal":"2021-01-01","menu":"Mie Freno","total":10000},{"tanggal":"2021-01-01","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-01-01","menu":"Teh","total":3000},{"tanggal":"2021-01-01","menu":"Mie Freno","total":30000},{"tanggal":"2021-01-01","menu":"Kopi Susu","total":3000},{"tanggal":"2021-01-01","menu":"Kopi Hitam","total":12000},{"tanggal":"2021-01-01","menu":"Nasi Goreng Mawut","total":26000},{"tanggal":"2021-01-15","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-01-15","menu":"Teh Lemon","total":5000},{"tanggal":"2021-01-15","menu":"Teh Hijau","total":40000},{"tanggal":"2021-01-15","menu":"Teh","total":3000},{"tanggal":"2021-01-15","menu":"Nasi Ayam Katsu","total":40000},{"tanggal":"2021-01-15","menu":"Nasi Goreng","total":30000},{"tanggal":"2021-01-15","menu":"Kopi Susu","total":9000},{"tanggal":"2021-01-15","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-01-15","menu":"Nasi Teriyaki","total":13000},{"tanggal":"2021-01-15","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-01-31","menu":"Nasi Ayam Katsu","total":20000},{"tanggal":"2021-01-31","menu":"Teh Lemon","total":15000},{"tanggal":"2021-01-31","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-01-31","menu":"Teh Lemon","total":15000},{"tanggal":"2021-01-31","menu":"Nasi Goreng","total":30000},{"tanggal":"2021-01-31","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-01-31","menu":"Kopi Susu","total":18000},{"tanggal":"2021-01-31","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-02-01","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-02-01","menu":"Teh","total":30000},{"tanggal":"2021-02-01","menu":"Nasi Teriyaki","total":13000},{"tanggal":"2021-02-01","menu":"Mie Freno","total":20000},{"tanggal":"2021-02-01","menu":"Kopi Susu","total":21000},{"tanggal":"2021-02-01","menu":"Nasi Goreng","total":100000},{"tanggal":"2021-02-01","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-02-01","menu":"Teh Lemon","total":5000},{"tanggal":"2021-02-01","menu":"Nasi Goreng Mawut","total":39000},{"tanggal":"2021-02-01","menu":"Teh Lemon","total":10000},{"tanggal":"2021-02-01","menu":"Teh","total":6000},{"tanggal":"2021-02-15","menu":"Teh Hijau","total":50000},{"tanggal":"2021-02-15","menu":"Mie Freno","total":40000},{"tanggal":"2021-02-15","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-02-15","menu":"Teh Lemon","total":5000},{"tanggal":"2021-02-15","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-02-15","menu":"Kopi Susu","total":9000},{"tanggal":"2021-02-15","menu":"Nasi Teriyaki","total":26000},{"tanggal":"2021-02-15","menu":"Kopi Hitam","total":30000},{"tanggal":"2021-02-15","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-02-15","menu":"Kopi Hitam","total":12000},{"tanggal":"2021-02-28","menu":"Kopi Susu","total":3000},{"tanggal":"2021-02-28","menu":"Teh Lemon","total":25000},{"tanggal":"2021-02-28","menu":"Nasi Teriyaki","total":26000},{"tanggal":"2021-02-28","menu":"Kopi Susu","total":9000},{"tanggal":"2021-02-28","menu":"Teh Hijau","total":20000},{"tanggal":"2021-02-28","menu":"Teh","total":12000},{"tanggal":"2021-02-28","menu":"Teh","total":3000},{"tanggal":"2021-02-28","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-02-28","menu":"Teh Lemon","total":5000},{"tanggal":"2021-02-28","menu":"Nasi Goreng","total":40000},{"tanggal":"2021-03-01","menu":"Teh Lemon","total":10000},{"tanggal":"2021-03-01","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-03-01","menu":"Teh","total":9000},{"tanggal":"2021-03-01","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-03-01","menu":"Nasi Ayam Katsu","total":13000},{"tanggal":"2021-03-01","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-03-01","menu":"Teh Hijau","total":40000},{"tanggal":"2021-03-01","menu":"Teh","total":3000},{"tanggal":"2021-03-01","menu":"Nasi Teriyaki","total":26000},{"tanggal":"2021-03-01","menu":"Mie Freno","total":10000},{"tanggal":"2021-03-15","menu":"Kopi Hitam","total":9000},{"tanggal":"2021-03-15","menu":"Nasi Goreng","total":20000},{"tanggal":"2021-03-15","menu":"Teh","total":3000},{"tanggal":"2021-03-15","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-03-15","menu":"Nasi Teriyaki","total":13000},{"tanggal":"2021-03-31","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-03-31","menu":"Mie Freno","total":40000},{"tanggal":"2021-03-31","menu":"Teh Hijau","total":50000},{"tanggal":"2021-03-31","menu":"Teh","total":3000},{"tanggal":"2021-03-31","menu":"Kopi Susu","total":9000},{"tanggal":"2021-03-31","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-03-31","menu":"Nasi Goreng Mawut","total":39000},{"tanggal":"2021-04-01","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-04-01","menu":"Teh","total":3000},{"tanggal":"2021-04-01","menu":"Mie Freno","total":10000},{"tanggal":"2021-04-01","menu":"Nasi Teriyaki","total":13000},{"tanggal":"2021-04-01","menu":"Teh Hijau","total":10000},{"tanggal":"2021-04-01","menu":"Nasi Goreng","total":30000},{"tanggal":"2021-04-01","menu":"Teh Hijau","total":10000},{"tanggal":"2021-04-01","menu":"Mie Freno","total":10000},{"tanggal":"2021-04-01","menu":"Kopi Hitam","total":9000},{"tanggal":"2021-04-01","menu":"Nasi Goreng","total":20000},{"tanggal":"2021-04-01","menu":"Nasi Ayam Katsu","total":40000},{"tanggal":"2021-04-01","menu":"Kopi Susu","total":3000},{"tanggal":"2021-04-01","menu":"Nasi Ayam Katsu","total":30000},{"tanggal":"2021-04-15","menu":"Teh","total":9000},{"tanggal":"2021-04-15","menu":"Teh Lemon","total":5000},{"tanggal":"2021-04-15","menu":"Nasi Ayam Katsu","total":20000},{"tanggal":"2021-04-15","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-04-15","menu":"Teh","total":3000},{"tanggal":"2021-04-15","menu":"Kopi Susu","total":9000},{"tanggal":"2021-04-15","menu":"Kopi Hitam","total":12000},{"tanggal":"2021-04-15","menu":"Teh Hijau","total":50000},{"tanggal":"2021-04-15","menu":"Teh Hijau","total":20000},{"tanggal":"2021-04-15","menu":"Nasi Goreng","total":40000},{"tanggal":"2021-04-30","menu":"Teh","total":3000},{"tanggal":"2021-04-30","menu":"Mie Freno","total":50000},{"tanggal":"2021-04-30","menu":"Nasi Goreng Mawut","total":26000},{"tanggal":"2021-04-30","menu":"Teh Hijau","total":10000},{"tanggal":"2021-04-30","menu":"Teh Hijau","total":10000},{"tanggal":"2021-04-30","menu":"Teh Hijau","total":80000},{"tanggal":"2021-04-30","menu":"Kopi Hitam","total":12000},{"tanggal":"2021-04-30","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-04-30","menu":"Kopi Hitam","total":9000},{"tanggal":"2021-04-30","menu":"Kopi Hitam","total":6000},{"tanggal":"2021-04-30","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-04-30","menu":"Teh","total":3000},{"tanggal":"2021-05-01","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-05-01","menu":"Mie Freno","total":30000},{"tanggal":"2021-05-01","menu":"Teh","total":3000},{"tanggal":"2021-05-01","menu":"Nasi Teriyaki","total":13000},{"tanggal":"2021-05-01","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-05-01","menu":"Teh Lemon","total":10000},{"tanggal":"2021-05-15","menu":"Teh","total":3000},{"tanggal":"2021-05-15","menu":"Mie Freno","total":10000},{"tanggal":"2021-05-15","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-05-15","menu":"Teh","total":3000},{"tanggal":"2021-05-15","menu":"Teh Lemon","total":25000},{"tanggal":"2021-05-15","menu":"Nasi Teriyaki","total":30000},{"tanggal":"2021-05-15","menu":"Kopi Susu","total":3000},{"tanggal":"2021-05-15","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-05-15","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-05-15","menu":"Kopi Hitam","total":6000},{"tanggal":"2021-05-15","menu":"Kopi Susu","total":15000},{"tanggal":"2021-05-31","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-05-31","menu":"Teh Lemon","total":10000},{"tanggal":"2021-05-31","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-05-31","menu":"Teh Hijau","total":10000},{"tanggal":"2021-05-31","menu":"Kopi Susu","total":6000},{"tanggal":"2021-05-31","menu":"Teh","total":3000},{"tanggal":"2021-05-31","menu":"Nasi Goreng Mawut","total":26000},{"tanggal":"2021-05-31","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-06-01","menu":"Teh Lemon","total":50000},{"tanggal":"2021-06-01","menu":"Kopi Hitam","total":1000},{"tanggal":"2021-06-01","menu":"Nasi Teriyaki","total":13000},{"tanggal":"2021-06-01","menu":"Mie Freno","total":50000},{"tanggal":"2021-06-01","menu":"Teh Hijau","total":10000},{"tanggal":"2021-06-01","menu":"Kopi Susu","total":3000},{"tanggal":"2021-06-01","menu":"Nasi Goreng","total":5000},{"tanggal":"2021-06-01","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-06-01","menu":"Teh","total":3000},{"tanggal":"2021-06-15","menu":"Teh Hijau","total":10000},{"tanggal":"2021-06-15","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-06-15","menu":"Teh","total":30000},{"tanggal":"2021-06-15","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-06-15","menu":"Teh","total":3000},{"tanggal":"2021-06-15","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-06-15","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-06-15","menu":"Mie Freno","total":10000},{"tanggal":"2021-06-15","menu":"Teh Hijau","total":100000},{"tanggal":"2021-06-30","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-06-30","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-06-30","menu":"Kopi Susu","total":6000},{"tanggal":"2021-06-30","menu":"Nasi Goreng","total":40000},{"tanggal":"2021-06-30","menu":"Teh","total":3000},{"tanggal":"2021-06-30","menu":"Teh Hijau","total":10000},{"tanggal":"2021-06-30","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-06-30","menu":"Teh Hijau","total":20000},{"tanggal":"2021-06-30","menu":"Mie Freno","total":20000},{"tanggal":"2021-06-30","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-06-30","menu":"Teh","total":9000},{"tanggal":"2021-07-01","menu":"Teh","total":3000},{"tanggal":"2021-07-01","menu":"Kopi Susu","total":6000},{"tanggal":"2021-07-01","menu":"Teh Hijau","total":20000},{"tanggal":"2021-07-01","menu":"Nasi Teriyaki","total":13000},{"tanggal":"2021-07-01","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-07-01","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-07-01","menu":"Teh","total":15000},{"tanggal":"2021-07-01","menu":"Nasi Goreng Mawut","total":39000},{"tanggal":"2021-07-01","menu":"Teh Hijau","total":20000},{"tanggal":"2021-07-01","menu":"Kopi Susu","total":6000},{"tanggal":"2021-07-01","menu":"Teh Lemon","total":25000},{"tanggal":"2021-07-01","menu":"Nasi Ayam Katsu","total":50000},{"tanggal":"2021-07-01","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-07-01","menu":"Teh Lemon","total":5000},{"tanggal":"2021-08-01","menu":"Nasi Goreng Mawut","total":78000},{"tanggal":"2021-08-01","menu":"Teh Hijau","total":10000},{"tanggal":"2021-08-01","menu":"Teh Lemon","total":10000},{"tanggal":"2021-08-01","menu":"Teh","total":18000},{"tanggal":"2021-08-01","menu":"Nasi Ayam Katsu","total":100000},{"tanggal":"2021-08-01","menu":"Nasi Ayam Katsu","total":30000},{"tanggal":"2021-08-01","menu":"Nasi Goreng Mawut","total":26000},{"tanggal":"2021-08-01","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-08-01","menu":"Kopi Hitam","total":15000},{"tanggal":"2021-08-01","menu":"Teh","total":6000},{"tanggal":"2021-09-01","menu":"Kopi Susu","total":3000},{"tanggal":"2021-09-01","menu":"Teh","total":9000},{"tanggal":"2021-09-01","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-09-01","menu":"Nasi Goreng","total":40000},{"tanggal":"2021-09-01","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-09-01","menu":"Teh Hijau","total":10000},{"tanggal":"2021-09-01","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-09-01","menu":"Teh Hijau","total":30000},{"tanggal":"2021-09-01","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-09-01","menu":"Mie Freno","total":50000},{"tanggal":"2021-09-01","menu":"Mie Freno","total":10000},{"tanggal":"2021-09-01","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-09-01","menu":"Kopi Hitam","total":21000},{"tanggal":"2021-10-01","menu":"Nasi Ayam Katsu","total":30000},{"tanggal":"2021-10-01","menu":"Nasi Teriyaki","total":26000},{"tanggal":"2021-10-01","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-10-01","menu":"Teh Lemon","total":5000},{"tanggal":"2021-10-01","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-10-01","menu":"Teh","total":3000},{"tanggal":"2021-10-01","menu":"Teh","total":6000},{"tanggal":"2021-10-01","menu":"Mie Freno","total":40000},{"tanggal":"2021-10-01","menu":"Nasi Goreng Mawut","total":26000},{"tanggal":"2021-10-01","menu":"Nasi Goreng","total":10000},{"tanggal":"2021-11-01","menu":"Nasi Ayam Katsu","total":20000},{"tanggal":"2021-11-01","menu":"Teh Lemon","total":25000},{"tanggal":"2021-11-01","menu":"Kopi Hitam","total":15000},{"tanggal":"2021-11-01","menu":"Teh","total":3000},{"tanggal":"2021-11-01","menu":"Nasi Goreng","total":40000},{"tanggal":"2021-11-01","menu":"Teh Hijau","total":10000},{"tanggal":"2021-11-01","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-11-01","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-11-01","menu":"Teh Hijau","total":10000},{"tanggal":"2021-11-01","menu":"Kopi Susu","total":15000},{"tanggal":"2021-11-01","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-12-01","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-12-01","menu":"Teh","total":3000},{"tanggal":"2021-12-01","menu":"Nasi Goreng","total":30000},{"tanggal":"2021-12-01","menu":"Teh Hijau","total":30000},{"tanggal":"2021-12-01","menu":"Nasi Goreng Mawut","total":13000},{"tanggal":"2021-12-01","menu":"Kopi Susu","total":15000},{"tanggal":"2021-12-01","menu":"Kopi Hitam","total":3000},{"tanggal":"2021-12-01","menu":"Nasi Ayam Katsu","total":10000},{"tanggal":"2021-12-01","menu":"Teh","total":3000},{"tanggal":"2021-12-01","menu":"Nasi Ayam Katsu","total":10000}]