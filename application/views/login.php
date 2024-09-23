<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>FORM LOGIN</h2>
        <?php if($this->session->flashdata('error')): ?>
            <div class="error-message"><?php echo $this->session->flashdata('error'); ?></div>
            <?php echo validation_errors(); ?>
        <?php endif; ?>
        <form action="<?php echo base_url() ?>auth/login_user" method="POST">
            <div class="input-group">
                <input type="text" name="email" placeholder="email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div class="button-group">
                <button type="submit" class="login-btn">Login</button>
                <button type="reset" class="cancel-btn">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>