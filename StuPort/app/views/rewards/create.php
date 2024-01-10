<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Rewards</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your custom CSS file here -->
    <style>
        /* Custom CSS for form styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .card-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: maroon; /* Maroon color for card title */
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button[type="submit"] {
            background-color: maroon; /* Maroon color for submit button */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #800000; /* Darker shade of maroon on hover */
        }
        .alert {
            margin-top: 10px;
            padding: 10px;
            background-color: #e74c3c;
            color: #fff;
            border-radius: 5px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title">Create Rewards</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/rewards/create" method="POST" enctype="multipart/form-data" id="rewardForm">
                    <div class="form-group">
                        <label for="badge_name" class="required">Badge Name</label>
                        <input type="text" name="badge_name" class="form-control" placeholder="Badge Name..." required />
                    </div>
                    <div class="form-group">
                        <label for="badge_description" class="required">Badge Description</label>
                        <textarea name="badge_description" class="form-control" placeholder="Badge Description..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="achievement_status" class="required">Achievement Status</label>
                        <input type="text" name="achievement_status" class="form-control" placeholder="Status..." required />
                    </div>
                    <div class="form-group">
                        <label for="badge_icon" class="required">Badge Icon</label>
                        <input type="file" name="badge_icon" class="form-control" accept="image/*" required />
                    </div>
                    <div class="form-group">
                        <label for="points_required" class="required">Points Required</label>
                        <input type="number" name="points_required" class="form-control" placeholder="Points Required..." required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <div class="alert" id="alertMessage">
                    Please fill in all fields before submitting the form.
                </div>
            </div>
        </div>
    </div>
    <script>
        // Client-side form validation using JavaScript
        const rewardForm = document.getElementById('rewardForm');
        const alertMessage = document.getElementById('alertMessage');

        rewardForm.addEventListener('submit', function (event) {
            const badgeName = document.querySelector('input[name="badge_name"]').value;
            const badgeDescription = document.querySelector('textarea[name="badge_description"]').value;
            const achievementStatus = document.querySelector('input[name="achievement_status"]').value;
            const badgeIcon = document.querySelector('input[name="badge_icon"]').value;
            const pointsRequired = document.querySelector('input[name="points_required"]').value;

            if (!badgeName || !badgeDescription || !achievementStatus || !badgeIcon || !pointsRequired) {
                event.preventDefault();
                alertMessage.style.display = 'block';
            }
        });
    </script>
</body>
</html>
