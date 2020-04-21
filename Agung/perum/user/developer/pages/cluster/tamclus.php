
<?php
include('../../lib/koneksi.php');

$KD_PERUM = $_POST['KD_PERUM'];
$NAMA_CLUSTER= $_POST['NAMA_CLUSTER'];
$TIPE= $_POST['TIPE'];
$LUAS_TANAH= $_POST['LUAS_TANAH'];
$STOK= $_POST['STOK'];
$HARGA= $_POST['HARGA'];
$FASILITAS= $_POST['FASILITAS'];

$GAMBAR = $_FILES['GAMBAR']['name'];
$tmp = $_FILES['GAMBAR']['tmp_name'];
$gambarbaru = date('dmYHis').$GAMBAR;
$path = "../../../../home/img/".$gambarbaru;

$GAMBAR1 = $_FILES['GAMBAR1']['name'];
$tmp1 = $_FILES['GAMBAR1']['tmp_name'];
$gambarbaru1 = date('dmYHis').$GAMBAR1;
$path1 = "../../../../home/img/".$gambarbaru1;

$GAMBAR2 = $_FILES['GAMBAR2']['name'];
$tmp2 = $_FILES['GAMBAR2']['tmp_name'];
$gambarbaru2 = date('dmYHis').$GAMBAR2;
$path2 = "../../../../home/img/".$gambarbaru2;

//query update

if(empty($GAMBAR1) && empty($GAMBAR2)) {
if (move_uploaded_file($tmp, $path)) {
    $query = "INSERT INTO cluster (`KD_CLUSTER`, `KD_PERUM`, `NAMA_CLUSTER`, `TIPE`, `LUAS_TANAH`, `STOK`, `HARGA`, `FASILITAS`, `GAMBAR`, `GAMBAR1`, `GAMBAR2`) VALUES (null, '$KD_PERUM', '$NAMA_CLUSTER', '$TIPE', '$LUAS_TANAH', '$STOK', '$HARGA', '$FASILITAS', '$gambarbaru', null, null)";
    $sql = mysqli_query($konek, $query);

if($sql){
        # credirect ke page index
            header('location: ../../index.php?p=cluster/cluster&a=insert_sukses');
        }else{
            header('location: ../../index.php?p=cluster/cluster&a=insert_gagal');  
    }
}
}else
if(empty($GAMBAR1)) {
if (move_uploaded_file($tmp, $path)) {
    if (move_uploaded_file($tmp2, $path2)) {
        $query = "INSERT INTO cluster (`KD_CLUSTER`, `KD_PERUM`, `NAMA_CLUSTER`, `TIPE`, `LUAS_TANAH`, `STOK`, `HARGA`, `FASILITAS`, `GAMBAR`, `GAMBAR1`, `GAMBAR2`) VALUES (null, '$KD_PERUM', '$NAMA_CLUSTER', '$TIPE', '$LUAS_TANAH', '$STOK', '$HARGA', '$FASILITAS', '$gambarbaru', null, '$gambarbaru2')";
        $sql = mysqli_query($konek, $query);
    
    if($sql){
            # credirect ke page index
                header('location: ../../index.php?p=cluster/cluster&a=insert_sukses');
            }else{
                header('location: ../../index.php?p=cluster/cluster&a=insert_gagal');  
        }
    }
}
    }else

    if(empty($GAMBAR2)) {
    if (move_uploaded_file($tmp, $path)) {
        if (move_uploaded_file($tmp1, $path1)) {
            $query = "INSERT INTO cluster (`KD_CLUSTER`, `KD_PERUM`, `NAMA_CLUSTER`, `TIPE`, `LUAS_TANAH`, `STOK`, `HARGA`, `FASILITAS`, `GAMBAR`, `GAMBAR1`, `GAMBAR2`) VALUES (null, '$KD_PERUM', '$NAMA_CLUSTER', '$TIPE', '$LUAS_TANAH', '$STOK', '$HARGA', '$FASILITAS', '$gambarbaru', '$gambarbaru1', null)";
            $sql = mysqli_query($konek, $query);
            
            if($sql){
                    # credirect ke page index
                    header('location: ../../index.php?p=cluster/cluster&a=insert_sukses');
                }else{
                    header('location: ../../index.php?p=cluster/cluster&a=insert_gagal');  
            }
        
         }
         } 
        }else


if (move_uploaded_file($tmp, $path)) {
if (move_uploaded_file($tmp1, $path1)) {
if (move_uploaded_file($tmp2, $path2)) {
    $query = "INSERT INTO cluster (`KD_CLUSTER`, `KD_PERUM`, `NAMA_CLUSTER`, `TIPE`, `LUAS_TANAH`, `STOK`, `HARGA`, `FASILITAS`, `GAMBAR`, `GAMBAR1`, `GAMBAR2`) VALUES (null, '$KD_PERUM', '$NAMA_CLUSTER', '$TIPE', '$LUAS_TANAH', '$STOK', '$HARGA', '$FASILITAS', '$gambarbaru', '$gambarbaru1', '$gambarbaru2')";
    $sql = mysqli_query($konek, $query);

if($sql){
        # credirect ke page index
            header('location: ../../index.php?p=cluster/cluster&a=insert_sukses');
        }else{
            header('location: ../../index.php?p=cluster/cluster&a=insert_gagal');  
    }
}
}
}





    






   