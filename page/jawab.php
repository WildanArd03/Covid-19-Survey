<?php 
session_start();
 ?>
<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Css/main.css">
<style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
<!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-2">
                        </div>
                        <div class="col-xl-8  mt-5 pt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Survey Covid-19 </h4>
                                </div>
                                <div class="card-body p-4">
                                <div style='width:100%; border: 1px solid #EBEBEB;'>
                                    <div class="table-resvonsipe">
                                    <table width="100%" border="0" lass="align-middle mb-0 table  table-hover">
                                    <?php
// koneksi ke mysqli
include '../config/koneksi.php';
// Check connection
if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}

       if(isset($_POST['submit'])){
            $pilihan=$_POST["pilihan"];
            $id_soal=$_POST["id"];
            $jumlah=$_POST['jumlah'];
            
            $score=0;
            $benar=0;
            $salah=0;
            $kosong=0;
            
            for ($i=0;$i<$jumlah;$i++){
                //id nomor soal
                $nomor=$id_soal[$i];
                
                //jika user tidak memilih jawaban
                if (empty($pilihan[$nomor])){
                    $kosong++;
                }else{
                    //jawaban dari user
                    $jawaban=$pilihan[$nomor];
                    
                    //cocokan jawaban user dengan jawaban di database
                    $query=mysqli_query($con, "select * from tbl_soal where id_soal='$nomor' and knc_jawaban='$jawaban'");
                    
                    $cek=mysqli_num_rows($query);
                    
                    if($cek){
                        //jika jawaban cocok (benar)
                        $benar++;
                    }else{
                        //jika salah
                        $salah++;
                    }
                    
                } 
                /*RUMUS
                Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
                hasil= 100 / jumlah soal * jawaban yang benar
                */

                
                
                $result=mysqli_query($con, "select * from tbl_soal WHERE aktif='Y'");
                $jumlah_soal=mysqli_num_rows($result);
                $score = 100/$jumlah_soal*$benar;
                $hasil = number_format($score,1);
            }

            if ($benar <= 7 ){
                $resiko = "Rendah";
            }elseif($benar <= 14){
                $resiko = "Sedang";
            }else{
                $resiko = "Tinggi";
            }
            $nama = $_SESSION['username'];
            $sql = mysqli_query($con, "insert into tbl_result values ('','$nama','$benar','$resiko')");
        }

        //Lakukan Penyimpanan Kedalam Database
      
        ?>
        <tr><td>Nama</td><td class="text-left"> : <?= $nama ?></td></tr>
        <tr><td>Jumlah Ya</td><td class="text-left"> : <?= $benar; ?></td></tr>
         <tr><td>Jumlah Tidak</td><td class="text-left"> : <?= $salah; ?></td></tr>
         <tr><td>Potensi Terkena Corona</td><td class="text-left">: <?= $resiko; ?></td></tr>


            </table>
            </form>
            </div> <!-- /.table-stats -->
        </div>
    </div> <!-- /.card -->
</div>  <!-- /.col-lg-8 -->
<a href="hal_utama.php" class="btn btn-success mt-3">Kembali</a> 