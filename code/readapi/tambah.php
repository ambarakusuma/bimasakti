<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="layout/css/style.css"> </head>

<body>
    <div class="wrap">
        <div class="header">
            <h1>API TOKO PALUGADA TAMBAH</h1> </div>
        <div class="menu">
            <ul>
                <li><a href="">Home</a></li>
            </ul>
        </div>
        <div class="badan">
            <div class="sidebar">
                <ul>
                    <li><a href="readapi/tampil.php">Produk</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            <div class="content">
                <p>Tambah Produk</p> <a href="../readapi/tampil.php">Kembali</a>
                <div id="stylish" class="myform">
                    <h1>TAMBAH PRODUK</h1>
                    <p>form ini digunakan untuk tambah data produk</p>
                    <form action="../api/api_tambah.php" method="post" id="form">
                        <div class="form-group">
                            <label for="">ID PRODUCT</label>
                            <input type="text" name="id_product" id="id_product" placeholder="ID PRODUCTNYA" aria-describedby="helpId"> </div>
                        <div class="form-group">
                            <label for="">NAMA PRODUCT</label>
                            <input type="text" name="n_product" id="n_product" placeholder="N PRODUCTNYA" aria-describedby="helpId"> </div>
                        <div class="form-group">
                            <label for="">KETERANGAN</label>
                            <input type="text" name="keterangan" id="keterangan" placeholder="KETERANGAN" aria-describedby="helpId"> </div>
                        <div class="form-group">
                            <label for="">STATUS PRODUCT</label>
                            <input type="text" name="id_status_product" id="id_status_product" placeholder="STATUS PRODUCTNYA" aria-describedby="helpId"> </div>
                        <div class="form-group">
                            <button type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="footer">
          
        </div>
    </div>
</body>

</html>