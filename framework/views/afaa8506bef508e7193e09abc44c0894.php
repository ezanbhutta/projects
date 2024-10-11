<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    
    <?php if (isset($component)) { $__componentOriginal55c5c0d6227082fc04cf7a03ee0e576c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal55c5c0d6227082fc04cf7a03ee0e576c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal55c5c0d6227082fc04cf7a03ee0e576c)): ?>
<?php $attributes = $__attributesOriginal55c5c0d6227082fc04cf7a03ee0e576c; ?>
<?php unset($__attributesOriginal55c5c0d6227082fc04cf7a03ee0e576c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal55c5c0d6227082fc04cf7a03ee0e576c)): ?>
<?php $component = $__componentOriginal55c5c0d6227082fc04cf7a03ee0e576c; ?>
<?php unset($__componentOriginal55c5c0d6227082fc04cf7a03ee0e576c); ?>
<?php endif; ?>
    <style>
        <style>.custom-cart-quantity {
            text-align: center;
        }

        .custom-product-quantity {
            display: flex;
            align-items: center;
        }

        .custom-cart-minus,
        .custom-cart-plus {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custom-cart-minus svg,
        .custom-cart-plus svg {
            fill: #333;
            pointer-events: none;
            /* Prevents clicking on the SVG itself */
        }

        .custom-cart-input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 0 5px;
            padding: 5px;
            font-size: 14px;
            line-height: 1.5;
        }

        .custom-cart-minus:hover,
        .custom-cart-plus:hover {
            background-color: #e0e0e0;
        }

        .custom-cart-minus:active,
        .custom-cart-plus:active {
            background-color: #d0d0d0;
        }
    </style>

    </style>
</head>

<body>
    
    <?php if (isset($component)) { $__componentOriginal6a5b028d56427635ed7bca89932da026 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6a5b028d56427635ed7bca89932da026 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6a5b028d56427635ed7bca89932da026)): ?>
<?php $attributes = $__attributesOriginal6a5b028d56427635ed7bca89932da026; ?>
<?php unset($__attributesOriginal6a5b028d56427635ed7bca89932da026); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6a5b028d56427635ed7bca89932da026)): ?>
<?php $component = $__componentOriginal6a5b028d56427635ed7bca89932da026; ?>
<?php unset($__componentOriginal6a5b028d56427635ed7bca89932da026); ?>
<?php endif; ?>
    
    
    <?php echo $__env->yieldContent('main'); ?>
    
    
    <?php if (isset($component)) { $__componentOriginal4a6ce960a9fb9d93e9f59e3428207bcc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4a6ce960a9fb9d93e9f59e3428207bcc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4a6ce960a9fb9d93e9f59e3428207bcc)): ?>
<?php $attributes = $__attributesOriginal4a6ce960a9fb9d93e9f59e3428207bcc; ?>
<?php unset($__attributesOriginal4a6ce960a9fb9d93e9f59e3428207bcc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4a6ce960a9fb9d93e9f59e3428207bcc)): ?>
<?php $component = $__componentOriginal4a6ce960a9fb9d93e9f59e3428207bcc; ?>
<?php unset($__componentOriginal4a6ce960a9fb9d93e9f59e3428207bcc); ?>
<?php endif; ?>
    
</body>

</html>
<?php /**PATH C:\xampp\htdocs\channdi\resources\views/layouts/app.blade.php ENDPATH**/ ?>