<?php if(Session::has('success')): ?>
<script>
    Toastify({
    text: "<?php echo e(session::get('success')); ?>",
    duration: 3000,
    close:true,
    backgroundColor: "#4fbe87",
    }).showToast();
    </script>
<?php endif; ?>
<?php if(Session::has('error')): ?>
<script>
    Toastify({
    text: "<?php echo e(session::get('error')); ?>",
    duration: 3000,
    close:true,
    backgroundColor: "#4fbe87",
    }).showToast();
    </script>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\webphim\resources\views/components/alert.blade.php ENDPATH**/ ?>