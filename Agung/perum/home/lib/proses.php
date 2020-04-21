<?php

    include "koneksi.php";
    if(isset($_POST['komentar1'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        $ISI_DIS=mysqli_real_escape_string($konek, $_POST['ISI_DIS']);
        $TGLWAKTU_DIS=date("Y-m-d H:i:s");

        $query = "INSERT INTO diskusi  (`KD_DIS`, `USERNAME`, `KD_CLUSTER`, `ISI_DIS`, `TGLWAKTU_DIS`) VALUES(NULL, '$USERNAME', '$KD_CLUSTER', '$ISI_DIS', '$TGLWAKTU_DIS')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index_admin.php?p=bukudetail/buku_detail_adm&USERNAME='.$USERNAME.'&KD_CLUSTER='.$KD_CLUSTER.'&a=komentar_sukses');
        else
            header('location: ../index_admin.php?p=bukudetail/buku_detail_adm&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
            // echo "Gagal";

    }


    
  
    if(isset($_POST['balas2'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        echo $KD_DISP=$_POST['KD_DIS'];
        $ISI_DIS=mysqli_real_escape_string($konek, $_POST['ISI_DIS']);
        $TGLWAKTU_DIS=date("Y-m-d H:i:s");

        $query = "INSERT INTO diskusi  (`KD_DIS`, `KD_CLUSTER`, `KD_DISP`, `USERNAME`,  `ISI_DIS`, `TGLWAKTU_DIS`) VALUES(NULL, '$KD_CLUSTER', '$KD_DISP', '$USERNAME', '$ISI_DIS', '$TGLWAKTU_DIS')";
        $hasil = mysqli_query($konek, $query);


    }






    if(isset($_POST['chat1'])){
        
        $USERNAME=$_POST['USERNAME'];
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $PENERIMA=$_POST['PENERIMA'];

        $TGLWAKTU_CHAT=date("Y-m-d H:i:s");
        $ISI_CHAT=mysqli_real_escape_string($konek, $_POST['ISI_CHAT']);
        

        $query = "INSERT INTO chat  (`KD_CHAT`, `USERNAME`, `PENERIMA`, `TGLWAKTU_CHAT`, `ISI_CHAT`) VALUES(NULL, '$USERNAME', '$PENERIMA', '$TGLWAKTU_CHAT' ,'$ISI_CHAT')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
        header('location: ../index_admin.php?p=bukudetail/buku_detail_adm&USERNAME='.$USERNAME.'&KD_CLUSTER='.$KD_CLUSTER.'&a=komentar_sukses');
    else
        header('location: ../index_admin.php?p=bukudetail/buku_detail_adm&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
        // echo "Gagal";
    }



    if(isset($_POST['chat2'])){
        
        $USERNAME=$_POST['USERNAME'];
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $PENERIMA=$_POST['PENERIMA'];

        $TGLWAKTU_CHAT=date("Y-m-d H:i:s");
        $ISI_CHAT=mysqli_real_escape_string($konek, $_POST['ISI_CHAT']);
        

        $query = "INSERT INTO chat  (`KD_CHAT`, `USERNAME`, `PENERIMA`, `TGLWAKTU_CHAT`, `ISI_CHAT`) VALUES(NULL, '$USERNAME', '$PENERIMA', '$TGLWAKTU_CHAT' ,'$ISI_CHAT')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
        header('location: ../index_developer.php?p=bukudetail/buku_detail_dev&USERNAME='.$USERNAME.'&KD_CLUSTER='.$KD_CLUSTER.'&a=komentar_sukses');
    else
        header('location: ../index_developer.php?p=bukudetail/buku_detail_dev&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
        // echo "Gagal";
    }



    if(isset($_POST['chat3'])){
        
        $USERNAME=$_POST['USERNAME'];
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $PENERIMA=$_POST['PENERIMA'];

        $TGLWAKTU_CHAT=date("Y-m-d H:i:s");
        $ISI_CHAT=mysqli_real_escape_string($konek, $_POST['ISI_CHAT']);
        

        $query = "INSERT INTO chat  (`KD_CHAT`, `USERNAME`, `PENERIMA`, `TGLWAKTU_CHAT`, `ISI_CHAT`) VALUES(NULL, '$USERNAME', '$PENERIMA', '$TGLWAKTU_CHAT' ,'$ISI_CHAT')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
        header('location: ../index_customer.php?p=bukudetail/buku_detail_cus&USERNAME='.$USERNAME.'&KD_CLUSTER='.$KD_CLUSTER.'&a=komentar_sukses');
    else
        header('location: ../index_customer.php?p=bukudetail/buku_detail_cus&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
        // echo "Gagal";
    }




    if(isset($_POST['ulasan1'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        $ISI_REV=mysqli_real_escape_string($konek, $_POST['ISI_REV']);
        $RATING=mysqli_real_escape_string($konek, $_POST['RATING']);
        $TGLWAKTU_REV=date("Y-m-d H:i:s");
        $FOTO_REV = $_FILES['FOTO_REV']['name'];
        $tmp = $_FILES['FOTO_REV']['tmp_name'];
        $gambarbaru = date('dmYHis').$FOTO_REV;
        $path = "../img/".$gambarbaru;

//query update
        if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO review  (`KD_REV`, `USERNAME`, `KD_CLUSTER`, `ISI_REV`, `TGLWAKTU_REV`, `FOTO_REV`, `RATING`) VALUES(NULL, '$USERNAME', '$KD_CLUSTER', '$ISI_REV', '$TGLWAKTU_REV', '$gambarbaru', '$RATING')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index_admin.php?p=bukudetail/buku_detail_adm&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_sukses');
        else
            header('location: ../index_admin.php?p=bukudetail/buku_detail_adm&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
            // echo "Gagal";
        }
    }
    if(isset($_POST['report1'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        $ISI_REP=mysqli_real_escape_string($konek, $_POST['ISI_REP']);
        $TGLWAKTU_REP=date("Y-m-d H:i:s");

        $query = "INSERT INTO report  (`KD_REP`, `USERNAME`, `KD_CLUSTER`, `ISI_REP`, `TGLWAKTU_REP`) VALUES(NULL, '$USERNAME', '$KD_CLUSTER', '$ISI_REP', '$TGLWAKTU_REP')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index_admin.php?p=bukudetail/buku_detail_adm&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_sukses');
        else
            header('location: ../index_admin.php?p=bukudetail/buku_detail_adm&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
            // echo "Gagal";

    }
    if(isset($_POST['komentar2'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        $PENERIMA_DIS=$_POST['USERNAME1'];
        $ISI_DIS=mysqli_real_escape_string($konek, $_POST['ISI_DIS']);
        
        $TGLWAKTU_DIS=date("Y-m-d H:i:s");

        $query = "INSERT INTO diskusi  (`KD_DIS`, `USERNAME`, `PENERIMA_DIS`, `KD_CLUSTER`, `ISI_DIS`, `TGLWAKTU_DIS`) VALUES(NULL, '$USERNAME', '$PENERIMA_DIS', '$KD_CLUSTER', '$ISI_DIS', '$TGLWAKTU_DIS')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index_developer.php?p=bukudetail/buku_detail_dev&USERNAME='.$USERNAME.'&KD_CLUSTER='.$KD_CLUSTER.'&a=komentar_sukses');
        else
            header('location: ../index_developer.php?p=bukudetail/buku_detail_dev&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
            // echo "Gagal";

    }


    if(isset($_POST['ulasan2'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        $ISI_REV=mysqli_real_escape_string($konek, $_POST['ISI_REV']);
        $RATING=mysqli_real_escape_string($konek, $_POST['RATING']);
        $TGLWAKTU_REV=date("Y-m-d H:i:s");
        $FOTO_REV = $_FILES['FOTO_REV']['name'];
        $tmp = $_FILES['FOTO_REV']['tmp_name'];
        $gambarbaru = date('dmYHis').$FOTO_REV;
        $path = "../img/".$gambarbaru;

//query update
        if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO review  (`KD_REV`, `USERNAME`, `KD_CLUSTER`, `ISI_REV`, `TGLWAKTU_REV`, `FOTO_REV`, `RATING`) VALUES(NULL, '$USERNAME', '$KD_CLUSTER', '$ISI_REV', '$TGLWAKTU_REV', '$gambarbaru', '$RATING')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index_developer.php?p=bukudetail/buku_detail_dev&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_sukses');
        else
            header('location: ../index_developer.php?p=bukudetail/buku_detail_dev&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
            // echo "Gagal";
        }
    }
    
    if(isset($_POST['report2'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        $ISI_REP=mysqli_real_escape_string($konek, $_POST['ISI_REP']);
        $TGLWAKTU_REP=date("Y-m-d H:i:s");

        $query = "INSERT INTO report  (`KD_REP`, `USERNAME`, `KD_CLUSTER`, `ISI_REP`, `TGLWAKTU_REP`) VALUES(NULL, '$USERNAME', '$KD_CLUSTER', '$ISI_REP', '$TGLWAKTU_REP')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index_developer.php?p=bukudetail/buku_detail_dev&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_sukses');
        else
            header('location: ../index_developer.php?p=bukudetail/buku_detail_dev&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
            // echo "Gagal";

    }
    if(isset($_POST['komentar3'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        $ISI_DIS=mysqli_real_escape_string($konek, $_POST['ISI_DIS']);
        $TGLWAKTU_DIS=date("Y-m-d H:i:s");
        $PENERIMA_DIS=$_POST['PENERIMA'];

        $query = "INSERT INTO diskusi  (`KD_DIS`, `USERNAME`, `PENERIMA_DIS`, `KD_CLUSTER`, `ISI_DIS`, `TGLWAKTU_DIS`) VALUES(NULL, '$USERNAME', '$PENERIMA_DIS', '$KD_CLUSTER', '$ISI_DIS', '$TGLWAKTU_DIS')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index_customer.php?p=bukudetail/buku_detail_cus&USERNAME='.$USERNAME.'&KD_CLUSTER='.$KD_CLUSTER.'&a=komentar_sukses');
        else
            header('location: ../index_customer.php?p=bukudetail/buku_detail_cus&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
            // echo "Gagal";

    }


    if(isset($_POST['ulasan3'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        $ISI_REV=mysqli_real_escape_string($konek, $_POST['ISI_REV']);
        $RATING=mysqli_real_escape_string($konek, $_POST['RATING']);
        $TGLWAKTU_REV=date("Y-m-d H:i:s");
        $PENERIMA_REV=$_POST['PENERIMA'];
        $FOTO_REV = $_FILES['FOTO_REV']['name'];
        $tmp = $_FILES['FOTO_REV']['tmp_name'];
        $gambarbaru = date('dmYHis').$FOTO_REV;
        $path = "../img/".$gambarbaru;

//query update
        if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO review  (`KD_REV`, `USERNAME`,`PENERIMA_REV`, `KD_CLUSTER`, `ISI_REV`, `TGLWAKTU_REV`, `FOTO_REV`, `RATING`) VALUES(NULL, '$USERNAME', '$PENERIMA_REV', '$KD_CLUSTER', '$ISI_REV', '$TGLWAKTU_REV', '$gambarbaru', '$RATING')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index_customer.php?p=bukudetail/buku_detail_cus&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_sukses');
        else
            header('location: ../index_customer.php?p=bukudetail/buku_detail_cus&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
            // echo "Gagal";
        }
    }
    if(isset($_POST['report3'])){
        $KD_CLUSTER=$_POST['KD_CLUSTER'];
        $USERNAME=$_POST['USERNAME'];
        $ISI_REP=mysqli_real_escape_string($konek, $_POST['ISI_REP']);
        $TGLWAKTU_REP=date("Y-m-d H:i:s");

        $query = "INSERT INTO report  (`KD_REP`, `USERNAME`, `KD_CLUSTER`, `ISI_REP`, `TGLWAKTU_REP`) VALUES(NULL, '$USERNAME', '$KD_CLUSTER', '$ISI_REP', '$TGLWAKTU_REP')";
        $hasil = mysqli_query($konek, $query);
        if ($hasil)
            header('location: ../index_customer.php?p=bukudetail/buku_detail_cus&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_sukses');
        else
            header('location: ../index_customer.php?p=bukudetail/buku_detail_cus&KD_CLUSTER='.$KD_CLUSTER.'&USERNAME='.$USERNAME.'&a=komentar_gagal');
            // echo "Gagal";

    }


 