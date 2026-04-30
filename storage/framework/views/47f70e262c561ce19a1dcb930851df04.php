
<?php $__env->startSection('title', 'Data Pelanggan'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-title">Data Pelanggan</div>
<div class="card">
    <table>
        <thead><tr><th>Nama</th><th>Email</th><th>Telepon</th><th>Alamat</th><th>Total Booking</th><th>Bergabung</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $pelanggans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><strong><?php echo e($p->name); ?></strong></td>
            <td><?php echo e($p->email); ?></td>
            <td><?php echo e($p->telepon ?? '-'); ?></td>
            <td><?php echo e($p->alamat ?? '-'); ?></td>
            <td><?php echo e($p->bookings_count); ?></td>
            <td><?php echo e($p->created_at->format('d/m/Y')); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\tekno-repair\resources\views/admin/pelanggan/index.blade.php ENDPATH**/ ?>