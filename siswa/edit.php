<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin();

include_once __DIR__ . "/../config/koneksi.php";


$nisn=$_GET['nisn'];


$data=mysqli_query($koneksi,

"SELECT * FROM tb_siswa
WHERE nisn='$nisn'");


$siswa=mysqli_fetch_assoc($data);



if(isset($_POST['update'])){


mysqli_query($koneksi,

"UPDATE tb_siswa SET

nis='$_POST[nis]',
nama='$_POST[nama]',
alamat='$_POST[alamat]',
no_telp='$_POST[no_telp]'

WHERE nisn='$nisn'

");


header("location:index.php");


}


?>


<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin(); include "../template/header.php"; ?>
<?php
include_once __DIR__ . '/../config/auth.php';
cekAdmin(); include "../template/sidebar.php"; ?>


<div class="content">


<h2>
Edit Data Siswa
</h2>


<div class="box">


<form method="POST">


<div class="mb-3">

<label>NIS</label>

<input class="form-control"
name="nis"
value="<?= $siswa['nis'] ?>">

</div>


<div class="mb-3">

<label>Nama</label>

<input class="form-control"
name="nama"
value="<?= $siswa['nama'] ?>">

</div>


<div class="mb-3">

<label>Alamat</label>

<textarea name="alamat" class="form-control"><?= $siswa['alamat'] ?></textarea>

</div>



<div class="mb-3">

<label>No Telepon</label>

<input class="form-control"
name="no_telp"
value="<?= $siswa['no_telp'] ?>">

</div>



<button name="update"
class="btn btn-warning">

Update

</button>

<a href="index.php" class="btn btn-secondary">Kembali</a>


</form>


</div>


</div>