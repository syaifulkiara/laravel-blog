

<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>Ubah Artikel</h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Ubah Artikel</li>
  </ol>
</section>
<section class="content">
  <div class="card-body">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <div class="box-body">
            <div class="col-md-9">
              <form action="<?php echo e(route('artikel.update', $artikels->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                  <input type="text" class="form-control <?php $__errorArgs = ['judul'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="judul" value="<?php echo e($artikels->judul); ?>" placeholder="Judul Artikel">
                  <?php $__errorArgs = ['judul'];
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
                <div class="form-group">
                  <textarea class="form-control <?php $__errorArgs = ['konten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="konten" id="editor1"><?php echo e($artikels->konten); ?></textarea>
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
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-send-o"></i> Simpan</button>
                  <a href="<?php echo e(route('artikel.index')); ?>" class="btn btn-danger"> Batal</a>
                </div>
                <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" name="gambar" id="image" class="form-control">
                  <?php $__errorArgs = ['image'];
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
                <a href="#" class="thumbnail">
                  <img id="preview-image-before-upload" src="<?php echo e(asset($artikels->gambar)); ?>">
                </a>
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control" name="kategori_id">
                      <option value="">--Pilih Category--</option>
                      <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($item->id); ?>" <?php echo e(old('kategori_id', $artikels->kategori_id) == $item->id ? 'selected' : ''); ?>><?php echo e(ucfirst($item->nama)); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('themes/back/bower_components/ckeditor/ckeditor.js')); ?>"></script>
<script>
  $(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('editor1')
//bootstrap WYSIHTML5 - text editor
$('.textarea1').wysihtml5()
})
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>      
$(document).ready(function (e) {  
   $('#image').change(function(){           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]);   
   });  
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogs\resources\views/artikel/edit.blade.php ENDPATH**/ ?>