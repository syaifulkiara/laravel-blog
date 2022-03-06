

<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
    Komentar
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Komentar</li>
  </ol>
</section>

<section class="content">
  <div class="box box-info">
    <div class="box-body">
      <div class="table-responsive">
        <table id="komentar" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Penulis</th>
              <th>Komentar</th>
              <th>Hapus</th>
              <th>Artikel</th>
              <th>Waktu</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $komentars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-primary">
              <td>
                <div>
                    <img src="<?php echo e(asset($item->user->avatar)); ?>" class="img-circle" width="50">
                </div>
                </td>
              <td><?php echo Str::limit($item->konten,100); ?>...</td>
              <td>
                  <form action="<?php echo e(route('komentar.destroy',$item->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin Mau Dhapus')"><i class="fa fa-trash"></i></button>
                  </form> 
                </td>
              <?php if(!empty($item->artikel->judul)): ?>
              <td>
                <a href="<?php echo e(route('artikel.show', $item->artikel_id)); ?>" title="<?php echo e($item->artikel_id); ?>">
                  <?php echo Str::limit($item->artikel->judul); ?>..
                </a>
              </td>
               <?php else: ?>
                <td class="text-danger"><i>Tidak Tersedia / Dihapus</i></td>
                <?php endif; ?>
              <td><?php echo e(Carbon\Carbon::parse($item->created_at)->format('d-M-Y')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
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
    $('#komentar').DataTable()
  })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogs\resources\views/komentar/index.blade.php ENDPATH**/ ?>