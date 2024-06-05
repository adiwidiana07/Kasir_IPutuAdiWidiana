<div class="container-fluid">
    <h1 class="mt-4">Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pelanggan</li>
    </ol>
    <a href="?page=pembelian_tambah" class="btn btn-primary">Tambah Peserta</a>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal Pembelian</th>
            <th>Pelanggan</th>
            <th>Total harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($config, "SELECT * FROM kasir_penjualan LEFT JOIN kasir_pelanggan ON kasir_pelanggan.IDPelanggan = kasir_penjualan.IDPelanggan");
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>" . $data['tanggalpenjualan'] . "</td>";
            echo "<td>" . $data['nama_pelanggan'] . "</td>";
            echo "<td>" . $data['totalharga'] . "</td>";
            echo "<td>
            <a href=\"?page=detail_penjualan&&id=" . $data['IDPenjualan'] . "\" class=\"btn btn-secondary\">Detail</a>
            <a href=\"?page=hapus_penjualan&&id=" . $data['IDPenjualan'] . "\" class=\"btn btn-danger\">Hapus</a>
          </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
