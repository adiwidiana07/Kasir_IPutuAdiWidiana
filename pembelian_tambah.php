<?php
if(isset($_POST["IDPelanggan"])) {
    $id_pelanggan = $_POST["IDPelanggan"];
    $produk = $_POST["produk"];
    $tanggal = date('Y/m/d');
    $total = 0;

    // Insert penjualan data
    $query_penjualan = mysqli_query($config, "INSERT INTO kasir_penjualan(tanggalpenjualan, totalharga, IDPelanggan) VALUES ('$tanggal', '$total', '$id_pelanggan')");

    // Check if the penjualan data insertion was successful
    if($query_penjualan) {
        // Get the last inserted penjualan ID
        $IdTerakhir = mysqli_query($config, "SELECT IDPenjualan FROM kasir_penjualan ORDER BY IDPenjualan DESC LIMIT 1");
        $row = mysqli_fetch_array($IdTerakhir);
        $id_penjualan = $row['IDPenjualan'];

        // Loop through each product
        foreach ($produk as $key => $val) {
            // Fetch product data from the database based on its ID
            $pr_query = mysqli_query($config, "SELECT * FROM kasir_produk WHERE IDProduk=$key");
            $pr = mysqli_fetch_array($pr_query);
            if($val>0){
            $sub = $val * $pr["Harga"];
            $total += $sub;
            // Insert detailpenjualan data
            $detail_query = mysqli_query($config, "INSERT INTO detailpenjualan(IDPenjualan, IDProduk, JumlahProduk, Subtotaldecimal) VALUES ('$id_penjualan', '$key', '$val','$sub')");
            }
            $updateproduk = mysqli_query($config,"UPDATE kasir_produk set Stok=Stok-$val WHERE IDProduk =$key");
        }
        // Update total harga in kasir_penjualan
        $update_query = mysqli_query($config, "UPDATE kasir_penjualan SET totalharga='$total' WHERE IDPenjualan='$id_penjualan'");
        if($update_query) {
            echo '<script>alert("Tambah data berhasil")</script>';
        } else {
            echo '<script>alert("Gagal mengupdate total harga penjualan")</script>';
        }
    } else {
        echo '<script>alert("Gagal menambahkan data penjualan")</script>';
    }
}
?>
<div class="container-fluid">
<h1 class="mt-4">Produk</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Pembelian</li>
</ol>
<a href="?page=pembelian" class="btn btn-danger" >back</a>
<hr>
<form method="post">
    <table class="table table-bordered">
        <tr>
            <td width="200">Nama Pelanggan</td>
            <td width="1">:</td>
            <td>
            <select class="form-control form-select" name="IDPelanggan" id="">
    <?php
    $p = mysqli_query($config, "SELECT * FROM kasir_pelanggan");
    while ($pel = mysqli_fetch_array($p)) {
        ?>
        <option value="<?php echo $pel['IDPelanggan']; ?>"><?php echo $pel['nama_pelanggan']; ?></option>
        <?php
    }
    ?>
</select>
            </td>
        </tr>
        <?php  $pro = mysqli_query($config, "SELECT * FROM kasir_produk");
    while ($produk = mysqli_fetch_array($pro)){
            ?>
        <tr>
            <td width="200"><?php echo $produk['NamaProduk'].'(Stok : '.$produk['Stok'].')'; ?></td>
            <td width="1">:</td>
            <td>
            <input type="number" name="produk[<?php echo $produk ['IDProduk']; ?>
            ]" step="0" value="0" max="<?php  echo $produk['Stok']; ?>" class="form-control">
            </td>
        </tr>
        <?php
            }
        ?>
    <tr>
    <td width="200">Tanggal Penjualan</td>
    <td width="1">:</td>
    <td>
    <input name="tanggalpenjualan" type="date" class="form-control"></input>
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