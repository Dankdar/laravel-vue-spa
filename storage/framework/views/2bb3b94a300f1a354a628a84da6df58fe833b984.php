<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(config('app.name')); ?></title>
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="<?php echo e(asset('img/icons/apple-touch-icon.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('/manifest.json')); ?>">
    <link href="<?php echo e(mix('css/app.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body class="antialiased">
    <div id="app" class="min-h-screen bg-gradient-to-r from-violet-500 to-fuchsia-400"></div>
</body>

</html><?php /**PATH C:\Users\HP\laravel-vue-spa\laravel-vue-spa\resources\views/app.blade.php ENDPATH**/ ?>