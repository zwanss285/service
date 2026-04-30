
<?php $__env->startSection('title', 'Kelola Mekanik'); ?>
<?php $__env->startSection('content'); ?>
<div class="page-title">Kelola Mekanik</div>
<div style="margin-bottom:16px;">
    <button onclick="openModal('modal-tambah')" class="btn btn-primary">+ Tambah Mekanik</button>
</div>
<div class="card">
    <table>
        <thead><tr><th>Nama</th><th>Email</th><th>Telepon</th><th>Total Tugas</th><th>Bergabung</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $mekaniks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><strong><?php echo e($m->name); ?></strong></td>
            <td><?php echo e($m->email); ?></td>
            <td><?php echo e($m->telepon ?? '-'); ?></td>
            <td><?php echo e($m->tugas_mekanik_count); ?></td>
            <td><?php echo e($m->created_at->format('d/m/Y')); ?></td>
            <td>
                <form method="POST" action="<?php echo e(route('admin.mekanik.destroy', $m)); ?>" onsubmit="return confirm('Hapus mekanik ini?')">
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
        <div class="modal-title">Tambah Mekanik</div>
        <form method="POST" action="<?php echo e(route('admin.mekanik.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group"><label>Nama</label><input type="text" name="name" class="form-control" required></div>
            <div class="form-group"><label>Email</label><input type="email" name="email" class="form-control" required></div>
            <div class="form-group"><label>Password</label><input type="password" name="password" class="form-control" required></div>
            <div class="form-group"><label>Telepon</label><input type="text" name="telepon" class="form-control"></div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\tekno-repair\resources\views/admin/mekanik/index.blade.php ENDPATH**/ ?>