<div class="container-fluid">
    <div class="row">
        <?php
        require 'admin/template/menu.php';
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            
            <?php 
            // Bagian ini menampilkan pesan kilat (flashdata)
            if (isset($_SESSION['_flashdata'])) {
                echo "<br>";
                foreach ($_SESSION['_flashdata'] as $key => $val) {
                    echo get_flashdata($key);
                }
            }
            ?>
            
            <div class="row">
                </div>

            <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ANGGOTA</h5>
                            <?php
                            // Query untuk menghitung total anggota
                            $query_anggota = "SELECT COUNT(*) AS total_anggota FROM anggota";
                            $result_anggota = pg_query($koneksi, $query_anggota);
                            $row_anggota = pg_fetch_assoc($result_anggota);
                            $total_anggota = $row_anggota['total_anggota'];
                            ?>
                            <p class="card-text">Total anggota sejumlah **<?= $total_anggota; ?>** orang.</p>
                            <a href="index.php?page=anggota" class="btn btn-primary"><i class="fa fa-users"></i> Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">JABATAN</h5>
                            <?php
                            // Query untuk menghitung total jabatan
                            $query_jabatan = "SELECT COUNT(*) AS total_jabatan FROM jabatan";
                            $result_jabatan = pg_query($koneksi, $query_jabatan);
                            $row_jabatan = pg_fetch_assoc($result_jabatan);
                            $total_jabatan = $row_jabatan['total_jabatan'];
                            ?>
                            <p class="card-text">Total jabatan sejumlah **<?= $total_jabatan; ?>**.</p>
                            <a href="index.php?page=jabatan" class="btn btn-primary"><i class="fa fa-puzzle-piece"></i> Kelola</a>
                        </div>
                    </div>
                </div>
            </div>
            

</main>
    </div>
</div>