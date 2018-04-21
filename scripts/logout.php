<?php session_start();session_destroy(); ?>
<!-- TODO: Add cookies when session is created and then remove them here to 
prevent users from trying to access dashboard after logged out -->
<?php echo "<script>location.href = '../index.php';</script>"; ?>