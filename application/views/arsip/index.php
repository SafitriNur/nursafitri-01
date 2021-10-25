		<!-- Begin Page Content -->
		<div class="container-fluid mt-5">

		    <div class="container ml-4">
		        <h1>Arsip Surat</h1>
		        <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
		            Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
		    </div>

		    <div class="container mt-5">
		        <table>
		            <tr>
		                <?= $this->session->flashdata('pesan') ?>
		            </tr>
		            <tr>
		                <td width='100'>
		                    <h5>Cari surat</h5>
		                </td>
		                <td width='1000'>
		                    <div class="col-md-8">
		                        <?php echo form_open('arsip/search_surat') ?>
		                        <div class="input-group mb-3">
		                            <input type="text" class="form-control" placeholder="Search..." name="keyword"
		                                autocomplete="off" autofocus>
		                            <div class="input-group-append">
		                                <input type="submit" class="btn btn-primary" name="submit">
		                            </div>
		                        </div>
		                        <?php echo form_close() ?>
		                    </div>
		                </td>
		            </tr>
		        </table>
		    </div>

		    <div class="container mt-3">
		        <table class="table table-striped">
		            <thead>
		                <tr>
		                    <th scope="col">Nomor Surat</th>
		                    <th scope="col">Kategori</th>
		                    <th scope="col">Judul</th>
		                    <th scope="col">Waktu Pengarsipan</th>
		                    <th scope="col">Aksi</th>
		                </tr>
		            </thead>
		            <tbody>
		            <tbody>
		                <?php foreach ($arsip as $a) : ?>
		                <tr>
		                    <td width="150"><?= $a['no_surat']; ?></td>
		                    <td><?= $a['kategori']; ?></td>
		                    <td width="150"><?= $a['judul']; ?></td>
		                    <td width="150"><?= $a['waktu_pengarsipan']; ?></td>
		                    <td>
		                        <a class="btn btn-outline-danger" href="<?= base_url('arsip/delete_arsip/') . $a['id']; ?>"
		                            onclick="return confirm('Are you sure to delete this data ?');">
		                            Hapus
		                        </a>
		                        <a type="button" class="btn btn-outline-warning btn-icon"
		                            href="<?= base_url('arsip/download/' . $a['id']) ?>">
		                            Unduh
		                        </a>
		                        <button type="button" class="btn btn-outline-primary btn-icon" href="" data-toggle="modal"
		                            data-target="#showarsipModal<?= $a['id']; ?>">
		                            Lihat
		                        </button>
		                    </td>
		                </tr>
		                <?php endforeach; ?>
		            </tbody>
		            <a class="btn btn-outline-info mb-3" href="<?= base_url('arsip/tambah') ?>">Tambah Arsip</a>

		    </div>
		</div>

		<?php foreach ($arsip as $a) : ?>
		<div class="modal fade" id="editarsipModal<?= $a['id'] ?>" tabindex="-1" kelas="dialog"
		    aria-labelledby="editarsipModal<?= $a['id']; ?>Label" aria-hidden="true">
		    <div class="modal-dialog" kelas="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h3 class="modal-title" id="showMenuModal<?= $a['id'] ?>">Lihat >> Arsip</h3>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		                <div class="form-group">
		                    <span>Nomor Surat</span>
		                    <input type="text" class="form-control" readonly value="<?= $a['no_surat']; ?>" id="no_surat"
		                        name="no_surat">
		                </div>
		                <div class="form-group">
		                    <span>Kategori</span>
		                    <input type="text" class="form-control" readonly value="<?= $a['kategori']; ?>" id="kategori"
		                        name="kategori">
		                </div>
		                <div class="form-group">
		                    <span>Judul</span>
		                    <input type="text" class="form-control" readonly value="<?= $a['judul']; ?>" id="judul"
		                        name="judul">
		                </div>
		                <div class="form-group">
		                    <span>Waktu Pengarsipan</span>
		                    <input type="text" class="form-control" readonly value="<?= $a['waktu_pengarsipan']; ?>"
		                        id="waktu_pengarsipan" name="waktu_pengarsipan">
		                </div>

		                <div class="form-group">
		                    <span>File</span>
		                    <iframe src="<?= base_url('assets/uploads/' . $a['file_surat']) ?>" width="300"
		                        height="200"></iframe>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <a type="button" class="btn btn-warning btn-icon" href="<?= base_url('arsip') ?>">
		                    Kembali </a>
		                <a type="button" class="btn btn-success btn-icon" href="<?= base_url('arsip/download/' . $a['id']) ?>"
		                    download>
		                    Unduh
		                </a>
		            </div>
		        </div>
		    </div>
		</div>
		<?php endforeach; ?>

		<?php foreach ($arsip as $a) : ?>
		<div class="modal fade" id="showarsipModal<?= $a['id'] ?>" tabindex="-1" kelas="dialog"
		    aria-labelledby="showarsipModal<?= $a['id']; ?>Label" aria-hidden="true">
		    <div class="modal-dialog" kelas="document">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h3 class="modal-title" id="showMenuModal<?= $a['id'] ?>">Detail Arsip</h3>
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                    <span aria-hidden="true">&times;</span>
		                </button>
		            </div>
		            <div class="modal-body">
		                <div class="form-group">
		                    <span>Nomor Surat</span>
		                    <input type="text" class="form-control" readonly value="<?= $a['no_surat']; ?>" id="no_surat"
		                        name="no_surat">
		                </div>
		                <div class="form-group">
		                    <span>Kategori</span>
		                    <input type="text" class="form-control" readonly value="<?= $a['kategori']; ?>" id="kategori"
		                        name="kategori">
		                </div>
		                <div class="form-group">
		                    <span>Judul</span>
		                    <input type="text" class="form-control" readonly value="<?= $a['judul']; ?>" id="judul"
		                        name="judul">
		                </div>
		                <div class="form-group">
		                    <span>Waktu Pengarsipan</span>
		                    <input type="text" class="form-control" readonly value="<?= $a['waktu_pengarsipan']; ?>"
		                        id="waktu_pengarsipan" name="waktu_pengarsipan">
		                </div>

		                <div class="form-group">
		                    <span>File</span>
		                    <iframe src="<?= base_url('assets/uploads/' . $a['file_surat']) ?>" width="300"
		                        height="200"></iframe>
		                </div>
		            </div>
		            <div class="modal-footer">
		                <a type="button" class="btn btn-outline-warning btn-icon" href="<?= base_url('arsip') ?>">
		                    Kembali </a>
		                <a type="button" class="btn btn-outline-success btn-icon" href="<?= base_url('arsip/download/' . $a['id']) ?>"
		                    download>
		                    Unduh
		                </a>
	
		            </div>
		        </div>
		    </div>
		</div>
		<?php endforeach; ?>


		<script>
$('#searcher').quicksearch('table tbody tr', {
    'delay': 100,
    'bind': 'keyup keydown',
    'show': function() {
        if ($('#searcher').val() === '') {
            return;
        }
        $(this).addClass('show');
    },
    'onAfter': function() {
        if ($('#searcher').val() === '') {
            return;
        }
        if ($('.show:first').length > 0) {
            $('html,body').scrollTop($('.show:first').offset().top);
        }
    },
    'hide': function() {
        $(this).removeClass('show');
    },
    'prepareQuery': function(val) {
        return new RegExp(val, "i");
    },
    'testQuery': function(query, txt, _row) {
        return query.test(txt);
    }
});

$('#searcher').focus();
		</script>
