<!-- Font Awesome Icons -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-warning elevation-4 pb-4 " style="background-color: #0174BE">
  <!-- Brand Logo -->
  <a href="#" class="brand-link text-center ">
    <span class="brand-text font-weight-bold">Dinas PSDA Sumsel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <?php if (isset($_SESSION['level'])) : ?>
      <!-- Sidebar user panel-->
      <div class="image mt-3 pb-3 mb-3 d-flex">

        <img src="assets/img/psda.png" class="img-circle elevation-2 mx-auto img-fluid " style="background-color: white; width: 100px;  max-width: 100%; height: auto;" alt="logo psda">

      </div>
      <div class="user-panel mt-3 pb-3 mb-3 text-center ">
        <div class="info ">
          <p class="d-block font-weight-bold text-light ">Selamat Datang, <?= $_SESSION['username'] ?></p>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <?php if ($_SESSION['level'] == "pimpinan") : ?>
            <li class="nav-item">
              <a href="index.php?page=dashboard" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <!-- cetak data senal -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-regular fa-print"></i>
                <p>
                  Cetak Data Senal
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?page=cekepayang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Kepayang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=cemedak" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Medak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=cegeronggang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Geronggang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=ceputak" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Putak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=cemuara" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Muara Merang</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>
          <?php if ($_SESSION["level"] === "pengawas") : ?>
            <li class="nav-item">
              <a href="index.php?page=dashboard" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <!-- input senal -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Input Data Senal
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?page=inkepayang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Kepayang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=inmedak" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Medak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=ingeronggang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Geronggang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=inputak" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Putak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=inmuara" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Muara Merang</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>
          <?php if ($_SESSION["level"] == "admin") : ?>
            <li class="nav-item">
              <a href="index.php?page=dashboard" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <!-- cetak data senal -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-regular fa-print"></i>
                <p>
                  Cetak Data Senal
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?page=cekepayang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Kepayang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=cemedak" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Medak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=cegeronggang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Geronggang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=ceputak" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Putak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=cemuara" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Muara Merang</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- input senal -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Input Data Senal
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?page=inkepayang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Kepayang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=inmedak" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Medak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=ingeronggang" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Geronggang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=inputak" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Putak</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.php?page=inmuara" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Desa Muara Merang</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="index.php?page=anggota" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Anggota
                </p>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    <?php endif; ?>
  </div>
  <!-- /.sidebar -->
</aside>