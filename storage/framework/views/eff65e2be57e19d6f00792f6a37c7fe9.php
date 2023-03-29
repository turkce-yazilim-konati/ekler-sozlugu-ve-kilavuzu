

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"> Ek Yığma Dizesi</h2>
        </div>
        <div class="card-body">

            <?php if(session('danger')): ?>
                <div class="alert alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                    <strong><?php echo e(__(session('danger'))); ?></strong>
                </div>
            <?php endif; ?>

            <?php if(session('info')): ?>
                <div class="alert alert-info">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#70a9ee" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#1170e4"/><path fill="#1170e4" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                    <strong><?php echo e(__(session('info'))); ?></strong>
                    
                </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                    <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" viewBox="0 0 24 24"><path fill="#13bfa6" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"/><path fill="#71d8c9" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"/></svg></span>
                    <strong><?php echo e(__(session('success'))); ?></strong>
                </div>
            <?php endif; ?>

            <?php if(auth()->guard()->check()): ?>
                <form action="<?php echo e(route('ek.ekle')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                      <label for="" class="form-label">Ek : </label>
                        <input type="text"  name="ek" id=""placeholder="">

                      <label for="" class="form-label">Not : </label>
                        <input type="text"  name="not" id=""placeholder="">

                      <label for="" class="form-label">Kaynak : </label>
                        <input type="text"  name="kaynak" id=""placeholder="Belirsiz ise boş bırakın">

                        <button type="submit"> Ekle</button>
                    </div>
                </form>
            <?php endif; ?>

           <div class="table-responsive">
            <table class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-primary">
                    <caption>Ek Yığma Dizesi</caption>
                    <tr>
                        <th>Sayı</th>
                        <th>Ek</th>
                        <th>Not ve Kaynak</th>
                        <th>Ekleyen</th>
                        <th>Onay</th>
                        <th>Güngen</th>
                        <?php if(auth()->guard()->check()): ?>
                            <th>İşlemler</th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $__currentLoopData = $ekler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ek): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="table-light" >
                                    <td scope="row"><?php echo e($ek->id); ?></td>
                                    <td> <?php echo e(strtolower($ek->ek)); ?></td>
                                    <td><?php echo e($ek->not); ?> <br> 
                                        <?php if($ek->kaynak != null): ?>
                                            Kaynak : <?php echo e($ek->kaynak); ?> 
                                        <?php endif; ?>
                                    </td>
                                    <td> <?php echo e($users->find($ek->ekleyen)->name); ?> </td>
                                    <td> <?php if($ek->aktif == 1): ?> Onaylı <?php else: ?> Onaysız <?php endif; ?> </td>
                                    <td> <?php echo e(date('d-m-Y h:i', strtotime($ek->created_at))); ?>  </td>

                                    <?php if($ek->ekleyen == $user->id || $user->isAuthority == 0): ?>
                                        <td>
                                            <a href="<?php echo e(route('Ekdizme.edit',$ek->id)); ?>" id="edit" class="btn btn-primary"> Değiştir </a> 
                                            <?php if($user->isAuthority == 0 && $ek->aktif == 0): ?>
                                                <a href="<?php echo e(route('Ekdizme.edit.onayla', $ek->id)); ?>" id="aktif" value="<?php echo e(1); ?>" class="btn btn-success"> Onayla </a> 
                                            <?php elseif($user->isAuthority == 0 && $ek->aktif == 1): ?>
                                                <a href="<?php echo e(route('Ekdizme.edit.onayla', $ek->id)); ?>" id="aktif" value="<?php echo e(0); ?>" class="btn btn-info"> Onaysıra </a> 
                                            <?php endif; ?>
                                        </td>
                                    <?php else: ?>
                                        <td>Bildir</td>
                                    <?php endif; ?>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
            </table>
           </div>
           
            


        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\yazilimkonati\resources\views/ekdizme.blade.php ENDPATH**/ ?>