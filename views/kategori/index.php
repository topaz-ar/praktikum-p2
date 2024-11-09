<div class="main">
    <div class="container-fluid px-4">
        <ol class="mt-4 mb-4 breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo site_url('kategori'); ?>">Kategori</a></li>
            <li class="breadcrumb-item active"><?php echo $title; ?></li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="<?php echo site_url('kategori/add'); ?>" class="fas da-plus">Add New</a>
            </div>
            <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php endif; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($kategori as $kategori) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $kategori->nama; ?></td>
                                <td>
                                    <a href="<?php echo base_url('kategori/edit/' . $kategori->id); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('kategori/delete/' . $kategori->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fas fa-trash"></i> Hapus</a>
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