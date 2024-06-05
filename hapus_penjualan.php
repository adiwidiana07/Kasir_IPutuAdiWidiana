<?php
$id = $_GET['id'];

// Delete records from detailpenjualan table first
$query_detail = mysqli_query($config, "DELETE FROM detailpenjualan WHERE IDPenjualan=$id");

// Check if the deletion from detailpenjualan was successful
if($query_detail) {
    // If deletion from detailpenjualan was successful, then delete from kasir_penjualan
    $query_penjualan = mysqli_query($config, "DELETE FROM kasir_penjualan WHERE IDPenjualan=$id");

    // Check if the deletion from kasir_penjualan was successful
    if($query_penjualan) {
        echo '<script>alert("Hapus data berhasil"); location.href="?page=pembelian"</script>';
    } else {
        echo '<script>alert("Hapus data gagal")</script>';
    }
} else {
    echo '<script>alert("Hapus data gagal")</script>';
}
?>
