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

            <input type="text" placeholder="Full Name *" name="full_name">
            <span class="invalidFeedback">
                <?php echo $data['fullNameError']; ?>
            </span>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="Male" <?php echo ($data['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($data['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select>
            <span class="invalidFeedback">
                <?php echo $data['genderError']; ?>
            </span>

            <input type="number" placeholder="Age *" name="age">
            <span class="invalidFeedback">
                <?php echo $data['ageError']; ?>
            </span>

            <input type="hidden" name="user_role" value="Student">

            <span class="invalidFeedback">
                <?php echo isset($data['userRoleError']) ? $data['userRoleError'] : ''; ?>
            </span>

            <input type="password" placeholder="Password *" name="password">
            <span class="invalidFeedback">
                <?php echo $data['passwordError']; ?>
            </span>

            <input type="password" placeholder="Confirm Password *" name="confirmPassword">
            <span class="invalidFeedback">
                <?php echo $data['confirmPasswordError']; ?>
            </span>

            <input type="text" placeholder="Address *" name="address">
            <span class="invalidFeedback">
                <?php echo $data['addressError']; ?>
            </span>

            <input type="text" placeholder="Course *" name="course">
            <span class="invalidFeedback">
                <?php echo $data['courseError']; ?>
            </span>


            <input type="text" placeholder="Institution *" name="institution">
            <span class="invalidFeedback">
               
            </span>

            <input type="number" placeholder="Telephone *" name="telephone">
            <span class="invalidFeedback">
               
            </span>

            <input type="text" placeholder="Race *" name="race">
            <span class="invalidFeedback">
              
            </span>


            <button id="submit" type="submit" value="submit">Submit</button>

            <p class="options">Not registered yet?<a href="<?php echo URLROOT; ?>/users/login">Login here</a></p>
        </form>
    </div>
</div>
