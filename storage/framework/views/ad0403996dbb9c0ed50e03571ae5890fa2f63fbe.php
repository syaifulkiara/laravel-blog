

<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Selamat Datang &nbsp;  <b class="text-success"> <?php echo e(Auth::user()->name); ?></b></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>
    
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo e($artikel->count()); ?></h3>

              <p>Artikel</p>
            </div>
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <a href="" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo e($kategori->count()); ?></h3>

              <p>Kategori</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder-open"></i>
            </div>
            <a href="" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo e($user->count()); ?></h3>

              <p>User</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo e($komentar->count()); ?></h3>

              <p>Komentar</p>
            </div>
            <div class="icon">
              <i class="fa fa-comments-o"></i>
            </div>
            <a href="<?php echo e(route('komentar.index')); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo e($halamans->count()); ?></h3>

              <p>Halaman</p>
            </div>
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <a href="<?php echo e(route('halaman.index')); ?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
       <?php if(Auth::user()->is_admin === 1): ?>
      <div class="row">
        <!-- Left col -->
        <div class="col-md-7">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Artikel Terbaru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
               <table id="categories" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Gambar</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="text-primary">
                <td><a href="<?php echo e(route('artikel.show', $item->id)); ?>"><?php echo e($item->judul); ?></a></td>
                <?php if(!empty($item->kategori->nama)): ?>
                <td><?php echo e($item->kategori->nama); ?></td>
                <?php else: ?>
                <td class="text-danger"><i>no_category</i></td>
                <?php endif; ?>
                <td><img src="<?php echo e(asset($item->gambar)); ?>" height="80"></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo e(route('artikel.create')); ?>" class="btn btn-sm btn-success btn-flat pull-left"><i class="fa fa-fw fa-send-o"></i> Buat Artikel Baru</a>
              <a href="<?php echo e(route('artikel.index')); ?>" class="btn btn-sm btn-default btn-flat pull-right">Selengkapnya..</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-5">
          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Komentar Terbaru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php $__currentLoopData = $komentars->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo e(asset($item->user->avatar)); ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="" class="text-success"><b><?php echo e($item->user->name); ?></b></a><br/>
                    <?php if(!empty($item->artikel->judul)): ?>
                    <a href="" class="product-title"><?php echo Str::limit($item->artikel->judul); ?>..
                      <span class="label label-warning pull-right">
                        <?php echo e(Carbon\Carbon::parse($item->created_at)->format('d-M-Y')); ?>

                      </span>
                    </a>
                    <?php else: ?>
                    <td class="text-danger"><i>Artikel Tidak Tersedia / Dihapus</i></td>
                    <?php endif; ?>
                    <span class="product-description">
                          <?php echo $item->konten; ?>

                        </span>
                  </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="<?php echo e(route('komentar.index')); ?>" class="uppercase">Selengkapnya</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
       <?php endif; ?>
    </section>
    <!-- /.content -->
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

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogs\resources\views/home.blade.php ENDPATH**/ ?>