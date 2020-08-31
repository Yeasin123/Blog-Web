 <?php
    include "admin/inc/db.php";
?>

<?php
    // Get the Total Number of Row
    $total_page = $db->query('SELECT * FROM post')->num_rows; 

    // Page Number ( Ternery Condition )
    $page = isset( $_GET['page'] ) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    // Each page Data
    $num_result_per_page = 3;

    if ( $stmt = $db->prepare('SELECT * FROM post ORDER BY id LIMIT ?, ?') ){
        $cal_page = ($page-1) * $num_result_per_page;
        $stmt->bind_param('ii', $cal_page, $num_result_per_page);
        $stmt->execute();
        // FEtch All Data
        $result = $stmt->get_result();
    }

?>


    
        <div class="col-md-12 text-center" style="padding: 35px 0; margin-left: 500px;">
                    <!-- Pagination Start -->

                        <?php if ( ceil( $total_page / $num_result_per_page ) > 0 ) : ?>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">

                            <?php if ( $page > 1 ): ?>
                                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page-1; ?>">Previous</a></li>
                            <?php else: ?>
                                <li class="page-item disabled"><a class="page-link disabled" href="">Previous</a></li>
                            <?php endif; ?>







                            <?php if ( $page > 3 ): ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=1">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="">...</a>
                                </li>
                            <?php endif; ?>

                            <!-- Previous 2 Page Button Start -->
                            <?php if ( $page-2 > 0 ): ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=<?php echo $page-2 ?>"><?php echo $page-2; ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if ( $page-1 > 0 ): ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=<?php echo $page-1 ?>"><?php echo $page-1; ?></a>
                                </li>
                            <?php endif; ?>
                            <!-- Previous 2 Page Button End -->


                            <!-- Current Page Start -->
                            <li class="page-item active"><a class="page-link" href="index.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                            <!-- Current Page End -->

                            <!-- Next 2 Page Button Start -->

                            <?php if ( $page+1 < ceil( $total_page / $num_result_per_page ) + 1 ): ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=<?php echo $page+1 ?>"><?php echo $page+1; ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if ( $page+2 < ceil( $total_page / $num_result_per_page ) + 2 ): ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=<?php echo $page+2 ?>"><?php echo $page+2; ?></a>
                                </li>
                            <?php endif; ?>
                            <!-- Next 2 Page Button End -->


                            <?php if ( $page < ceil( $total_page / $num_result_per_page )-2 ): ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=1">...</a>
                                </li>
                            <?php endif; ?>








                            <?php if ( $page < ceil( $total_page / $num_result_per_page ) ) : ?>
                                <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page+1; ?>">Next</a></li>
                            <?php else: ?>
                                <li class="page-item disabled"><a class="page-link disabled" href="">Next</a></li>
                            <?php endif; ?>


                          </ul>
                        </nav>
                    <?php endif; ?>
                    <!-- Pagination End -->
                
                </div>
   


    <!-- :::::::::: Footer Section Start :::::::: -->
    <footer>
        <!-- Footer Widget Section Start -->
        <div class="footer-widget background-img section">
            <div class="container">
                <div class="row">

                    <!-- Footer Widget One Start-->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Blue</span> Chip</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum has been the</p>
                        <!-- Social Media -->
                        <div class="widget-title">
                            <h4><span>Social</span> Media</h4>
                        </div>

                        <div class="social-media">
                            <ul>
                                <li>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget One End-->

                    <!-- Footer Widget Two Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Useful</span> Links</h4>
                        </div>
                        <div class="useful-links">
                            <ul>
                                <li><a href="">About Us</a></li>
                                <li><a href="">Portfolio</a></li>
                                <li><a href="">Pages</a></li>
                                <li><a href="">FAQ</a></li>
                                <li><a href="">Terms of Use</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Two End -->

                    <!-- Footer Widget Three Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Contact</span> With Us</h4>
                        </div>
                        <div class="contact-with-us">
                            <ul>
                                <li>
                                    <a><i class="fa fa-home"></i>7/H, Banani, Dhaka-1213</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-envelope-o"></i>example@yourdomain.com</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-fax"></i>+880 123 456 789</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-phone"></i>+880 123 456 789</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-clock-o"></i>9.00 am - 5.00 pm</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Three End -->

                    <!-- Footer Widget Four Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Subscribe</span> Here</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                        <!-- Subscribe From Start -->
                        <form action="" method="">
                            <div class="form-group ">
                                <input type="email" name="email" placeholder="Enter Your Email" autocomplete="off" class="form-input" required="required">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <!-- Subscribe Button -->
                            <div class="">
                                <button type="submit" class="btn-main"><i class="fa fa-paper-plane-o"></i> Subscribe</button>
                            </div>
                        </form>
                        <!-- Subscribe From End -->
                    </div>
                    <!-- Footer Widget Four End -->

                </div>
            </div>
        </div>
        <!-- Footer Widget Section End -->


        <!-- CopyRight Section Start -->
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <!-- Copyright Left Content -->
                    <div class="col-md-6">
                        <p><a href="">Theme Express</a> © 2018 All rights reserved. Terms of use and Privacy Policy</p>
                    </div>

                    <!-- Copyright Right Footer Menu Start -->
                    <div class="col-md-6">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="">About</a></li>
                                <li><a href="">FAQ</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Copyright Right Footer Menu End -->
                </div>
            </div>
        </div>
        <!-- CopyRight Section End -->
    </footer>
    <!-- ::::::::::: Footer Section End ::::::::: -->


    <!-- JQuery Library File -->
    <script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script-->

    <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!-- Isotop JS -->
    <script src="assets/js/isotop.min.js"></script>

    <!-- Fency Box JS -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

    <!-- Easy Pie Chart JS -->
    <script src="assets/js/jquery.easypiechart.js"></script>

    <!-- JQuery CounterUp JS -->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

    <!-- BlueChip Extarnal Script -->
    <script type="text/javascript" src="assets/js/main.js"></script>

    <?php ob_end_flush();?>

  </body>
</html>