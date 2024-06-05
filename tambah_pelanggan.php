
<?php
if(isset($_POST["nama_pelanggan"])) {
    $nama = $_POST["nama_pelanggan"];
    $alamat = $_POST["alamat"]; // Changed from Alamat
    $no_telepon = $_POST["no_telepon"]; // Changed from No_Telepon

    // Assuming $config is your database connection
    $query = mysqli_query($config, "INSERT INTO kasir_pelanggan(nama_pelanggan, Alamat, NomorTelpon) VALUES ('$nama','$alamat','$no_telepon')");

    if($query) {
        echo '<script>alert("Tambah data berhasil")</script>';
    } else {
        echo '<script>alert("Tambah data gagal")</script>'; // Added missing closing parenthesis
    }
}
?>
<div class="container-fluid">
<h1 class="mt-4">Pelanggan</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Pelanggan</li>
</ol>
<a href="?page=pelanggan" class="btn btn-danger" >back</a>
<hr>
<form method="post">
    <table class="table table-bordered">
        <tr>
            <td width="200">Nama Pelanggan</td>
            <td width="1">:</td>
            <td><input class="form-control" type="text" name="nama_pelanggan"></td>
        </tr>
        <tr>
            <td width="200">Alamat</td>
            <td width="1">:</td>
            <td>
            <textarea name="alamat" rows="5" class="form-control"></textarea>
            </td>
        </tr>
        <tr>
            <td width="200">No tlp</td>
            <td width="1">:</td>
            <td>
            <input name="no_telepon" type="number" step="0" class="form-control"></input>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="submit" class="btn btn-danger">Reset</button>
            </td>
        </tr>
    </table>
</form>
</div>