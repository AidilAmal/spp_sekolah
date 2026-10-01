<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin();

include_once __DIR__ . "/../config/koneksi.php";


if(isset($_POST['simpan'])){


$nisn=$_POST['nisn'];
$nis=$_POST['nis'];
$nama=$_POST['nama'];
$id_kelas=$_POST['id_kelas'];
$alamat=$_POST['alamat'];
$no_telp=$_POST['no_telp'];
$id_spp=$_POST['id_spp'];



// Ambil nama_kelas dari id_kelas yang dipilih
$kelas_dipilih = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT nama_kelas FROM tb_kelas WHERE id_kelas='$id_kelas'"));
$nama_kelas_val = $kelas_dipilih ? $kelas_dipilih['nama_kelas'] : '';

mysqli_query($koneksi,

"INSERT INTO tb_siswa VALUES(
'$nisn',
'$nis',
'$nama',
'$id_kelas',
'$nama_kelas_val',
'$alamat',
'$no_telp',
'$id_spp'
)"

);


header("location:index.php");


}


$kelas=mysqli_query($koneksi,
"SELECT * FROM tb_kelas");


$spp=mysqli_query($koneksi,
"SELECT * FROM tb_spp");


?>


<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin(); include "../template/header.php"; ?>
<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin(); include "../template/sidebar.php"; ?>


<div class="content">


<h2>
Tambah Data Siswa
</h2>


<div class="box">


<form method="POST">


<div class="mb-3">

<label>NISN</label>

<input type="text"
name="nisn"
class="form-control">

</div>



<div class="mb-3">

<label>NIS</label>

<input type="text"
name="nis"
class="form-control">

</div>



<div class="mb-3">

<label>Nama Siswa</label>

<input type="text"
name="nama"
class="form-control">

</div>



<div class="mb-3">

<label>Kelas</label>

<select name="id_kelas"
class="form-control">


<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin(); while($k=mysqli_fetch_assoc($kelas)){ ?>


<option value="<?= $k['id_kelas'] ?>">

<?= $k['nama_kelas'] ?>

</option>


<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin(); } ?>


</select>


</div>




<div class="mb-3">

<label>Alamat</label>

<textarea name="alamat"
class="form-control"></textarea>

</div>



<div class="mb-3">

<label>No Telepon</label>

<input type="text"
name="no_telp"
class="form-control">

</div>



<div class="mb-3">

<label>SPP</label>

<select name="id_spp"
class="form-control">


<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin(); while($s=mysqli_fetch_assoc($spp)){ ?>


<option value="<?= $s['id_spp'] ?>">

<?= $s['tahun']." - ".$s['nominal'] ?>

</option>


<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin(); } ?>


</select>

</div>



<button name="simpan"
class="btn btn-success">

Simpan

</button>


<a href="index.php"
class="btn btn-secondary">

Kembali

</a>


</form>


</div>


</div>