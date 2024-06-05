<?php
$id = $_GET['id'];
$query = mysqli_query($config, "DELETE FROM kasir_produk WHERE IDProduk=$id");
if($query) {
echo '<script>alert("Hapus data berhasil"); location.href="?page=produk"</script>';
}else{
echo '<script>alert("Hapus data gagal")</script>';
}
?>