<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
<style>
    .container {
        margin-top: 20px;
    }
    .form-control, .form-select {
        margin-bottom: 15px;
        border-color: #183D64; /* Blue border for form elements */
    }
    .btn-primary {
        background-color: #7C1C2B; /* Red button */
        border-color: #7C1C2B; /* Red border for buttons */
    }
    .btn-primary:hover {
        background-color: darken(#7C1C2B, 10%); /* Slightly darker red on hover */
    }
    /* Additional custom styles can be added here */
</style>

</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Create Registration</h3>
                <div class="card-toolbar">
                    <?php if(isLoggedIn()): ?>
                        <a href="<?php echo URLROOT;?>/registrations" class="btn btn-secondary">Manage Registration</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/registrations/create" method="POST">
                    <div class="mb-3">
                        <label for="activity_id" class="form-label">Activity ID</label>
                        <input type="text" name="activity_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" name="link" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user_notes" class="form-label">User Notes</label>
                        <textarea name="user_notes" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
