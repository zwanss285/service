
<?php $__env->startSection('title', 'Kelola Barang'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-title">Kelola Barang</div>
<div style="margin-bottom:16px;">
    <button onclick="openModal('modal-tambah')" class="btn btn-primary">+ Tambah Barang</button>
</div>
<div class="card">
    <table>
        <thead><tr><th>Kode</th><th>Nama Barang</th><th>Stok</th><th>Satuan</th><th>Harga</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><code><?php echo e($b->kode_barang); ?></code></td>
            <td><?php echo e($b->nama_barang); ?></td>
            <td><?php echo e($b->stok); ?></td>
            <td><?php echo e($b->satuan); ?></td>
            <td>Rp <?php echo e(number_format($b->harga,0,',','.')); ?></td>
            <td style="display:flex;gap:6px;">
                <button onclick="openModal('edit-<?php echo e($b->id); ?>')" class="btn btn-warning btn-sm">Edit</button>
                <form method="POST" action="<?php echo e(route('admin.barang.destroy', $b)); ?>" onsubmit="return confirm('Hapus barang ini?')">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<div id="modal-tambah" class="modal-overlay">
    <div class="modal-box">
        <button class="modal-close" onclick="closeModal('modal-tambah')">&times;</button>
        <div class="modal-title">Tambah Barang</div>
        <form method="POST" action="<?php echo e(route('admin.barang.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-row">
                <div class="form-group"><label>Nama Barang</label><input type="text" name="nama_barang" class="form-control" required></div>
                <div class="form-group"><label>Kode Barang</label><input type="text" name="kode_barang" class="form-control" required></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Stok</label><input type="number" name="stok" class="form-control" value="0" required></div>
                <div class="form-group"><label>Satuan</label><input type="text" name="satuan" class="form-control" value="pcs" required></div>
            </div>
            <div class="form-group"><label>Harga (Rp)</label><input type="number" name="harga" class="form-control" required></div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="edit-<?php echo e($b->id); ?>" class="modal-overlay">
    <div class="modal-box">
        <button class="modal-close" onclick="closeModal('edit-<?php echo e($b->id); ?>')">&times;</button>
        <div class="modal-title">Edit Barang</div>
        <form method="POST" action="<?php echo e(route('admin.barang.update', $b)); ?>">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div class="form-group"><label>Nama Barang</label><input type="text" name="nama_barang" class="form-control" value="<?php echo e($b->nama_barang); ?>" required></div>
            <div class="form-row">
                <div class="form-group"><label>Stok</label><input type="number" name="stok" class="form-control" value="<?php echo e($b->stok); ?>" required></div>
                <div class="form-group"><label>Satuan</label><input type="text" name="satuan" class="form-control" value="<?php echo e($b->satuan); ?>" required></div>
            </div>
            <div class="form-group"><label>Harga</label><input type="number" name="harga" class="form-control" value="<?php echo e($b->harga); ?>" required></div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\tekno-repair\resources\views/admin/barang/index.blade.php ENDPATH**/ ?>