<?php $__env->startSection('content'); ?>
  <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo e($posts->judul); ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on 
                            <?php echo e(strftime("%A, %d %B %Y",strtotime($posts->created_at))); ?> 
                            by <?php echo e($posts->penulis); ?>

                            </div>
                            <!-- Post categories-->
                            <?php if(!empty($posts->kategori->nama)): ?>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo e($posts->kategori->nama); ?></a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                            <?php else: ?>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">null</a>
                            <?php endif; ?>    
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo e(asset($posts->gambar)); ?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?php echo $posts->konten; ?></p>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form action="<?php echo e(route('main.store')); ?>" method="POST" class="mb-4">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="artikel_id" value="<?php echo e($posts->id); ?>">
                                    <textarea class="form-control <?php $__errorArgs = ['konten'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="konten" value="<?php echo e(old('konten')); ?>" rows="3"></textarea>
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
                                    <div class="form-grup mt-2">   
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-send"></i> Kirim</button>
                                    </div>
                                </form>

                                <!-- Comment with nested comments-->
                                <?php $__currentLoopData = $posts->komentar()->orderBy('created_at','DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-circle" src="<?php echo e(asset($item->user->avatar)); ?>" height="60" alt="..." />
                                    </div>
                                    <div class="ms-3">
                                        <div class="fw-bold"><?php echo e($item->user->name); ?></div>
                                        <?php echo $item->konten; ?>

                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogs\resources\views/single.blade.php ENDPATH**/ ?>