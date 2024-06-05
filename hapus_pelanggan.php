<?php
$id = $_GET['id'];
$query = mysqli_query($config, "DELETE FROM kasir_pelanggan WHERE IDPelanggan=$id");
if($query) {
echo '<script>alert("Hapus data berhasil"); location.href="?page=pelanggan"</script>';
}else{
echo '<script>alert("Hapus data gagal")</script>';
}
?>