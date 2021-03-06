</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin keluar akun?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik tombol keluar jika yakin.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DIALOG -->

<div class="modal fade buatlaporan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="padding-right:0;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buat Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row px-4">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" value="<?= $ses_akun['nama'] ?>" disabled>
                            <span class="error-nama error-dialog text-danger mt-2"></span>
                        </div>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="tempat">Tempat Kejadian</label>
                            <input type="text" class="form-control" id="tempat" placeholder="Alamat/tempat">
                            <span class="error-tempat error-dialog text-danger mt-2"></span>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="date">Tanggal Kejadian</label>
                            <div class="input-group date datepicker">
                                <input type="text" class="form-control" id="datepicker" placeholder="dd/mm/yyyy">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                                <span class="error-tgl error-dialog text-danger mt-2"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col-xl">
                        <div class="form-group">
                            <textarea class="form-control" id="isilapor" onkeyup="countChar(this)" rows="8" placeholder="Keterangan"></textarea>
                            <div class="mt-2">
                                <span class="error-isilap error-dialog text-danger"></span>
                                <span><small class="float-right infotype"><span id="counttype"></span>/500</small></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="submitsurat">Kirim Surat</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade noticelap" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="padding-right:0;">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Lengkapi Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalkk">
                <div class="img-ktp d-flex justify-content-center">
                    <img src="<?php echo ($ses_akun['jk'] == 'Pria') ?  base_url('/assets/img/m-ktp.jpg') : base_url('/assets/img/f-ktp.jpg') ?>" width="300" alt="">
                </div>
                <div class="modal-text mt-4 d-flex justify-content-center">
                    <p>Anda belum melengkapi <span class="bg-warning font-weight-bold text-dark pl-2 pr-2">Data Profile</span>, silahkan lengkapi dengan mengunjungi laman Profile atau klik <a href="<?= base_url('pengguna/profile') ?>">disini</a></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<script src=<?= base_url('assets/vendor/jquery/jquery.min.js') ?>></script>
<script src=<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>></script>
<script src=<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>></script>
<script src=<?= base_url('assets/js/sb-admin-2.min.js') ?>></script>
<script src=<?= base_url('assets/js/sweetalert2.min.js') ?>></script>
<script src=<?= base_url('assets/js/pengguna.js') ?>></script>
<script src=<?= base_url('assets/js/fileinput.min.js') ?>></script>
<script src=<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>></script>
<script src=<?= base_url('assets/datepicker/js/bootstrap-datepicker.min.js') ?>></script>
<script src=<?= base_url('assets/datepicker/locales/bootstrap-datepicker.id.min.js') ?>></script>
<!-- <script src="@@path/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script> -->

<script src=<?= base_url('assets/js/demo/chart-area-demo.js') ?>></script>
<script src=<?= base_url('assets/js/demo/chart-pie-demo.js') ?>></script>
<script>
    $('#counttype').text(0)

    function countChar(val) {
        var len = val.value.length;
        if (len > 500) {
            val.value = val.value.substring(0, 500);
            $('.infotype').css('color', 'red');
        } else {
            $('.infotype').css('color', '#000');
            $('#counttype').text(len);
        }
    };
    $(function() {
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            clearBtn: true,
            todayHighlight: true,
            language: 'id'
        });
    });
</script>
</body>

</html>