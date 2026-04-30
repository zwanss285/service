
<?php $__env->startSection('title', 'Pesanan Saya'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-title">Pesanan Saya</div>
<div style="margin-bottom:16px;">
    <a href="<?php echo e(route('user.booking.create')); ?>" class="btn btn-primary">+ Booking Baru</a>
</div>
<div class="card">
    <?php if($bookings->isEmpty()): ?>
        <p style="color:#888;">Belum ada booking.</p>
    <?php else: ?>
        <table>
            <thead><tr><th>No. Antrian</th><th>Service</th><th>Tanggal</th><th>Kendaraan</th><th>Plat</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><strong><?php echo e($b->nomor_antrian); ?></strong></td>
                <td><?php echo e($b->service->nama_service); ?></td>
                <td><?php echo e($b->tanggal_booking->format('d/m/Y')); ?></td>
                <td><?php echo e($b->kendaraan); ?></td>
                <td><?php echo e($b->plat_nomor); ?></td>
                <td><span class="badge badge-<?php echo e($b->status); ?>"><?php echo e(ucfirst($b->status)); ?></span></td>
                <td><a href="<?php echo e(route('user.booking.show', $b)); ?>" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\tekno-repair\resources\views/user/booking/index.blade.php ENDPATH**/ ?>