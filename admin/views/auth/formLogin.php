<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Website bán nước hoa nam </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Bootstrap and FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom Styles for Luxury Theme -->
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Source Sans Pro', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .login-page {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1200px;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-box {
            width: 400px;
            padding: 40px;
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
        }

        .card-header .h1 {
            font-weight: bold;
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: none;
            border: 1px solid #ddd;
        }

        .input-group-text {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #FFD700;
            border-color: #FFD700;
            color: #333;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #FFC107;
            border-color: #FFC107;
        }

        .login-box-msg {
            color: #666;
        }

        .right-side {
            width: 500px;
            height: 100%;
            background: url('https://your-image-url-here.jpg') no-repeat center center;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.4);
position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .brand-text {
            position: absolute;
            bottom: 30px;
            left: 30px;
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
            z-index: 10;
        }
    </style>
</head>

<body>
    <div class="login-page">
        <!-- Login Form Section -->
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="./assets/index2.html" class="h1">Nước hoa nam Luxury</a>
                </div>
                <div class="card-body">
                    <?php if(isset($_SESSION['error'])) { ?>
                        <p class="text-danger login-box-msg"><?= $_SESSION['error']?></p>
                    <?php } else { ?>
                        <p class="login-box-msg">Welcome back! Please log in to access the admin dashboard.</p>
                    <?php } ?>
                    
                    <form action="<?= BASE_URL_ADMIN .'?act=check-login-admin' ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                            </div>
                        </div>
                    </form>
                    <p class="mb-1">
                        <a href="#">Forgot your password?</a>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Right Image Section with Overlay -->
        <div class="right-side">
            <div class="overlay"></div>
            <div class="brand-text"></div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
​
