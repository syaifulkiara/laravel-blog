

<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
    Kategori
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Kategori</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Buat Kategori</h3>
        </div>
        <div class="box-body">
          <form action="<?php echo e(route('kategori.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nama')); ?>">
              <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback" role="alert">
                  <strong class="text-danger"><?php echo e($message); ?></strong>
              </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('keterangan')); ?>" name="keterangan" rows="3"></textarea>
              <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback" role="alert">
                  <strong class="text-danger"><?php echo e($message); ?></strong>
              </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-fw fa-send-o"></i> Buat Categori</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-9">
      <div class="box box-warning">
        <div class="box-body">
          <table id="categories" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Slug</th>
                <th>Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="text-primary">
                <td><?php echo e($item->nama); ?></td>
                <td><?php echo e($item->keterangan); ?></td>
                <td><?php echo e($item->slug); ?></td>
                <td><?php echo e(Carbon\Carbon::parse($item->created_at)->format('d-M-Y')); ?></td>
                <td>
                  <form action="<?php echo e(route('kategori.destroy',$item->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <a href="<?php echo e(route('kategori.edit', $item->id)); ?>" class="btn btn-warning btn-sm">Ubah</a>
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin Mau Dhapus')">Hapus</button>
                  </form> 
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>    
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('themes/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('themes/back/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
<script>
  $(function () {
    $('#categories').DataTable()
  })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogs\resources\views/kategori/index.blade.php ENDPATH**/ ?>