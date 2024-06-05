<div class="container-fluid">
<h1 class="mt-4">Pelanggan</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Pelanggan</li>
</ol>
<a href="?page=produk_tambah" class="btn btn-primary" >Tambah Peserta</a>
<table class="table table-bordered">
<tr>
<th>Nama Produk</th>
<th>Harga</th>
<th>Stok</th>
</tr>
<?php
$query = mysqli_query($config, "SELECT * FROM kasir_produk");
while($data = mysqli_fetch_array($query)){
    echo "<tr>";
    echo "<td>".$data['NamaProduk']."</td>";
    echo "<td>".$data['Harga']."</td>";
    echo "<td>".$data['Stok']."</td>";
    echo "<td>
            <a href=\"?page=ubah_produk&&id=".$data['IDProduk']."\" class=\"btn btn-secondary\">Ubah</a>
            <a href=\"?page=hapus_produk&&id=".$data['IDProduk']."\" class=\"btn btn-danger\">Hapus</a>
          </td>";
    echo "</tr>";
}
?>
</table>
</div>