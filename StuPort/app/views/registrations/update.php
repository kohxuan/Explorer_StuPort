<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 20px;
        }
        .form-control, .form-select {
            margin-bottom: 15px;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Update Registration</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/registrations/update/<?php echo $data['registrations']->activity_id ?>" method="POST">
                <div class="form-group">
                    <label for="activity_id" class="form-label">Activity ID</label>
                    <input type="text" name="activity_id" class="form-control" value="<?php echo $data['registrations']->activity_id ?>" readonly>
                </div>
                    <div class="form-group">
                        <label for="link" class="form-label">Link</label>
                        <textarea name="link" class="form-control" required><?php echo $data['registrations']->link; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" <?php echo $data['registrations']->status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="confirmed" <?php echo $data['registrations']->status == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="cancelled" <?php echo $data['registrations']->status == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary font-weight-bold">Update</button>
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
