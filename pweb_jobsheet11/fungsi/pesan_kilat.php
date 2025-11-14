<?php
function pesan($jenis, $isi)
{
    $_SESSION['_flashdata'] = [
        $jenis => $isi
    ];
}

function get_flashdata($jenis)
{
    if (isset($_SESSION['_flashdata'])) {
        $msg = "
            <div class='alert alert-$jenis alert-dismissible fade show' role='alert'>
                " . $_SESSION['_flashdata'][$jenis] . "
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        unset($_SESSION['_flashdata']);
        return $msg;
    }
}
?>