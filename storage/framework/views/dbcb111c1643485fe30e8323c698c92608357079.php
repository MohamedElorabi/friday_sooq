<?php $__env->startComponent('mail::message'); ?>

    # تواصل معنا


    <h3>الأسم : <?php echo e($data['name']); ?></h3>
    <h3>البريد الإلكترونى : <?php echo e($data['email']); ?></h3>
    <h3> عنوان الرسالة : <?php echo e($data['subject']); ?></h3>
    <h3>الرسالة : <?php echo e($data['massege']); ?></h3>


    شكرا<br>
    <?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/frdaysq/public_html/resources/views/site/emails/mail.blade.php ENDPATH**/ ?>