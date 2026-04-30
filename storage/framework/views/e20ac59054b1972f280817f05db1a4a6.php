
<?php $__env->startSection('title', 'Dashboard Admin'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-title">Dashboard Admin</div>
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-num"><?php echo e($stats['total_booking']); ?></div>
        <div class="stat-label">Total Booking</div>
    </div>
    <div class="stat-card" style="border-top-color:#f9c74f;">
        <div class="stat-num" style="color:#856404;"><?php echo e($stats['menunggu']); ?></div>
        <div class="stat-label">Menunggu</div>
    </div>
    <div class="stat-card" style="border-top-color:#2563b0;">
        <div class="stat-num" style="color:#2563b0;"><?php echo e($stats['diproses']); ?></div>
        <div class="stat-label">Diproses</div>
    </div>
    <div class="stat-card" style="border-top-color:#198754;">
        <div class="stat-num" style="color:#198754;"><?php echo e($stats['selesai']); ?></div>
        <div class="stat-label">Selesai</div>
    </div>
    <div class="stat-card">
        <div class="stat-num"><?php echo e($stats['total_pelanggan']); ?></div>
        <div class="stat-label">Pelanggan</div>
    </div>
    <div class="stat-card">
        <div class="stat-num"><?php echo e($stats['total_mekanik']); ?></div>
        <div class="stat-label">Mekanik</div>
    </div>
    <div class="stat-card" style="border-top-color:#198754;">
        <div class="stat-num" style="color:#198754;font-size:1.3rem;">Rp <?php echo e(number_format($stats['pendapatan'],0,',','.')); ?></div>
        <div class="stat-label">Pendapatan</div>
    </div>
</div>
<div class="card">
    <div class="card-title">Booking Terbaru</div>
    <table>
        <thead><tr><th>No. Antrian</th><th>Pelanggan</th><th>Service</th><th>Tanggal</th><th>Status</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $bookingTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><strong><?php echo e($b->nomor_antrian); ?></strong></td>
            <td><?php echo e($b->user->name); ?></td>
            <td><?php echo e($b->service->nama_service); ?></td>
            <td><?php echo e($b->tanggal_booking->format('d/m/Y')); ?></td>
            <td><span class="badge badge-<?php echo e($b->status); ?>"><?php echo e(ucfirst($b->status)); ?></span></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\tekno-repair\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>