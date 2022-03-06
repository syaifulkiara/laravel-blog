

<?php $__env->startSection('content'); ?>
<section class="content-header">
  <a href="<?php echo e(route('artikel.index')); ?>" class="btn btn-success btn-sm"><i class="fa fa-backward"></i></a>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Pratinjau Artikel</li>
  </ol>
</section>
<section class="content">
  <div class="box box-warning">
    <div class="box-header with-border">
      <div class="user-block">
        <img class="img-circle" src="<?php echo e(asset('themes/back/dist/img/user1-128x128.jpg')); ?>" alt="User Image">
        <span class="username"><a href="#"><?php echo e($artikels->judul); ?></a></span>
        <span class="description"><?php echo e(strtoupper($artikels->kategori->nama)); ?>  - <?php echo e(Carbon\Carbon::parse($artikels->created_at)->diffForHumans()); ?></span>
      </div>
    </div>
    <div class="box-body">
      <img class="img-responsive pad" src="<?php echo e(asset($artikels->gambar)); ?>" alt="Photo">
      <p><?php echo $artikels->konten; ?></p>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
      <span class="pull-right text-muted"><b><?php echo e($artikels->komentar->count()); ?></b> komentar</span>
    </div>
    <div class="box-footer box-comments">
      <?php $__currentLoopData = $artikels->komentar()->orderBy('created_at','DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="box-comment">
        <img class="img-circle img-sm" src="<?php echo e(asset($item->user->avatar)); ?>" alt="User Image">
        <div class="comment-text">
          <span class="username">
            <?php echo e($item->user->name); ?>

            <span class="text-muted pull-right"><?php echo e(Carbon\Carbon::parse($item->created_at)->diffForHumans()); ?></span>
          </span>
          <?php echo $item->konten; ?>

        </div>
      </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="box-footer">
      <form action="<?php echo e(route('komentar.store')); ?>" method="POST" class="form-horizontal">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="artikel_id" value="<?php echo e($artikels->id); ?>">
        <div class="form-group margin-bottom-none">
          <div class="col-sm-9">
            <input class="form-control input-sm <?php $__errorArgs = ['konten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="konten" value="<?php echo e(old('konten')); ?>" placeholder="Komentar">
              <?php $__errorArgs = ['konten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <strong class="text-danger"><?php echo e($message); ?></strong>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-success pull-right btn-block btn-sm"><i class="fa fa-fw fa-send-o"></i> Kirim</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogs\resources\views/artikel/show.blade.php ENDPATH**/ ?>