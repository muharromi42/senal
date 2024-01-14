<?php
// Panggil fungsi hitungJumlahData
$totalDataKepayang = hitungJumlahKepayang($conn);
$totalDataMedak = hitungJumlahMedak($conn);
$totalDataGeronggang = hitungJumlahgeronggang($conn);
$totalDataPutak = hitungJumlahPutak($conn);
$totalDataMuara = hitungJumlahMuara($conn);


?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <!-- Small Box (Stat card) -->
        <h5 class="mb-2 mt-4">Jumlah Data Sekat Kanal</h5>
        <?php if ($_SESSION['level'] == "pimpinan") : ?>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataKepayang"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Kepayang</p>
                        </div>
                        <a href="index.php?page=cekepayang" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataMedak"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Medak</p>
                        </div>
                        <a href="index.php?page=cemedak" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataGeronggang"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Geronggang</p>
                        </div>
                        <a href="index.php?page=cegeronggang" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataPutak"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Putak</p>
                        </div>
                        <a href="index.php?page=ceputak" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataMuara"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Muara Merang</p>
                        </div>
                        <a href="index.php?page=cemuara" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        <?php endif; ?>
        <?php if ($_SESSION['level'] == "pengawas" || $_SESSION['level'] == "admin") : ?>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataKepayang"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Kepayang</p>
                        </div>
                        <a href="index.php?page=inkepayang" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataMedak"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Medak</p>
                        </div>
                        <a href="index.php?page=inmedak" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataGeronggang"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Geronggang</p>
                        </div>
                        <a href="index.php?page=ingeronggang" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataPutak"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Putak</p>
                        </div>
                        <a href="index.php?page=inputak" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box" style="background-color: #0174BE">
                        <div class="inner">
                            <h3 class="d-flex justify-content-center " style="color: #ffff;"><?php echo "$totalDataMuara"; ?></h3>

                            <p class="d-flex justify-content-center font-weight-bold" style="color: #ffff;">Desa Muara Merang</p>
                        </div>
                        <a href="index.php?page=inmuara" class="small-box-footer">
                            Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        <?php endif; ?>
        <!-- /.row -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->