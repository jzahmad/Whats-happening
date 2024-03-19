<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>What's Happening - Single Post</title>
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
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
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
          <ul>
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <span
                    class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="post.php">Login</a></li>
                  <li><a href="login.php?logout=true">Logout</a></li>
                </ul>
              </li>
            <?php else: ?>
              <li><a href="login.php">Login</a></li>
            <?php endif; ?>
          </ul>
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

    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">

            <!-- ======= Single Post Content ======= -->
            <?php
            include_once 'serverlogin.php';

            $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

            if ($connection->connect_error) {
              die("Connection failed: " . $connection->connect_error);
            }

            if (isset($_REQUEST['EventID'])) {
              $event_id = $_REQUEST['EventID'];

              // Query to fetch event details along with group and event type information
              $query = "SELECT Events.*, Groups.GroupName, Groups.ContactName, Groups.ContactEmail, EventTypes.EventType 
                          FROM Events 
                          INNER JOIN Groups ON Events.GroupID = Groups.GroupID
                          INNER JOIN EventTypes ON Events.EventTypeID = EventTypes.EventTypeID 
                          WHERE EventID = $event_id";

              $result = mysqli_query($connection, $query);

              if (mysqli_num_rows($result) > 0) {
                $event = mysqli_fetch_assoc($result);

                echo '<div class="single-post">    
                    <div class="post-meta"><strong>' . $event['EventType'] . ' <span class="mx-1">&bullet;</span> Date: ' . date('D d M, Y', strtotime($event['EventDate'])) . ' TIME: ' . date('h:i a', strtotime($event['EventDate'])) . '</strong></div>
                    <h1 class="mt-3 mb-5"><strong>' . $event['EventTitle'] . '</strong></h1>
                          <h2 class="mb-2"><strong>Organizer: ' . $event['GroupName'] . '</strong></h2>
                          <h3 class="mt-2 mb-5">(Contact ' . $event['ContactName'] . ' at ' . $event['ContactEmail'] . ' for more info)</h3>
                          <p><span class="firstcharacter">' . substr($event['EventDesc'], 0, 1) . '</span>' . substr($event['EventDesc'], 1) . '</p>
                          <br>
                          <figure class="my-4">
                            <img src="' . $event['EventImage'] . '" alt="" class="img-fluid">
                          </figure>
                        </div>';
              } else {
                // If no event found with the provided ID
                echo '<p>No event found with the provided ID.</p>';
              }
            } else {
              // If event ID is not provided in the query string
              echo '<p>Event ID is not provided.</p>';
            }
            ?>

            <!-- ======= Comments ======= -->
            <div class="comments">
              <h5 class="comment-title py-4">2 Comments</h5>
              <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="assets/img/person-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">Jordan Singer</h6>
                    <span class="text-muted">2d</span>
                  </div>
                  <div class="comment-body">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non minima ipsum at amet doloremque qui
                    magni, placeat deserunt pariatur itaque laudantium impedit aliquam eligendi repellendus excepturi
                    quibusdam nobis esse accusantium.
                  </div>

                  <div class="comment-replies bg-light p-3 mt-3 rounded">
                    <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                    <div class="reply d-flex mb-4">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">Brandon Smith</h6>
                          <span class="text-muted">2d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
                    <div class="reply d-flex">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-3.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">James Parsons</h6>
                          <span class="text-muted">1d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente,
                          praesentium.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comment d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="assets/img/person-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-shrink-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex">
                    <h6 class="me-2">Santiago Roberts</h6>
                    <span class="text-muted">4d</span>
                  </div>
                  <div class="comment-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto laborum in corrupti dolorum, quas
                    delectus nobis porro accusantium molestias sequi.
                  </div>
                </div>
              </div>
            </div><!-- End Comments -->

            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">

              <div class="col-lg-12">
                <h5 class="comment-title">Leave a Comment</h5>
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label for="comment-name">Name</label>
                    <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label for="comment-email">Email</label>
                    <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
                  </div>
                  <div class="col-12 mb-3">
                    <label for="comment-message">Message</label>

                    <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30"
                      rows="10"></textarea>
                  </div>
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="Post comment">
                  </div>
                </div>
              </div>
            </div><!-- End Comments Form -->

          </div>

          <div class="col-md-3">
            <!-- ======= left Side bar ======= -->
            <div class="aside-block">

              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular"
                    aria-selected="true">Upcoming</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending"
                    aria-selected="false">Latest Added</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <?php
                include_once 'serverlogin.php';

                $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                if ($connection->connect_error) {
                  die("Connection failed: " . $connection->connect_error);
                }

                // upcoming
                $happeningSoonQuery = "SELECT e.*, et.EventType, c.ContactName 
                    FROM events e 
                    JOIN eventtypes et ON e.EventTypeID = et.EventTypeID 
                    JOIN groups c ON e.GroupID = c.GroupID 
                    WHERE e.EventDate >= CURDATE() 
                    ORDER BY e.EventDate ASC";

                $happeningSoonResult = mysqli_query($connection, $happeningSoonQuery);

                if ($happeningSoonResult) {
                  echo '<div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">';
                  while ($happeningSoonEvent = mysqli_fetch_assoc($happeningSoonResult)) {
                    echo '<div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">' . $happeningSoonEvent['EventType'] . '</span> <span class="mx-1">&bullet;</span>
                    <span>' . $happeningSoonEvent['EventDate'] . '</span>
                </div>
                <h2 class="mb-2"><a href="#">' . $happeningSoonEvent['EventTitle'] . '</a></h2>
                <span class="author mb-3 d-block">' . $happeningSoonEvent['ContactName'] . '</span>
            </div>';
                  }
                  echo '</div>';
                } else {
                  echo "Error: " . mysqli_error($connection);
                }

                // Latest Added
                $latestEventQuery = "
                                  SELECT e.*, et.EventType, c.ContactName 
                                  FROM events e 
                                  JOIN eventtypes et ON e.EventTypeID = et.EventTypeID 
                                  JOIN groups c ON e.GroupID = c.GroupID 
                                  ORDER BY e.SubmitDate DESC
                                  ";

                $latestEventResult = mysqli_query($connection, $latestEventQuery);

                if ($latestEventResult) {
                  echo '<div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">';
                  while ($latestEvent = mysqli_fetch_assoc($latestEventResult)) {
                    echo '<div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date">' . $latestEvent['EventType'] . '</span> <span class="mx-1">&bullet;</span>
                    <span>' . $latestEvent['EventDate'] . '</span>
                </div>
                <h2 class="mb-2"><a href="#">' . $latestEvent['EventTitle'] . '</a></h2>
                <span class="author mb-3 d-block">' . $latestEvent['ContactName'] . '</span>
            </div>';
                  }
                  echo '</div>';
                } else {
                  echo "Error: " . mysqli_error($connection);
                }

                // Close the database connection
                mysqli_close($connection);
                ?>

              </div>
            </div>
            <div class="aside-block">
              <h3 class="aside-title">Categories</h3>
              <ul class="aside-links list-unstyled">
                <li><a href="events.php?category=All">All events</a></li>
                <li><a href="events.php?category=Music">Music</a></li>
                <li><a href="events.php?category=Art+Culture">Art + Culture</a></li>
                <li><a href="events.php?category=Sport">Sport</a></li>
                <li><a href="events.php?category=Food">Food</a></li>
                <li><a href="events.php?category=Fund+Raiser">Fund Raiser</a></li>
              </ul>
            </div><!-- End Categories -->

            <div class="aside-block">
              <h3 class="aside-title">Tags</h3>
              <ul class="aside-tags list-unstyled">
                <li><a href="events.php?category=All">All events</a></li>
                <li><a href="events.php?category=Music">Music</a></li>
                <li><a href="events.php?category=Art+Culture">Art + Culture</a></li>
                <li><a href="events.php?category=Sport">Sport</a></li>
                <li><a href="events.php?category=Food">Food</a></li>
                <li><a href="events.php?category=Fund+Raiser">Fund Raiser</a></li>
              </ul>
            </div><!-- End Tags -->
            <!-- ======= left Side bar ======= -->
          </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">About What's Happening</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti
              voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid
              blanditiis omnis quae. Explicabo?</p>
            <p><a href="about.php" class="footer-link-more">Learn More</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
              <li><a href="events.php"><i class="bi bi-chevron-right"></i> Events</a></li>
              <li><a href="groups.php"><i class="bi bi-chevron-right"></i>Community Groups</a></li>
              <li><a href="about.php"><i class="bi bi-chevron-right"></i> About</a></li>
              <li><a href="post.php"><i class="bi bi-chevron-right"></i> Post Event</a></li>
              <li><a href="login.php"><i class="bi bi-chevron-right"></i> Login</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Events</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="events.php?category=All">All events</a></li>
              <li><a href="events.php?category=Music">Music</a></li>
              <li><a href="events.php?category=Art+Culture">Art + Culture</a></li>
              <li><a href="events.php?category=Sport">Sport</a></li>
              <li><a href="events.php?category=Food">Food</a></li>
              <li><a href="events.php?category=Fund+Raiser">Fund Raiser</a></li>
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