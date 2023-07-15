<?php $__env->startSection('container'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Postingan</h6>
                    <a href="/post/create" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>
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
                                        Jenis</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Berat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Harga</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $postingan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="<?php echo e($post->foto); ?>" class="avatar avatar-sm me-3"
                                                        alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?php echo e($post->nama_barang); ?></h6>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e($post->jenis); ?></p>
                                            
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e($post->berat); ?></p>
                                            
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e($post->status); ?></p>
                                            
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                Rp. <?php echo e(number_format($post->harga, 0, ',', '.')); ?></p>
                                            
                                        </td>
                                        <td class="align-middle text-center">
                                            <span data-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                                data-bs-trigger="hover focus" data-bs-content="Disabled popover">
                                                <a href="/post/<?php echo e($post->id); ?>/edit" style="margin-right: 5px;"><i
                                                        class="fas fa-edit text-warning"></i></a>
                                            </span>
                                            <span data-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                                data-bs-trigger="hover focus" data-bs-content="Disabled popover">
                                                <i class="fas fa-trash text-danger"
                                                    onclick="confirmationHapusData('/post/delete/<?php echo e($post->id); ?>')"></i>
                                            </span>
                                            <a href="/post/<?php echo e($post->id); ?>" style="margin-left: 5px;"><i
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/andysuryawan/Documents/tes /AppLimbah/resources/views/dashboard/postingan/index.blade.php ENDPATH**/ ?>