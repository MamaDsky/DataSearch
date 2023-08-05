<?php 

$conn = mysqli_connect("localhost", "root", "", "project1");

if (!$conn){
    echo "Koneksi Gagal" . mysqli_connect_error();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Data Di Dalam Website Dengan PHP Mysql</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bungkus">
        <h1>Search Data In <span>Database</span></h1>
        <p>Made With ❤ by MamaDsky</p>
        <br>
        <div class="form">
        <form method="get" action="">
            <input name="data" placeholder="Masukan Nama Anda" type="text">
            <button type="submit">Reset</button>
        </form>
    </div>
     <br><br>
     <table border="2">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>NIM</th>
            <th>No Telp</th>
        </tr>
        <?php 
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM siswa");

            if(isset($_GET['data'])) {
                $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nama_siswa LIKE '%".$_GET['data']."%'");
            }

            while($data = mysqli_fetch_assoc($query)) {
            ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama_siswa'] ?></td>
            <td><?= $data['kelas'] ?></td>
            <td><?= $data['nim'] ?></td>
            <td><?= $data['telp'] ?></td>
        </tr>
        <?php }
        
        if(isset($_GET['submit'])){
            header('location:index.php');
        }
        
        ?>
     </table>
    </div>
</body>
</html>