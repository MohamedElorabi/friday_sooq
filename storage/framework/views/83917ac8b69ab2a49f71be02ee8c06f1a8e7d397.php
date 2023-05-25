    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="<?php echo e(asset('wb/js/owl.carousel.min.js')); ?>"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="<?php echo e(asset('wb/js/fa-pro.js')); ?>"></script>
    <script src="<?php echo e(asset('wb/js/main.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('custom-scripts'); ?>

    <script>
        $(() => {
            var alertToast = document.getElementById('alertToast');
            if (alertToast) {
                var toast = new bootstrap.Toast(alertToast);
                toast.show();
            }
        })
    </script>
<?php /**PATH /home/frdaysq/public_html/resources/views/site/partials/scripts.blade.php ENDPATH**/ ?>