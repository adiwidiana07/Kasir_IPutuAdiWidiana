<?php
$d = $_GET['id'];
$query = mysqli_query($config, "SELECT * FROM kasir_penjualan LEFT JOIN kasir_pelanggan ON kasir_pelanggan.IDPelanggan = kasir_penjualan.IDPelanggan WHERE IDPenjualan=$d");
$data = mysqli_fetch_array($query);
?>
<div class="container-fluid">
    <h1 class="mt-4">Detail Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>
    <a href="?page=pembelian" class="btn btn-danger">back</a>
    <hr>
    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td>
                    <?php echo $data['nama_pelanggan']; ?>
                </td>
            </tr>
            <?php  
            $pro = mysqli_query($config, "SELECT * FROM detailpenjualan LEFT JOIN kasir_produk ON kasir_produk.IDProduk = detailpenjualan.IDProduk WHERE IDPenjualan=$d");
            while ($produk = mysqli_fetch_array($pro)) {
            ?>
                <tr>
                    <td width="200"><?php echo $produk['NamaProduk']; ?></td>
                    <td width="1">:</td>
                    <td>Harga:<?php echo $produk['Harga'] ?></td><br>
                    <td>Sub Total:<?php echo $produk['Subtotaldecimal'] ?></td><br>
                    <td>Jumlah:<?php echo $produk['JumlahProduk'] ?></td><br>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td><?php echo $data['totalharga'] ?></td>
            </tr>
        </table>
    </form>
</div>
