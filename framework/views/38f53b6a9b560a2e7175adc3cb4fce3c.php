<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    
    <?php if (isset($component)) { $__componentOriginalf1722bea0e5ede7c78239a4c71984c53 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf1722bea0e5ede7c78239a4c71984c53 = $attributes; } ?>
<?php $component = App\View\Components\AdminHeader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminHeader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf1722bea0e5ede7c78239a4c71984c53)): ?>
<?php $attributes = $__attributesOriginalf1722bea0e5ede7c78239a4c71984c53; ?>
<?php unset($__attributesOriginalf1722bea0e5ede7c78239a4c71984c53); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf1722bea0e5ede7c78239a4c71984c53)): ?>
<?php $component = $__componentOriginalf1722bea0e5ede7c78239a4c71984c53; ?>
<?php unset($__componentOriginalf1722bea0e5ede7c78239a4c71984c53); ?>
<?php endif; ?>
    
</head>

<body>
    <div id="layout-wrapper">
        
        <?php if (isset($component)) { $__componentOriginalec6b0940b981aec7453f768a1110aa81 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalec6b0940b981aec7453f768a1110aa81 = $attributes; } ?>
<?php $component = App\View\Components\AdminNavbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminNavbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalec6b0940b981aec7453f768a1110aa81)): ?>
<?php $attributes = $__attributesOriginalec6b0940b981aec7453f768a1110aa81; ?>
<?php unset($__attributesOriginalec6b0940b981aec7453f768a1110aa81); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalec6b0940b981aec7453f768a1110aa81)): ?>
<?php $component = $__componentOriginalec6b0940b981aec7453f768a1110aa81; ?>
<?php unset($__componentOriginalec6b0940b981aec7453f768a1110aa81); ?>
<?php endif; ?>
        
        
        <?php if (isset($component)) { $__componentOriginal5dbcd2c5f624951ffc95c729c55bdb11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5dbcd2c5f624951ffc95c729c55bdb11 = $attributes; } ?>
<?php $component = App\View\Components\AdminSidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5dbcd2c5f624951ffc95c729c55bdb11)): ?>
<?php $attributes = $__attributesOriginal5dbcd2c5f624951ffc95c729c55bdb11; ?>
<?php unset($__attributesOriginal5dbcd2c5f624951ffc95c729c55bdb11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5dbcd2c5f624951ffc95c729c55bdb11)): ?>
<?php $component = $__componentOriginal5dbcd2c5f624951ffc95c729c55bdb11; ?>
<?php unset($__componentOriginal5dbcd2c5f624951ffc95c729c55bdb11); ?>
<?php endif; ?>
        
        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                <?php echo $__env->yieldContent('main-content'); ?>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © ibexstack.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Developed By: Admin
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <?php if (isset($component)) { $__componentOriginal4c5bbc9a2d53d24d7188884ff0365c23 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4c5bbc9a2d53d24d7188884ff0365c23 = $attributes; } ?>
<?php $component = App\View\Components\AdminFooter::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AdminFooter::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4c5bbc9a2d53d24d7188884ff0365c23)): ?>
<?php $attributes = $__attributesOriginal4c5bbc9a2d53d24d7188884ff0365c23; ?>
<?php unset($__attributesOriginal4c5bbc9a2d53d24d7188884ff0365c23); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4c5bbc9a2d53d24d7188884ff0365c23)): ?>
<?php $component = $__componentOriginal4c5bbc9a2d53d24d7188884ff0365c23; ?>
<?php unset($__componentOriginal4c5bbc9a2d53d24d7188884ff0365c23); ?>
<?php endif; ?>
        
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\channdi\resources\views/layouts/app_admin.blade.php ENDPATH**/ ?>