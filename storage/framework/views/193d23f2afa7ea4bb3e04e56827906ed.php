
<?php $__env->startSection('title', 'Kelola Booking'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-title">Kelola Booking</div>
<div class="card">
    <?php if($bookings->isEmpty()): ?>
        <p style="color:#888;">Belum ada booking.</p>
    <?php else: ?>
    <table>
        <thead><tr><th>No. Antrian</th><th>Pelanggan</th><th>Service</th><th>Tanggal</th><th>Kendaraan</th><th>Status</th><th>Mekanik</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><strong><?php echo e($b->nomor_antrian); ?></strong></td>
            <td><?php echo e($b->user->name); ?></td>
            <td><?php echo e($b->service->nama_service); ?></td>
            <td><?php echo e($b->tanggal_booking->format('d/m/Y')); ?></td>
            <td><?php echo e($b->kendaraan); ?> (<?php echo e($b->plat_nomor); ?>)</td>
            <td><span class="badge badge-<?php echo e($b->status); ?>"><?php echo e(ucfirst($b->status)); ?></span></td>
            <td><?php echo e($b->mekanik?->name ?? '-'); ?></td>
            <td>
                <?php if($b->status === 'menunggu'): ?>
                    <button onclick="openModal('assign-<?php echo e($b->id); ?>')" class="btn btn-primary btn-sm">Tugaskan</button>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

<?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($b->status === 'menunggu'): ?>
<div id="assign-<?php echo e($b->id); ?>" class="modal-overlay">
    <div class="modal-box">
        <button class="modal-close" onclick="closeModal('assign-<?php echo e($b->id); ?>')">&times;</button>
        <div class="modal-title">Tugaskan Mekanik - <?php echo e($b->nomor_antrian); ?></div>
        <p style="font-size:0.88rem;color:#555;margin-bottom:14px;">
            Pelanggan: <?php echo e($b->user->name); ?><br>
            Service: <?php echo e($b->service->nama_service); ?><br>
            Kendaraan: <?php echo e($b->kendaraan); ?> (<?php echo e($b->plat_nomor); ?>)
        </p>
        <form method="POST" action="<?php echo e(route('admin.booking.assign', $b)); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Pilih Mekanik</label>
                <select name="mekanik_id" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php $__currentLoopData = $mekaniks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($m->id); ?>"><?php echo e($m->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tugaskan</button>
        </form>
    </div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\tekno-repair\resources\views/admin/booking/index.blade.php ENDPATH**/ ?>