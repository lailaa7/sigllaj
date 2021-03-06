<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flashdata'); ?>"></div>
<div class="container-fluid">
    <div class="content-body">
        <div class="col-lg-12 mt-3">
            <?php echo anchor('admin/tambah_terminal', '<button class="btn btn-rounded btn-primary btn-icon mb-3"><i class="fa fa-plus fa-sm"></i> Tambah Data</button>') ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Terminal</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle zero-configuration">
                            <thead>
                                <tr>
                                    <th>Nama Terminal</th>
                                    <th>Nama Jalan</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_terminal as $term) : ?>
                                    <tr>
                                        <td><?php echo $term->nama_terminal ?></td>
                                        <td><?php echo $term->lokasi ?></td>
                                        <td><?php echo $term->longitude ?></td>
                                        <td><?php echo $term->latitude ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/Terminal_admin/Edit/' . $term->id_terminal,)
                                                        ?>" class="btn btn-circle btn-primary btn-small">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="<?php echo base_url('admin/Terminal_admin/Hapus/' . $term->id_terminal,)
                                                        ?>" class="btn btn-circle btn-danger btn-small btn-hps">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>

                                            <!-- <a href="<?php echo base_url('admin/Terminal_admin/Detail_terminal/' . $term->id_terminal,)
                                                        ?>" class="btn btn-circle btn-info btn-small">
                                                <i class="fa fa-eye"></i>
                                            </a> -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>