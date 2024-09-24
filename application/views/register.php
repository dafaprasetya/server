<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open('auth/register_user'); ?>

    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>">
    </p>

    <p>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>">
    </p>

    <p>
        <label for="password">Password:</label>
        <input type="password" name="password">
    </p>

    <p>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password">
    </p>

    <p>
        <button type="submit">Register</button>
    </p>

    <?php echo form_close(); ?>
</body>
</html>