<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>What's Happening - Contact</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="assets/css/variables.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
    <?php
    session_start();
    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
                <h1>What's Happening</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown"><a href="events.php"><span>Events</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="events.php?category=All">All events</a></li>
                            <li><a href="events.php?category=Music">Music</a></li>
                            <li><a href="events.php?category=Art+Culture">Art + Culture</a></li>
                            <li><a href="events.php?category=Sport">Sport</a></li>
                            <li><a href="events.php?category=Food">Food</a></li>
                            <li><a href="events.php?category=Fund+Raiser">Fund Raiser</a></li>
                        </ul>
                    </li>
                    <li><a href="groups.php">Community Groups</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="post.php">Post Event</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav><!-- .navbar -->

            <div class="position-relative">
                <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
                <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
                <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

                <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
                <i class="bi bi-list mobile-nav-toggle"></i>

                <!-- ======= Search Form ======= -->
                <div class="search-form-wrap js-search-form-wrap">
                    <form action="search-result.html" class="search-form">
                        <span class="icon bi-search"></span>
                        <input type="text" placeholder="Search" class="form-control">
                        <button class="btn js-search-close"><span class="bi-x"></span></button>
                    </form>
                </div><!-- End Search Form -->

            </div>

        </div>

    </header><!-- End Header -->

    <main id="main">
        <section id="contact" class="contact mb-5">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h1 class="page-title">Create Account</h1>
                    </div>
                </div>
                <div class="form mt-5">
                    <form method="post" action="createAccount.php">
                        <h5>Tell us about your group:</h5>
                        <input type="text" name="gname" class="form-control mb-3" placeholder="Your Community Group"
                            required>
                        <input type="text" class="form-control mb-3" name="gtype"
                            placeholder="What type of group are you?" required>
                        <input type="text" class="form-control mb-3" name="cname"
                            placeholder="Provide a contact name of your group" required>
                        <input type="text" class="form-control mb-3" name="cemail"
                            placeholder="Provide a contact email of your group" required>
                        <input type="text" class="form-control mb-3" name="iname" placeholder="Group Image name"
                            required>
                        <textarea class="form-control mb-3" name="gdesc" rows="5" placeholder="Tell us about your group"
                            required></textarea>
                        <h5>Create Account</h5>
                        <input type="text" name="username" class="form-control mb-3" placeholder="Create a Username"
                            required>
                        <input type="text" class="form-control mb-3" name="password" placeholder="Create a Password"
                            required>
                        <div class="text-center"><input class="btn btn-dark" type="submit" /></div>
                    </form>
                </div>
                <?php
                include_once 'serverlogin.php';

                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $groupName = $_POST['gname'];
                    $groupType = $_POST['gtype'];
                    $contactName = $_POST['cname'];
                    $contactEmail = $_POST['cemail'];
                    $imageName = $_POST['iname'];
                    $groupDescription = $_POST['gdesc'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // The code to insert data into the 'Groups' table
                    $stmt = $conn->prepare("INSERT INTO Groups (GroupName, GroupType, ContactName, ContactEmail, GroupImage, GroupDesc) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssss", $groupName, $groupType, $contactName, $contactEmail, $imageName, $groupDescription);
                    $stmt->execute();
                    $groupid = $conn->insert_id;

                    // The code to insert data into the 'login' table
                    $stmt_1 = $conn->prepare("INSERT INTO login (GroupID, Username, Password) VALUES (?, ?, ?)");
                    $stmt_1->bind_param("iss", $groupid, $username, $password);
                    $stmt_1->execute();

                    // Close statements
                    $stmt->close();
                    $stmt_1->close();

                    // Close connection
                    $conn->close();
                }
                ?>

                <!-- End post part -->
        </section>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-content">
            <div class="container">

                <div class="row g-5">
                    <div class="col-lg-4">
                        <h3 class="footer-heading">About What's Happening</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem
                            deleniti
                            voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui
                            aliquid
                            blanditiis omnis quae. Explicabo?</p>
                        <p><a href="about.php" class="footer-link-more">Learn More</a></p>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h3 class="footer-heading">Navigation</h3>
                        <ul class="footer-links list-unstyled">
                            <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
                            <li><a href="events.php"><i class="bi bi-chevron-right"></i> Events</a></li>
                            <li><a href="groups.php"><i class="bi bi-chevron-right"></i>Community Groups</a></li>
                            <li><a href="about.php"><i class="bi bi-chevron-right"></i>About</a></li>
                            <li><a href="post.php"><i class="bi bi-chevron-right"></i>Post Event</a></li>
                            <li><a href="login.php"><i class="bi bi-chevron-right"></i>Login</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2">
                        <h3 class="footer-heading">Events</h3>
                        <ul class="footer-links list-unstyled">
                            <li><a href="events.php?category=All" class="bi bi-chevron-right">All events</a></li>
                            <li><a href="events.php?category=Music" class="bi bi-chevron-right">Music</a></li>
                            <li><a href="events.php?category=Art+Culture" class="bi bi-chevron-right">Art + Culture</a>
                            </li>
                            <li><a href="events.php?category=Sport" class="bi bi-chevron-right">Sport</a></li>
                            <li><a href="events.php?category=Food" class="bi bi-chevron-right">Food</a></li>
                            <li><a href="events.php?category=Fund+Raiser" class="bi bi-chevron-right">Fund Raiser</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-legal">
            <div class="container">

                <div class="row justify-content-between">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <div class="copyright">
                            © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </footer>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>