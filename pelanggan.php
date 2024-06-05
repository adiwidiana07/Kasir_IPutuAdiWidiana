<div class="container-fluid">
<h1 class="mt-4">Pelanggan</h1>
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Pelanggan</li>
</ol>
<a href="?page=tambah_pelanggan" class="btn btn-primary" >Tambah Peserta</a>
<table class="table table-bordered">
<tr>
<th>Nama Pelanggan</th>
<th>Alamat</th>
<th>No Telepon</th>
<th>Aksi</th>
</tr>
<?php
$query = mysqli_query($config, "SELECT * FROM kasir_pelanggan");
while($data = mysqli_fetch_array($query)){
    echo "<tr>";
    echo "<td>".$data['nama_pelanggan']."</td>";
    echo "<td>".$data['Alamat']."</td>";
    echo "<td>".$data['NomorTelpon']."</td>";
    echo "<td>
            <a href=\"?page=ubah_pelanggan&&id=".$data['IDPelanggan']."\" class=\"btn btn-secondary\">Ubah</a>
            <a href=\"?page=hapus_pelanggan&&id=".$data['IDPelanggan']."\" class=\"btn btn-danger\">Hapus</a>
          </td>";
    echo "</tr>";
}
?>
</table>
</div>