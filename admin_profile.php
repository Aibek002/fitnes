<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Profile</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

    .card {
        margin-bottom: 20px;
    }
</style>
</head>
<body>

<div class="container">
    <h1 class="text-center mb-4">Admin Panel</h1>
    <div class="row">
        <!-- User Management Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User Management</h5>
                    <p class="card-text">Create, edit, and delete user accounts.</p>
                    <a href="/admin-user-edit.php" class="btn btn-primary">Manage Users</a>
                </div>
            </div>
        </div>
        <!-- Content Management Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Content Management</h5>
                    <p class="card-text">Add, edit, and delete articles, posts, and other content.</p>
                    <a href="/admin-manage-content.php" class="btn btn-primary">Manage Content</a>
                </div>
            </div>
        </div>

        <!-- Analytics Card -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Feedback</h5>
                    <p class="card-text">View website user's feedback .</p>
                    <a href="admin-users-feedback.php" class="btn btn-primary">View Feedback</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Support Service</h5>
                    <p class="card-text">Add, edit, and delete supports service</p>
                    <a href="/admin-manage-content.php" class="btn btn-primary">Manage Content</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
