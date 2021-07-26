<div class="card border-info">
    <div class="card-header bg-info">
        <h4 class="m-b-0 text-white"><?php echo $judul ?></h4>
    </div>
    <div class="card-body">
        <?php
        $akses = $this->session->userdata('akses');
        if ($akses == 1) { ?>
            <button type="button" onClick="TambahUser(this)" data-akses="<?php echo $this->session->userdata('akses') ?>" class="btn btn-default">+ User</button>
        <?php }
        ?>
        <div class="table-responsive">
            <table id="TabelUsersss" class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">NO</th>
                        <th width="5%" class="text-center">KODE</th>
                        <th width="25%" class="text-center">SKPD</th>
                        <th width="25%" class="text-center">USERNAME</th>
                        <th width="25%" class="text-center">USERNAME</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>





