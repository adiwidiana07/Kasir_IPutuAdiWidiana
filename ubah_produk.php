<?php
$id = $_GET['id'];
if(isset($_POST["NamaProduk"])) {
    $nama = $_POST["NamaProduk"];
    $harga = $_POST["Harga"]; 
    $stok = $_POST["Stok"]; 

    // Assuming $config is your database connection
    $query = mysqli_query($config, "UPDATE kasir_produk SET NamaProduk='$nama', Harga='$harga', Stok='$stok' WHERE IDProduk=$id");

    if($query) {
        echo '<script>alert("Update data berhasil")</script>';
    } else {
        echo '<script>alert("Update data gagal")</script>'; 
    }
}
$query = mysqli_query($config, "SELECT * FROM kasir_produk WHERE IDProduk=$id");
$data = mysqli_fetch_array($query);
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
            <td><input class="form-control" type="text" value="<?php echo  $data['NamaProduk']?>" name="NamaProduk"></td>
        </tr>
        <tr>
            <td width="200">Harga</td>
            <td width="1">:</td>
            <td><input class="form-control" type="text" value="<?php echo  $data['Harga']?>" name="Harga"></td>
        </tr>
        <tr>
            <td width="200">Stok</td>
            <td width="1">:</td>
            <td><input name="Stok" type="number" value="<?php echo  $data['Stok']?>" step="1" class="form-control"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="" class="btn btn-danger">satu</button>
            </td>
        </tr>
    </table>
</form>
</div>
