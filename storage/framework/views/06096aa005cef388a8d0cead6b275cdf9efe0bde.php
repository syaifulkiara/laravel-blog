

<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
    Halaman
   <a href="<?php echo e(route('halaman.create')); ?>" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Buat Halaman</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Halaman</li>
  </ol>
</section>
    
<section class="content">
      <div class="box box-warning">
        <div class="box-body">
          <table id="halamans" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Judul</th>
                <th>Dibuat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $halamans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="text-primary">
                <td><?php echo e($item->judul); ?></a></td>
                <td><?php echo e(Carbon\Carbon::parse($item->created_at)->format('d-M-Y')); ?></td>
                <td>
                  <form action="<?php echo e(route('halaman.destroy',$item->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <a href="<?php echo e(route('halaman.show', $item->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="<?php echo e(route('halaman.edit', $item->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin Mau Dhapus')"><i class="fa fa-trash"></i></button>
                  </form> 
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
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
    $('#halamans').DataTable()
  })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogs\resources\views/halaman/index.blade.php ENDPATH**/ ?>