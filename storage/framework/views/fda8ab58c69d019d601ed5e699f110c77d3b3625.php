<?php $__env->startSection('container'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Penjemputan</h6>
                    
                </div>
                <div class="card-header pb-0 d-flex justify-content-center">
                    <div class="col-10 nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#belum" role="tab"
                                    aria-controls="profile" aria-selected="true">
                                    Belum Di Jemput
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#proses" role="tab"
                                    aria-controls="dashboard" aria-selected="false">
                                    Proses Penjemputan
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <?php if(session()->has('success')): ?>
                    <?php
                        $p = session('success');
                    ?>
                    <script>
                        swal({
                            title: 'Berhasil!!',
                            text: '<?= $p ?>',
                            icon: 'success',
                        });
                    </script>
                <?php endif; ?>
                <div class="card-body tab-content px-0 pt-0 pb-2" id="pills-tabContent">

                    <div id="belum" class="tab-pane fade show active table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                        Barang
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Pelanggan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Harga Deal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Type</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tanggal</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="<?php echo e($data->post->foto); ?>" class="avatar avatar-sm me-3"
                                                        alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?php echo e($data->post->nama_barang); ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e($data->user->name); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                Rp. <?php echo e(number_format($data->harga_deal, 0, ',', '.')); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e($data->status); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e($data->type); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e(date('d-m-Y', strtotime($data->created_at))); ?></p>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <button class="text-xs mb-0 btn bg-gradient-warning" type="button"
                                                onclick="prosesJemput(<?php echo e($data->id); ?>, '<?php echo e(json_encode($data->user->alamat->alamat_lengkap)); ?>')"
                                                style="margin-right: 5px;">Proses
                                                Jemput <i class="fa fa-car-side text-white"
                                                    style="margin-left: 10px;"></i></button>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="proses" class="tab-pane fade table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                        Penjual
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jenis Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Patokan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Lokasi Maps</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="<?php echo e($data->transaksi->post->foto); ?>"
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?php echo e($data->user->name); ?></h6>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e($data->alamat->jenis_alamat); ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e($data->alamat->patokan); ?></p>
                                        </td>
                                        <td>
                                            <a class="text-xs font-weight-bold mb-0"
                                                href="https://www.google.com/maps/place/<?php echo e($data->alamat->lat . ',' . $data->alamat->lang); ?>"
                                                target="_blank">Klik
                                                Lokasi</a>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                                                <a href="/penjemputan/<?php echo e($data->id); ?>/edit" style="margin-right: 5px;"><i
                                                        class="fas fa-edit text-warning"></i></a>
                                                <i class="fas fa-trash text-danger"
                                                    onclick="confirmationHapusData('/penjemputan/delete/<?php echo e($data->id); ?>')"></i>
                                            <?php endif; ?>
                                            <a href="/penjemputan/<?php echo e($data->id); ?>" style="margin-left: 5px;"><i
                                                    class="fas fa-eye text-info"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modaljemput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penjemputan
                    </h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="trxid" value="">
                    <p>Kamu yakin ingin proses penjemputan ini?</p>
                    <div class="row mt-4 mb-4">
                        <h5 class="text-center"> Alamat :</h5>
                        <p class="text-center" id="alamat"></p>
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="jemputSekarang()" class="btn bg-gradient-primary">Jemput
                        Sekarang</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function prosesJemput(trxid, alamat) {
            console.log(trxid);
            $('#alamat').html(alamat);
            $('#trxid').val(trxid);
            $('#modaljemput').modal('show');
        }

        function jemputSekarang() {
            const csrf = $('meta[name="csrf-token"]').attr('content');
            const trx = $('#trxid').val();
            $.ajax({
                type: 'POST',
                url: "<?php echo e(route('create.penjemputan')); ?>",
                data: {
                    '_token': csrf,
                    'trxid': trx,
                },

                success: function(data) {
                    if (data.success) {
                        $('#modaljemput').modal('hide');

                        swal("Penjemputan Berhasil Diproses!",
                            "Segera lakukan penjemputan ke lokasi transaksi!", "success");

                        setTimeout(function() {
                            window.location.href = "/penjemputan/" + data.penjemputan;
                        }, 1400);
                    }

                }

            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/andysuryawan/Documents/tes /AppLimbah/resources/views/dashboard/penjemputan/index.blade.php ENDPATH**/ ?>