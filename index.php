<?php
// Definisi class Orang, yang berfungsi sebagai dasar
class Orang {
    protected $nama;
    protected $usia;

    // Constructor untuk menginisialisasi nama dan usia
    public function __construct($nama, $usia) {
        $this->nama = $nama;
        $this->usia = $usia;
    }

    // Metode info() untuk memberikan informasi tentang objek Orang
    public function info() {
        return "<tr><td>Nama</td><td>$this->nama</td></tr><tr><td>Usia</td><td>$this->usia</td></tr>";
    }
}

// Definisi kelas Mahasiswa, turunan dari kelas Orang
class Mahasiswa extends Orang {
    protected $id_mahasiswa;

    // Constructor untuk menginisialisasi nama, usia, dan ID mahasiswa
    public function __construct($nama, $usia, $id_mahasiswa) {
        parent::__construct($nama, $usia);
        $this->id_mahasiswa = $id_mahasiswa;
    }

    // Metode info() untuk memberikan informasi tentang objek Mahasiswa
    // Override metode info() dari kelas Orang
    public function info() {
        return parent::info() . "<tr><td>ID Mahasiswa</td><td>$this->id_mahasiswa</td></tr>";
    }

    // Metode berkonsultasi() untuk simulasi konsultasi dengan Dosen Wali
    public function berkonsultasi($dosen_wali) {
        return "<tr><td colspan='2'>$this->nama sedang berkonsultasi dengan Dosen Wali {$dosen_wali->nama}</td></tr>";
    }
}

// Definisi class DosenWali
class DosenWali extends Orang {
    protected $id_dosen_wali;

    // Constructor untuk menginisialisasi nama, usia, dan ID dosen wali
    public function __construct($nama, $usia, $id_dosen_wali) {
        parent::__construct($nama, $usia);
        $this->id_dosen_wali = $id_dosen_wali;
    }

    // Metode info() untuk memberikan informasi tentang objek Dosen Wali
    public function info() {
        return parent::info() . "<tr><td>ID Dosen Wali</td><td>$this->id_dosen_wali</td></tr>";
    }

    // Metode proses_KRS() untuk simulasi proses pengurusan KRS mahasiswa
    public function proses_KRS($mahasiswa) {
        return "<tr><td colspan='2'>$this->nama sedang mengurus KRS untuk {$mahasiswa->nama}</td></tr>";
    }
}

// eksekusi:
$mahasiswa1 = new Mahasiswa("Dimas", 19, "210900102930");
$dosen_wali1 = new DosenWali("Bpk. Agus Syifa", 39, "D019210939343");

echo "<table border='1'>";
echo $mahasiswa1->info(); // Output: Nama: Dimas, Usia: 19, ID Mahasiswa: 210900102930
echo $dosen_wali1->info(); // Output: Nama: Bpk. Agus Syifa, Usia: 39, ID Dosen Wali: D019210939343
// Memanggil fungsi berkonsultasi() dan proses_KRS()
echo $mahasiswa1->berkonsultasi($dosen_wali1);
echo $dosen_wali1->proses_KRS($mahasiswa1);
echo "</table>";

echo "<br>"; // Tambahkan spasi antara data

$mahasiswa2 = new Mahasiswa("Budi", 21, "210900102931");
$dosen_wali2 = new DosenWali("Bu Fifi", 45, "D019210939344");

echo "<table border='1'>";
echo $mahasiswa2->info(); // Output: Nama: Budi, Usia: 21, ID Mahasiswa: 210900102931
echo $dosen_wali2->info(); // Output: Nama: Bu Fifi, Usia: 45, ID Dosen Wali: D019210939344
// Memanggil fungsi berkonsultasi() dan proses_KRS()
echo $mahasiswa2->berkonsultasi($dosen_wali2);
echo $dosen_wali2->proses_KRS($mahasiswa2);
echo "</table>";
?>
