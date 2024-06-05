<?php
if(isset($_POST["NamaProduk"])) {
    $nama = $_POST["NamaProduk"];
    $harga = $_POST["Harga"]; 
    $stok = $_POST["Stok"]; 

    // Assuming $config is your database connection
    $query = mysqli_query($config, "INSERT INTO kasir_produk(NamaProduk, Harga, Stok) VALUES ('$nama','$harga','$stok')");

    if($query) {
        echo '<script>alert("Tambah data berhasil")</script>';
    } else {
        echo '<script>alert("Tambah data gagal")</script>'; 
    }
}
?>
<div class="container-fluid">
<h1 class="mt-4">Produk</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Produk</li>
</ol>
<a href="?page=produk" class="btn btn-danger" >back</a>
<hr>
<form method="post">
    <table class="table table-bordered">
        <tr>
            <td width="200">Nama Produk</td>
            <td width="1">:</td>
            <td><input class="form-control" type="text" name="NamaProduk"></td>
        </tr>
        <tr>
            <td width="200">Harga</td>
            <td width="1">:</td>
            <td>
            <textarea name="Harga" rows="5" class="form-control"></textarea>
            </td>
        </tr>
        <tr>
            <td width="200">Stok</td>
            <td width="1">:</td>
            <td>
            <input name="Stok" type="number" step="0" class="form-control"></input>
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