<?php
session_start();
include('dbcon.php');

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = md5(mysqli_real_escape_string($con, $_POST['pass']));

    $query = mysqli_query($con, "SELECT * FROM staffs WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['user_id'] = $row['user_id'];
        header('Location: staff-pages/index.php');
        exit();
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gym Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Login Section */
        .login-section {
            background: url('https://wallpapercave.com/wp/wp5848739.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 10px;
            color: white;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #f8f9fa;
        }

        .login-container input {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            margin-bottom: 20px;
        }

        .login-container input:focus {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            box-shadow: none;
        }

        .login-container input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .btn-login {
            background: #ff6b6b;
            border: none;
            padding: 12px;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #ff5252;
            transform: translateY(-2px);
        }

        .alert {
            margin-top: 20px;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 60px 20px;
            background-color: #fff;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
            color: #333;
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: #ff6b6b;
            margin: 15px auto;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 250px;
        }

        .gallery-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover .gallery-img {
            transform: scale(1.1);
        }

        .img-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .img-overlay {
            opacity: 1;
        }

        .zoom-icon {
            color: white;
            font-size: 2rem;
        }
    </style>
</head>
<body>
    <!-- Login Section -->
    <section class="login-section">
        <div class="login-container">
            <h2><i class="fas fa-dumbbell"></i> Staff Login</h2>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="form-group">
                    <input type="text" name="user" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="pass" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" name="login" class="btn btn-login btn-block">Login</button>
            </form>
            <br>
           
            <!-- Add this where you want the back button to appear -->

        </div>
        <?php
// Your existing PHP code at the top
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your existing head content -->
    <style>
        .back-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Add this button at the beginning of your body -->
    <a href="javascript:history.back()" class="btn btn-primary back-btn">
        <i class="fas fa-arrow-left"></i> Back
    </a>

    <!-- Rest of your existing content -->
</body>
</html>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <h2 class="section-title">Our Gym Gallery</h2>
        <div class="gallery-grid">
            <!-- Image 1 -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Gym Equipment" class="gallery-img">
                <div class="img-overlay">
                    <i class="fas fa-search-plus zoom-icon"></i>
                </div>
            </div>
            
            <!-- Image 2 -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1534258936925-c58bed479fcb?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Weight Training" class="gallery-img">
                <div class="img-overlay">
                    <i class="fas fa-search-plus zoom-icon"></i>
                </div>
            </div>
            
            <!-- Image 3 -->
            <div class="gallery-item">
                <img src="https://wallpapercave.com/wp/wp2483079.jpg" alt="Cardio Machines" class="gallery-img">
                <div class="img-overlay">
                    <i class="fas fa-search-plus zoom-icon"></i>
                </div>
            </div>
            
            <!-- Image 4 -->
            <div class="gallery-item">
                <img src="https://wallpaper-mania.com/wp-content/uploads/2018/09/High_resolution_wallpaper_background_ID_77701952342-1024x640.jpg" alt="Personal Training" class="gallery-img">
                <div class="img-overlay">
                    <i class="fas fa-search-plus zoom-icon"></i>
                </div>
            </div>
            
            <!-- Image 5 -->
            <div class="gallery-item">
                <img src="https://thaka.bing.com/th/id/OIP.alhvcwHLXzhv3Ihk0E2qRwHaE7?cb=iwp1&rs=1&pid=ImgDetMain" alt="Group Class" class="gallery-img">
                <div class="img-overlay">
                    <i class="fas fa-search-plus zoom-icon"></i>
                </div>
            </div>
            
            <!-- Image 6 -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Fitness Assessment" class="gallery-img">
                <div class="img-overlay">
                    <i class="fas fa-search-plus zoom-icon"></i>
                </div>
            </div>
            
            <!-- Image 7 -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Yoga Class" class="gallery-img">
                <div class="img-overlay">
                    <i class="fas fa-search-plus zoom-icon"></i>
                </div>
            </div>
            
            <!-- Image 8 -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Weight Lifting" class="gallery-img">
                <div class="img-overlay">
                    <i class="fas fa-search-plus zoom-icon"></i>
                </div>
            </div>
            
            <!-- Image 9 -->
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1576678927484-cc907957088c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Boxing Training" class="gallery-img">
                <div class="img-overlay">
                    <i class="fas fa-search-plus zoom-icon"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple animation for gallery items
        $(document).ready(function() {
            $('.gallery-item').each(function(i) {
                $(this).delay(i * 100).animate({
                    opacity: 1
                }, 400);
            });
        });
    </script>
</body>

<!-- Footer Section -->
<footer class="footer">
  <div class="footer-content">
    <p>&copy; 2025 Perfect GYM Club. All rights reserved.</p>
    <p>5021 Yewalewadi, Sinhagad Road, Pune</p>
   
  </div>
</footer>


<style> 
   .footer {
  background-color: #222;
  color: #eee;
  text-align: center;
  padding: 20px 10px;
  font-family: Arial, sans-serif;
  font-size: 14px;
}

.footer a {
  color: #00bcd4;
  text-decoration: none;
}

.footer a:hover {
  text-decoration: underline;
}


</style>

</html>