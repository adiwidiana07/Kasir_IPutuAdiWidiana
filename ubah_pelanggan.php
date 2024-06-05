<?php
// Check if IDpelanggan is set in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch data based on the IDpelanggan
    $query = mysqli_query($config, "SELECT * FROM kasir_pelanggan WHERE IDpelanggan = $id");
    $data = mysqli_fetch_array($query);
    
    // Check if form is submitted
    if(isset($_POST["nama_pelanggan"])) {
        $nama = $_POST["nama_pelanggan"];
        $alamat = $_POST["alamat"];
        $no_telepon = $_POST["no_telepon"];

        // Update the record with the new values
        $query = mysqli_query($config, "UPDATE kasir_pelanggan SET nama_pelanggan='$nama', Alamat='$alamat', NomorTelpon='$no_telepon' WHERE IDpelanggan=$id");

        if($query) {
            echo '<script>alert("UPDATE data berhasil")</script>';
        } else {
            echo '<script>alert("UPDATE data gagal")</script>';
        }
    }
} else {
    echo "IDpelanggan is not set in the URL.";
}
$query = mysqli_query($config,"SELECT*FROM kasir_pelanggan WHERE IDpelanggan");
$data = mysqli_fetch_array($query);
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
            <td><input class="form-control" type="text" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan'] ?>"></td>
        </tr>
        <tr>
            <td width="200">Alamat</td>
            <td width="1">:</td>
            <td>
            <textarea name="alamat" rows="5" class="form-control"><?php echo $data['Alamat'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="200">No tlp</td>
            <td width="1">:</td>
            <td>
            <input name="no_telepon" type="number" step="0" class="form-control" value="<?php echo $data['NomorTelpon'] ?>"></input>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button> <!-- Changed type to "reset" -->
            </td>
        </tr>
    </table>
</form>
</div>
