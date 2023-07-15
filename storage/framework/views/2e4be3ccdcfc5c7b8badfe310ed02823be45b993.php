<?php $__env->startSection('container'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Dashboard</h6>
                </div>

                <div class="card-body">
                    <h4>Wellcome <b><?php echo e(Auth::user()->name); ?></b></h4>
                </div>
            </div>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Transaksi</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo e($transaksi); ?>


                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <a href="/transaksi" style="font-size: 12px">Lihat semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo e($user); ?>

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <a href="/users" style="font-size: 12px">Lihat semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Postingan Aktif</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo e($postingan); ?>

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <a href="/post" style="font-size: 12px">Lihat semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Penjemputan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?php echo e($penjemputan); ?>

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa fa-car-side text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <a href="/penjemputan" style="font-size: 12px">Lihat semua</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isUser')): ?>
        <?php if($alamat == 0): ?>
            <div class="row">
                <div class="col-12">
                    <a href="/profile">
                        <div class="alert alert-warning alert-dismissible fade show text-white" role="alert">
                            <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
                            <span class="alert-text"><strong>Peringatan!!</strong> Lengkapi data alamat kamu sebelum melakukan
                                transaksi! </span>
                        </div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['isAdmin', 'isUser'])): ?>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Transaksi Hari Ini <?php echo e(date('d-m-Y')); ?></h6>
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
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
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
                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                    <?php echo e($data->post->user->name); ?></p>
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
                                            <td class="align-middle text-center">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
                                                    
                                                    <i class="fas fa-trash text-danger"
                                                        onclick="confirmationHapusData('/transaksi/delete/<?php echo e($data->id); ?>')"></i>
                                                <?php endif; ?>
                                                <a href="/transaksi/<?php echo e($data->id); ?>" style="margin-left: 5px;"><i
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
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isPetugas')): ?>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Penjemputan Hari Ini <?php echo e(date('d-m-Y')); ?></h6>
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
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
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
    <?php endif; ?>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/andysuryawan/Documents/tes /AppLimbah/resources/views/dashboard/index.blade.php ENDPATH**/ ?>