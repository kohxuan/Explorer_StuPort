<?php
require APPROOT . '/views/includes/head.php';
?>

<div class="navbar">
    <?php
    require APPROOT . '/views/includes/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Register</h2>

        <form
            id="register-form"
            method="POST"
            action="<?php echo URLROOT; ?>/users/register"
        >
            <input type="text" placeholder="Username *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>

            <input type="email" placeholder="Email *" name="email">
            <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>

            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirm Password *" name="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>

            <label for="userRole">User Role:</label>
            <select id="userRole" name="userRole">
                <option value="Student" <?php echo ($data['userRole'] == 'Student') ? 'selected' : ''; ?>>Student</option>
                <option value="Administrator" <?php echo ($data['userRole'] == 'Administrator') ? 'selected' : ''; ?>>Administrator</option>
                <option value="Master Administrator" <?php echo ($data['userRole'] == 'Master Administrator') ? 'selected' : ''; ?>>Master Administrator</option>
            </select>
            <span class="invalidFeedback"><?php echo $data['userRoleError']; ?></span>

            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Not registered yet? <a href="<?php echo URLROOT; ?>/users/login">Login here</a></p>
        </form>
    </div>
</div>
