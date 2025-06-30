<?php session_start();
include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gym System Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-login.css" />
    <link href="font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="font-awesome/css/all.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('https://wallpapercave.com/wp/wp5848739.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
        }

        #loginbox {
            background-color: rgba(0, 0, 0, 0.6); /* Transparent black */
            padding: 30px;
            border-radius: 15px;
            max-width: 400px;
            margin: 100px auto;
            box-shadow: 0 0 10px #000;
        }

        .control-group .main_input_box input {
            background: rgba(255, 255, 255, 0.9);
            color: #000;
        }

        .form-actions {
            margin-top: 20px;
        }

        .form-actions .btn {
            width: 100%;
        }

        .control-group.normal_text h3 img {
            max-width: 100px;
        }

        .pull-left, .pull-right {
            color: white;
            margin-top: 10px;
        }

        h6 {
            color: white;
        }
    </style>
</head>

<body>
    <br><br><br><br><br>
    <div id="loginbox">
        <form id="loginform" method="POST" class="form-vertical" action="">
            <div class="control-group normal_text">
                <h3><img src="img/icontest3.png" alt="Logo" /></h3>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lg"><i class="fas fa-user-circle"></i></span>
                        <input type="text" name="user" placeholder="Username" required />
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_ly"><i class="fas fa-lock"></i></span>
                        <input type="password" name="pass" placeholder="Password" required />
                    </div>
                </div>
            </div>
            <div class="form-actions center">
                <button type="submit" class="btn btn-block btn-large btn-info" title="Log In" name="login" value="Admin Login">Admin Login</button>
            </div>
        </form>

        <?php
        if (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($con, $_POST['user']);
            $password = mysqli_real_escape_string($con, $_POST['pass']);
            $password = md5($password);

            $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
            $row = mysqli_fetch_array($query);
            $num_row = mysqli_num_rows($query);

            if ($num_row > 0) {
                $_SESSION['user_id'] = $row['user_id'];
                header('location:admin/index.php');
            } else {
                echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                        Invalid Username and Password
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
            }
        }
        ?>

        <div class="pull-left">
            <a href="customer/index.php"><h6>Customer Login</h6></a>
        </div>
        <div class="pull-right">
            <a href="staff/index.php"><h6>Staff Login</h6></a>
        </div>
    </div>

    <!-- JS SCRIPTS -->
    <script src="js/jquery.min.js"></script>  
    <script src="js/matrix.login.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/matrix.js"></script>

    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery </title>
    
</head>
<body>
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


<style> /* Gallery Section */
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
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System - Reviews</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #2c3e50;
            color: white;
            border-radius: 8px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .reviews-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .review-card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .review-card:hover {
            transform: translateY(-5px);
        }

        .review-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .reviewer-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 3px solid #3498db;
        }

        .reviewer-info {
            flex-grow: 1;
        }

        .reviewer-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .review-date {
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .rating {
            color: #f39c12;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .review-content {
            line-height: 1.6;
            color: #555;
        }

        .review-stats {
            margin-top: 40px;
            text-align: center;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 8px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .stat-item {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: bold;
            color: #3498db;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 1rem;
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .reviews-container {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Member Reviews</h1>
        <p>See what our members say about their experience</p>
    </div>

    <div class="reviews-container">
        <!-- Review 1 -->
        <div class="review-card">
            <div class="review-header">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John D." class="reviewer-avatar">
                <div class="reviewer-info">
                    <div class="reviewer-name">Ritesh Londhe</div>
                    <div class="review-date">March 15, 2025</div>
                </div>
            </div>
            <div class="rating">★★★★★</div>
            <div class="review-content">
                "This gym has transformed my life! The trainers are knowledgeable and supportive. The equipment is top-notch and always well-maintained. I've lost 20 pounds in 3 months thanks to their personalized workout plans."
            </div>
        </div>

        <!-- Review 2 -->
        <div class="review-card">
            <div class="review-header">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah M." class="reviewer-avatar">
                <div class="reviewer-info">
                    <div class="reviewer-name">Arya Sinha</div>
                    <div class="review-date">April 2, 2025</div>
                </div>
            </div>
            <div class="rating">★★★★☆</div>
            <div class="review-content">
                "Great facility with excellent classes. The yoga instructor is phenomenal! Only reason for 4 stars is that it can get crowded during peak hours. But the management is always working to improve the experience."
            </div>
        </div>

        <!-- Review 3 -->
        <div class="review-card">
            <div class="review-header">
                <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Michael T." class="reviewer-avatar">
                <div class="reviewer-info">
                    <div class="reviewer-name">Piyush Pande</div>
                    <div class="review-date">March 10, 2025</div>
                </div>
            </div>
            <div class="rating">★★★★★</div>
            <div class="review-content">
                "Best gym in town! The staff remembers my name and always greets me with a smile. The 24/7 access is perfect for my schedule. I particularly love the sauna and recovery area after intense workouts."
            </div>
        </div>

        <!-- Review 4 -->
        <div class="review-card">
            <div class="review-header">
                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Emily R." class="reviewer-avatar">
                <div class="reviewer-info">
                    <div class="reviewer-name">Nyra Sharma</div>
                    <div class="review-date">March 28, 2025</div>
                </div>
            </div>
            <div class="rating">★★★★★</div>
            <div class="review-content">
                "I was nervous about joining a gym, but the welcoming atmosphere here made all the difference. The personal trainer helped me set realistic goals and the nutrition advice was spot on. My energy levels have never been higher!"
            </div>
        </div>

        <!-- Review 5 -->
        <div class="review-card">
            <div class="review-header">
                <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="David K." class="reviewer-avatar">
                <div class="reviewer-info">
                    <div class="reviewer-name">Pranav Bhosale</div>
                    <div class="review-date">May 2, 2025</div>
                </div>
            </div>
            <div class="rating">★★★★☆</div>
            <div class="review-content">
                "Excellent equipment selection and very clean facilities. The group classes are challenging but fun. Would love to see more parking options as that's sometimes an issue in the evenings."
            </div>
        </div>

        <!-- Review 6 -->
        <div class="review-card">
            <div class="review-header">
                <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Lisa P." class="reviewer-avatar">
                <div class="reviewer-info">
                    <div class="reviewer-name">Isha Joshi</div>
                    <div class="review-date">April 18, 2025</div>
                </div>
            </div>
            <div class="rating">★★★★★</div>
            <div class="review-content">
                "As a senior member, I appreciate how the trainers modify exercises for different fitness levels. The water aerobics class is my favorite! The locker rooms are always spotless and well-stocked."
            </div>
        </div>

        <!-- Review 7 -->
        <div class="review-card">
            <div class="review-header">
                <img src="https://randomuser.me/api/portraits/men/55.jpg" alt="Robert J." class="reviewer-avatar">
                <div class="reviewer-info">
                    <div class="reviewer-name">Tejas Sawant</div>
                    <div class="review-date">March 12, 2025</div>
                </div>
            </div>
            <div class="rating">★★★★★</div>
            <div class="review-content">
                "The best investment I've made in my health! The community here is amazing - everyone from members to staff is supportive. The app makes it easy to track workouts and schedule classes. Couldn't be happier!"
            </div>
        </div>
    </div>

    <div class="review-stats">
        <h2>Our Gym By The Numbers</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-value">4.2</div>
                <div class="stat-label">Average Rating</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">80%</div>
                <div class="stat-label">Member Retention</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">250+</div>
                <div class="stat-label">5-Star Reviews</div>
            </div>
        </div>
    </div>
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





