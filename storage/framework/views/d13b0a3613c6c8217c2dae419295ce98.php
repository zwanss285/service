
<?php $__env->startSection('title', 'Jenis Service'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-title">Jenis Service</div>
<div style="margin-bottom:16px;">
    <button onclick="openModal('modal-tambah')" class="btn btn-primary">+ Tambah Service</button>
</div>
<div class="card">
    <table>
        <thead><tr><th>Nama Service</th><th>Harga</th><th>Estimasi</th><th>Status</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><strong><?php echo e($s->nama_service); ?></strong><br><small style="color:#888;"><?php echo e($s->deskripsi); ?></small></td>
            <td>Rp <?php echo e(number_format($s->harga,0,',','.')); ?></td>
            <td><?php echo e($s->estimasi_jam); ?> jam</td>
            <td><span class="badge <?php echo e($s->aktif ? 'badge-selesai' : 'badge-dibatalkan'); ?>"><?php echo e($s->aktif ? 'Aktif' : 'Nonaktif'); ?></span></td>
            <td style="display:flex;gap:6px;">
                <button onclick="openModal('edit-<?php echo e($s->id); ?>')" class="btn btn-warning btn-sm">Edit</button>
                <form method="POST" action="<?php echo e(route('admin.service.destroy', $s)); ?>" onsubmit="return confirm('Hapus service ini?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div id="modal-tambah" class="modal-overlay">
    <div class="modal-box">
        <button class="modal-close" onclick="closeModal('modal-tambah')">&times;</button>
        <div class="modal-title">Tambah Service</div>
        <form method="POST" action="<?php echo e(route('admin.service.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group"><label>Nama Service</label><input type="text" name="nama_service" class="form-control" required></div>
            <div class="form-row">
                <div class="form-group"><label>Harga (Rp)</label><input type="number" name="harga" class="form-control" required></div>
                <div class="form-group"><label>Estimasi (jam)</label><input type="number" name="estimasi_jam" class="form-control" value="1" required></div>
            </div>
            <div class="form-group"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" rows="2"></textarea></div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="edit-<?php echo e($s->id); ?>" class="modal-overlay">
    <div class="modal-box">
        <button class="modal-close" onclick="closeModal('edit-<?php echo e($s->id); ?>')">&times;</button>
        <div class="modal-title">Edit Service</div>
        <form method="POST" action="<?php echo e(route('admin.service.update', $s)); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div class="form-group"><label>Nama Service</label><input type="text" name="nama_service" class="form-control" value="<?php echo e($s->nama_service); ?>" required></div>
            <div class="form-row">
                <div class="form-group"><label>Harga</label><input type="number" name="harga" class="form-control" value="<?php echo e($s->harga); ?>" required></div>
                <div class="form-group"><label>Estimasi (jam)</label><input type="number" name="estimasi_jam" class="form-control" value="<?php echo e($s->estimasi_jam); ?>" required></div>
            </div>
            <div class="form-group"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" rows="2"><?php echo e($s->deskripsi); ?></textarea></div>
            <div class="form-group">
                <label>Status</label>
                <select name="aktif" class="form-control">
                    <option value="1" <?php echo e($s->aktif ? 'selected' : ''); ?>>Aktif</option>
                    <option value="0" <?php echo e(!$s->aktif ? 'selected' : ''); ?>>Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\tekno-repair\resources\views/admin/service/index.blade.php ENDPATH**/ ?>