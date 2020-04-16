
<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-9 col-xl-2" >
                            </div>
                            <div class="col-md-9 col-xl-7 mt-5 pt-5" >
                                <div class="main-card mb-4 card">
                                    <div class="card-header">Data Survey
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>Point</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                            $a = $go->tampil($con, "tbl_result");
                                            $no = 0;
                                            if ($a == "") {
                                                echo "<tr><td align='center' colspan='10'>NO RECORD</td></tr>";
                                            }else{
                                                foreach ($a as $r) {
                                                $no++;
                                             ?>
                                             <tr>
                                                <td class="text-center text-muted"><?= $no ?></td>
                                                <td><?= $r['nama'] ?></td>
                                                <td><?= $r['point'] ?></td>
                                                <td><div class="badge badge-primary"><?= $r['status'] ?></div></td>
                                             </tr>
                                            <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-xl-3 mt-5 pt-5">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Survey</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <?php 
                                                $sql = mysqli_query($con, "SELECT count(nama) as nama FROM tbl_result");
                                                        $data = mysqli_fetch_array($sql);
                                                        $rom = $data['nama']
                                                 ?>
                                                <div class="widget-numbers text-success"><?= $rom ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            </div>
                        </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>