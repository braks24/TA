<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<head>
<link rel="stylesheet" href="assets/css/login.css">
</head>
<div class="container">
<div class="row">
    <div class="col-7 ">
    <h1 class="mt-4">Admin Login</h1>
    <form action="admin/dashboard.php" method="post" class="mt-4">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
    <div class="col-5 mt-5">
        <img src="img/logo-jakarta.png" width="250px">
    </div>
</div>
</div>
<br>
<?php include 'includes/footer.php'; ?>
