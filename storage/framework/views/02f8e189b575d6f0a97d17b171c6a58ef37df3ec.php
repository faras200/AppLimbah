<?php $__env->startSection('container'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Users</h6>
                    <a href="/users/create" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>
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
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>
                                    <th
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Role</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                            
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?php echo e($admin->name); ?></h6>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php echo e($admin->email); ?></p>
                                            
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                               User Biasa</p>
                                            
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="/users/<?php echo e($admin->id); ?>/edit" style="margin-right: 5px;"><i
                                                    class="fas fa-edit text-warning"></i></a>
                                            <i class="fas fa-trash text-danger"
                                                onclick="confirmationHapusData('/users/delete/<?php echo e($admin->id); ?>')"></i>
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
    <script>
        function confirmationHapusData(url) {
            swal({
                title: 'Anda Yakin Untuk Menghapus Data Ini ?',
                text: 'Anda Tidak Dapat Melihat Data Ini Lagi!!!',
                icon: 'warning',
                dangerMode: true,
                buttons: ['Tidak', 'Yakin']

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result) {
                    window.location.href = url;
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/andysuryawan/Documents/tes /AppLimbah/resources/views/dashboard/users/index.blade.php ENDPATH**/ ?>