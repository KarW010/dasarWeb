<div class="container-fluid">
    <div class="row">
        <?php
        require 'admin/template/menu.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM jabatan WHERE id = '$id'";
        
        // **PERBAIKAN: Ganti mysqli_query dengan pg_query**
        $result = pg_query($koneksi, $query);
        
        // **PERBAIKAN: Ganti mysqli_fetch_assoc dengan pg_fetch_assoc**
        $row = pg_fetch_assoc($result);
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Jabatan</h1>
            </div>
            <form action="fungsi/edit.php?jabatan=edit" method="POST">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                Form Edit Jabatan
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama Jabatan:</label>
                                    <input type="text" name="jabatan" class="form-control" value="<?= $row['jabatan']; ?>" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Keterangan:</label>
                                    <textarea class="form-control" name="keterangan" id="message-text"><?= $row['keterangan']; ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Ubah</button>
                                <a href="index.php?page=jabatan" class="btn btn-secondary"><i class="fa fa-times" aria-hidden="true"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>