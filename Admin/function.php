<?php
$conn = mysqli_connect("localhost", "root", "", "db_laundry");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//profil user
function profiluser($data){
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);
    $user_type = htmlspecialchars($data['user_type']);

    $query = "UPDATE user_form SET
    name = '$name',
    email = '$email',
    password = '$password',
    user_type = '$user_type'
    WHERE id = $id
    ";

mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

//Pofil Admin
function profil($data){
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);
    $user_type = htmlspecialchars($data['user_type']);

    $query = "UPDATE user_form SET
    name = '$name',
    email = '$email',
    password = '$password',
    user_type = '$user_type'
    WHERE id = $id
    ";

mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function hapusprofil($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM user_form WHERE id = $id");
    return mysqli_affected_rows($conn);
}



//Tabel Pelanggan
function nambahpelanggan($data){
    global $conn;
    $nama_pelanggan = htmlspecialchars($data["nama_pelanggan"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    
    $query = "INSERT INTO pelanggan (nama_pelanggan, alamat, no_hp) 
    VALUES
    ('$nama_pelanggan','$alamat','$no_hp')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function hapuspelanggan($id_pelanggan){
    global $conn;
    mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan = $id_pelanggan");
    return mysqli_affected_rows($conn);
}

function ubahpelanggan($data){
    global $conn;

    $id_pelanggan = $data["id_pelanggan"];
    $nama_pelanggan = htmlspecialchars($data['nama_pelanggan']);
    $alamat = htmlspecialchars($data['alamat']);
    $no_hp = htmlspecialchars($data['no_hp']);

    $query = "UPDATE pelanggan SET
    nama_pelanggan = '$nama_pelanggan',
    alamat = '$alamat',
    no_hp = '$no_hp'
    WHERE id_pelanggan = $id_pelanggan
    ";

mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}

function carisiswa($keyword){
    $query = "SELECT * FROM siswa
    WHERE
    nis LIKE '%$keyword%' OR
    nama LIKE '%$keyword%' OR
    kelas LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' 
    ";
    return query($query);
}

function ambildata($conn,$query){
    $data = mysqli_query($conn,$query);
    if (mysqli_num_rows($data) > 0) {
        while($row = mysqli_fetch_assoc($data)){
        $hasil[] = $row;
    }

    return $hasil;
    }
}

// Tabel Pesanan function
function nambahpesanan($data) {  
    global $conn;
    
    $id = htmlspecialchars($data["user_id"]);
    $tgl_pending = htmlspecialchars($data["tgl_pending"]);
    $paket_id = htmlspecialchars($data["paket_id"]);
    $berat = htmlspecialchars($data["berat"]);
    $status = htmlspecialchars($data["status"]);
    
    $query_paket ="SELECT harga_paket FROM paket WHERE id_paket = $paket_id";
    $result_paket = mysqli_query($conn, $query_paket);
    $row_paket = mysqli_fetch_assoc($result_paket);
    $harga_paket = $row_paket['harga_paket'];
    $total_harga = $harga_paket * $berat;

    $query = "INSERT INTO pesanan (total_harga, user_id, paket_id, berat, status) 
                  VALUES ('$total_harga', '$id', '$paket_id','$berat', '$status')";
    
    $result = mysqli_query ($conn, $query);
    return mysqli_affected_rows($conn);
    }
    
    function nambahpesanan2($data) {  
        global $conn;
        
        $id = htmlspecialchars($data["user_id"]);
        $tgl_pending = htmlspecialchars($data["tgl_pending"]);
        $paket_id = htmlspecialchars($data["paket_id"]);
        $berat = htmlspecialchars($data["berat"]);
        $status = htmlspecialchars($data["status"]);
        
        $query_paket ="SELECT harga_paket FROM paket WHERE id_paket = $paket_id";
        $result_paket = mysqli_query($conn, $query_paket);
        $row_paket = mysqli_fetch_assoc($result_paket);
        $harga_paket = $row_paket['harga_paket'];
        $total_harga = $harga_paket * $berat;
    
        $query = "INSERT INTO pesanan (total_harga, user_id, paket_id, berat, status) 
                      VALUES ('$total_harga', '$id', '$paket_id','$berat', '$status')";
        
        $result = mysqli_query ($conn, $query);
        return mysqli_affected_rows($conn);
        }


//Hapus Pesanan
function hapuspesanan($id_pesanan){
    global $conn;
    mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan = $id_pesanan");
    return mysqli_affected_rows($conn);
    }

function ubahpesanan($data){
    global $conn;

    $id_pesanan = $data["id_pesanan"];
    $tgl_proses = htmlspecialchars($data['tgl_proses']);
    $tgl_selesai = htmlspecialchars($data['tgl_selesai']);
    $tgl_diterima = htmlspecialchars($data['tgl_diterima']);
    $status = htmlspecialchars($data['status']);
    
    $query = "UPDATE pesanan SET
    tgl_proses = '$tgl_proses',
    tgl_selesai = '$tgl_selesai',
    tgl_diterima = '$tgl_diterima',
    status = '$status'
    WHERE id_pesanan = $id_pesanan
    ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    }


    //Tabel Paket
    function tambah_paket($data){
        global $conn;
        $id_paket = htmlspecialchars($data["id_paket"]);
        $nama_paket = htmlspecialchars($data["nama_paket"]);
        $harga_paket = htmlspecialchars($data["harga_paket"]);
        
        $query = "INSERT INTO paket (id_paket, nama_paket, harga_paket) 
        VALUES
        ('$id_paket','$nama_paket','$harga_paket')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    }

    function ubahpaket($data){
        global $conn;
    
        $id_paket = $data["id_paket"];
        $nama_paket = htmlspecialchars($data['nama_paket']);
        $harga_paket = htmlspecialchars($data['harga_paket']);
    
        $query = "UPDATE paket SET
        nama_paket = '$nama_paket',
        harga_paket = '$harga_paket'
        WHERE id_paket = $id_paket
        ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    }

    function hapus_paket($id_paket){
        global $conn;
        mysqli_query($conn, "DELETE FROM paket WHERE id_paket = $id_paket");
        return mysqli_affected_rows($conn);
        }

        //Penilaian
        function nambah_penilaian($data){
            global $conn;
            $id_penilaian = htmlspecialchars($data["id_penilaian"]);
            $keterangan = htmlspecialchars($data["keterangan"]);
            
            $query = "INSERT INTO penilaian (id_penilaian, keterangan) 
            VALUES
            ('$id_penilaian','$keterangan')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
        }




    function ubahTanggal($con)
    {
    $pesan = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $tanggal_proses = $_POST["tanggal_proses"];
        $tanggal_selesai = $_POST["tanggal_selesai"];
        $tanggal_diterima = $_POST["tanggal_diterima"];
        $id = $_GET["p"];
        $updateProses = "UPDATE pemesanan SET tggl_proses='$tanggal_proses' WHERE id_pemesanan='$id'";
        $updateSelesai = "UPDATE pemesanan SET tggl_selesai='$tanggal_selesai' WHERE id_pemesanan='$id'";
        $updateDiterima = "UPDATE pemesanan SET tggl_diterima='$tanggal_diterima' WHERE id_pemesanan='$id'";
        $resultProses = mysqli_query($con, $updateProses);
        $resultSelesai = mysqli_query($con, $updateSelesai);
        $resultDiterima = mysqli_query($con, $updateDiterima);

        if ($resultProses) {
            $pesan = '<div class="alert alert-success" role="alert">Tanggal Proses Berhasil Diperbarui.<meta http-equiv="refresh" content="1; url=data_pesanan.php" /></div>';
        } elseif ($resultSelesai) {
            $pesan = '<div class="alert alert-success" role="alert">Tanggal Selesai Berhasil Diperbarui.<meta http-equiv="refresh" content="1; url=data_pesanan.php" /></div>';
        } elseif ($resultDiterima) {
            $pesan = '<div class="alert alert-success" role="alert">Tanggal Diterima Berhasil Diperbarui.<meta http-equiv="refresh" content="1; url=data_pesanan.php" /></div>';
        } else {
            $pesan = '<div class="alert alert-danger" role="alert">Gagal memperbarui data: ' . mysqli_error($con) . '<meta http-equiv="refresh" content="1; url=data_pesanan.php" /></div>';
        }
    }

    return $pesan;
}
?>
