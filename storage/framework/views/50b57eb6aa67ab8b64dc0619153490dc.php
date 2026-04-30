
<?php $__env->startSection('title', 'Transaksi'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-title">Data Transaksi</div>
<div class="card">
    <?php if($transaksis->isEmpty()): ?>
        <p style="color:#888;">Belum ada transaksi. Transaksi dibuat otomatis saat mekanik menandai service selesai.</p>
    <?php else: ?>
    <table>
        <thead><tr><th>No. Transaksi</th><th>No. Antrian</th><th>Pelanggan</th><th>Service</th><th>Total</th><th>Status</th><th>Metode</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><strong><?php echo e($t->nomor_transaksi); ?></strong></td>
            <td><?php echo e($t->booking->nomor_antrian); ?></td>
            <td><?php echo e($t->booking->user->name); ?></td>
            <td><?php echo e($t->booking->service->nama_service); ?></td>
            <td>Rp <?php echo e(number_format($t->total,0,',','.')); ?></td>
            <td>
                <span class="badge badge-<?php echo e($t->status_bayar); ?>">
                    <?php echo e($t->status_bayar === 'lunas' ? 'Lunas' : 'Belum Bayar'); ?>

                </span>
            </td>
            <td><?php echo e($t->metode_bayar ?? '-'); ?></td>
            <td>
                <?php if($t->status_bayar === 'belum_bayar'): ?>
                    <button onclick="openModal('bayar-<?php echo e($t->id); ?>')" class="btn btn-success btn-sm">Lunasi</button>
                <?php else: ?>
                    <small style="color:#888;"><?php echo e($t->dibayar_at?->format('d/m/Y H:i')); ?></small>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

<?php $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($t->status_bayar === 'belum_bayar'): ?>
<div id="bayar-<?php echo e($t->id); ?>" class="modal-overlay">
    <div class="modal-box">
        <button class="modal-close" onclick="closeModal('bayar-<?php echo e($t->id); ?>')">&times;</button>
        <div class="modal-title">Konfirmasi Pembayaran</div>
        <p style="margin-bottom:14px;font-size:0.9rem;">
            Pelanggan: <strong><?php echo e($t->booking->user->name); ?></strong><br>
            Service: <?php echo e($t->booking->service->nama_service); ?><br>
            Total: <strong style="color:#198754;">Rp <?php echo e(number_format($t->total,0,',','.')); ?></strong>
        </p>
        <form method="POST" action="<?php echo e(route('admin.transaksi.lunas', $t)); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>Metode Pembayaran</label>
                <select name="metode_bayar" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Tunai">Tunai</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Konfirmasi Lunas</button>
        </form>
    </div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\tekno-repair\resources\views/admin/transaksi/index.blade.php ENDPATH**/ ?>