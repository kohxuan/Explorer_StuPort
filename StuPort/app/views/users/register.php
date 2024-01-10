<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .registration-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
        }

        .invalid-feedback {
            color: #ff0000;
            font-size: 14px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="registration-form">
        <h2>Registration Form</h2>
        <form action="<?php echo URLROOT . "/users/register" ?>" method="post">
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

                        <label for="user_role">User Role:</label>
                        <select id="user_role" name="user_role">
                            <option value="Student" <?php echo ($data['user_role'] == 'Student') ? 'selected' : ''; ?>>Student</option>
                            <option value="Lecturer" <?php echo ($data['user_role'] == 'Lecturer') ? 'selected' : ''; ?>>Lecturer</option>
                        </select>

                        <span class="invalidFeedback">
                            <?php echo isset($data['userRoleError']) ? $data['userRoleError'] : ''; ?>
                        </span>
                    </td>
                    <td>
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

            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
        <a href="<?php echo URLROOT; ?>/users/login" class="link-primary">Back to Login</a>
    </div>
</body>
</html>
