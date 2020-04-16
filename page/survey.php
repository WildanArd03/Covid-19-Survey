<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<!-- Orders -->
                <div class="orders">
                    <div class="row">
                    	<div class="col-xl-2">
                    	</div>
                        <div class="col-xl-8 mt-5 pt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Survey Covid-19 </h4>
                                </div>
                                <div class="card-body--">
                                <div style='width:100%; border: 1px solid #EBEBEB;'>
                                    <div class="table-stats  ov-h">
                                    <table width="100%" border="0" class="align-middle mb-0 table table-borderless table-striped table-hover">
                                    <?php
                                    error_reporting(0);
                                    include '../config/koneksi.php';
							        $hasil=mysqli_query($con, "SELECT * FROM tbl_soal WHERE aktif='Y' ORDER BY RAND ()");
							        $jumlah=mysqli_num_rows($hasil);
							        $urut=0;
							        while($row =mysqli_fetch_array($hasil))
							        {
							            $id=$row["id_soal"];
							            $pertanyaan=$row["soal"];
							            $pilihan_a=$row["a"];
							            $pilihan_b=$row["b"];
							            ?>
                                    <form name="form1" method="post" action="jawab.php" style='text-align: left;'>
                                    <input type="hidden" name="id[]" value=<?php echo $id; ?>>
                                    <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>

                                    <tr>
                                            <td width="17"><font color="#000000"><?php echo $urut=$urut+1; ?></font></td>
                                            <td width="430" class="text-left"><font color="#000000"><?php echo "$pertanyaan"; ?></font></td>
                                    </tr>

                                    <?php
                                            if (!empty($row["gambar"])) {
                                                echo "<tr><td></td><td><img src='foto/$row[gambar]' width='200' hight='200'></td></tr>";
                                                    }
                                    ?>
    
                <tr>
                    <td height="21"><font color="#000000">&nbsp;</font></td>
                    <td class="text-left"><font color="#000000"> A.  <input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> 
                <?php echo "$pilihan_a";?></font> </td>
                

                </tr>
                <tr>
                  <td><font color="#000000">&nbsp;</font></td>
                <td class="text-left"><font color="#000000"> B. <input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> 
                <?php echo "$pilihan_b";?></font> </td>
                 </tr>
                 


                 <?php
                     }
                ?>
            <tr>
                <td>&nbsp;</td>
                  <td class="text-center"><input type="submit" class="btn btn-success" name="submit" value="SUBMIT" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
            </tr>


                                    </table>
                                    </form>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                        <div class="col-xl-4">
                            <div class="row">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="card br-0">
                                       
                                    </div><!-- /.card -->
                                </div>
                            </div>
                        </div> <!-- /.col-md-4 -->
                    </div>
                </div>
                <!-- /.orders -->
</body>
</html>