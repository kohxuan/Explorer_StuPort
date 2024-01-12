<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration here !</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gagalin&display=swap">
    <style>
        body {
            font-family: 'Gagalin', sans-serif;
            background-color: #7C1C2B;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .centered-word {
            color: darkred;
            text-align: center;
            /* Center the text within h2 */
        }

        .registration-form {
            background-color: #FCBD32;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 800px;
            margin: auto;
            /* Add this line for centering */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            width: 45%;

        }

        input,
        select {
            width: calc(75% - 1px);
            /* Adjust width for two columns with a small gap */
            padding: 10px;
            margin-bottom: 10px;
            border: 3px solid #183D64;
            border-radius: 50px;
            box-sizing: border-box;
            display: inline-block;
            /* Display inline for side-by-side arrangement */
        }

        select {
            appearance: none;
        }

        .invalid-feedback {
            color: #ff0000;
            font-size: 14px;
        }

        button {
            background-color: #7C1C2B;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            /* Make the button full width */
            display: block;
            /* Display block for full width */
        }

        button:hover {
            background-color: #7C1C2B;
        }
    </style>
</head>

<body>
    <div class="registration-form">
        <br>
        <h2 class="centered-word"><img src="https://i.ibb.co/7byWKRt/youth-venture-logo.png" alt="youth-venture-logo " style="height: 80px; margin-right: 10px;">
            </br>
            Registration Here !</h2>

<center>
        <form action="<?php echo URLROOT . "/users/register" ?>" method="post">
            <label for="text">Username:</label>
            <input type="text" placeholder="Username *" name="username">
            <span class="invalidFeedback">
                <?php echo $data['usernameError']; ?>
            </span>

            <label for="email"> Email:</label>
            <input type="email" placeholder="Email *" name="email">
            <span class="invalidFeedback">
                <?php echo $data['emailError']; ?>
            </span>


            <label for="text">Full Name:</label>
            <input type="text" placeholder="Full Name *" name="full_name">
            <span class="invalidFeedback">
                <?php echo $data['fullNameError']; ?>
            </span>

            <label for="user_role">User Role:</label>
            <select id="user_role" name="user_role">
                <option value="Student" <?php echo ($data['user_role'] == 'Student') ? 'selected' : ''; ?>>Student</option>
                <option value="Lecturer" <?php echo ($data['user_role'] == 'Lecturer') ? 'selected' : ''; ?>>Lecturer</option>
            </select>

            <span class="invalidFeedback">
                <?php echo isset($data['userRoleError']) ? $data['userRoleError'] : ''; ?>
            </span>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="Male" <?php echo ($data['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($data['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select>
            <span class="invalidFeedback">
                <?php echo $data['genderError']; ?>
            </span>

            <label for="age">Age:</label>
            <input type="number" placeholder="Age *" name="age">
            <span class="invalidFeedback">
                <?php echo $data['ageError']; ?>
            </span>

            </td>


            <td>

                <label for="password">Password:</label>
                <input type="password" placeholder="Password *" name="password">
                <span class="invalidFeedback">
                    <?php echo $data['passwordError']; ?>
                </span>

                <label for="password">Confirm Password:</label>
                <input type="password" placeholder="Confirm Password *" name="confirmPassword">
                <span class="invalidFeedback">
                    <?php echo $data['confirmPasswordError']; ?>
                </span>

                <label for="text">Address:</label>
                <input type="text" placeholder="Address *" name="address">
                <span class="invalidFeedback">
                    <?php echo $data['addressError']; ?>
                </span>

                <label for="text">Course:</label>
                <input type="text" placeholder="Course *" name="course">
                <span class="invalidFeedback">
                    <?php echo $data['courseError']; ?>
                </span>

                <label for="text">Institution:</label>
                <input type="text" placeholder="Institution *" name="institution">
                <span class="invalidFeedback">

                </span>

                <label for="number">Telephone:</label>
                <input type="number" placeholder="Telephone *" name="telephone">
                <span class="invalidFeedback">

                </span>

                <label for="text">Race:</label>
                <input type="text" placeholder="Race *" name="race">
                <span class="invalidFeedback">

                    <div class="form-group">
                        <button type="submit">Register</button>
                    </div>
        </form>
        </center>
        <a href="<?php echo URLROOT; ?>/users/login" class="link-primary">Back to Login</a>
    </div>
</body>

</html>