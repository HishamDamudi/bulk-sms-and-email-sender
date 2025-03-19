<?php include("db_connect.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Message Sender</title>
    <link rel="icon" type="image/x-icon" href="logo.png">
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templ.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">


</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                  
                    <img src="logo.png" alt="" style="width: 90px; height: 80px; border-radius: 50%; ">
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Browse Topics</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">How it works</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_4">FAQs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Contact</a>
                        </li>

                     
                    </ul>

                  
                </div>
            </div>
        </nav>


        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">Upload. Select. Submit</h1>

                        <h6 class="text-center">platform for messaging</h6>
                    </div>

                </div>
            </div>
        </section>


        <section class="featured-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="custom-block custom-block-overlay">
                            <div class="d-flex flex-column h-100">
                                <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">

                                <div class="custom-block-overlay-text d-flex">
                                    <div>
                                        <h5 class="text-white mb-2">Form</h5>

                                        <?php
                                        if (isset($_SESSION['upload_message'])) {
                                            echo '<p id="upload-message">' . htmlspecialchars($_SESSION['upload_message']) . '</p>';
                                            // Unset the session variable to clear the message
                                            unset($_SESSION['upload_message']);
                                        }
                                        ?>


                                        
                                        <div class="form-container">
                                            <form action="upload_excel.php" method="post" enctype="multipart/form-data">
                                              
                                                <label for="excelFile" class="custom-file-upload">
                                                    Upload a file
                                                </label>
                                                <input type="file" id="excelFile" name="excelFile" accept=".xls, .xlsx, .csv" class="file-input" onchange="updateFileName()">


                                                <br>
                                                <span id="file-name" style="color: white;"></span><br> <br>
                                                <div class="radio-container">
                                                    <label class="radio-label" for="option1">SMS</label>
                                                    <input type="radio" id="sms" name="operation" value="sms">
                                                    <br>
                                                    <br>
                                                    <label class="radio-label" for="option2">Email</label>
                                                    <input type="radio" id="email" name="operation" value="email" checked>
                                                </div>
                                                <br>
                                                <input type="submit" value="Submit" class="submit-button">
                                            </form>
                                        </div>
                                        <!-- form end -->
                                     
                                    </div>

                                    <span class="badge bg-finance rounded-pill ms-auto">✅</span>
                                </div>

                                
                                <div class="section-overlay"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="explore-section section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="mb-4">Browse Topics</h1>
                    </div>

                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="design-tab" data-bs-toggle="tab" data-bs-target="#design-tab-pane" type="button" role="tab" aria-controls="design-tab-pane" aria-selected="true">Email</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="marketing-tab" data-bs-toggle="tab" data-bs-target="#marketing-tab-pane" type="button" role="tab" aria-controls="marketing-tab-pane" aria-selected="false">SMS</button>
                        </li>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                        <div class="custom-block bg-white shadow-lg">
                                            <a href="topics-detail.html">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">Email</h5>

                                                        <p class="mb-0">We will send email by reading your excel</p>
                                                    </div>

                                                    <span class="badge bg-design rounded-pill ms-auto">✉</span>
                                                </div>

                                                <img src="images/topics/undraw_Remote_design_team_re_urdx.png" class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel" aria-labelledby="marketing-tab" tabindex="0">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-3">
                                        <div class="custom-block bg-white shadow-lg">
                                            <a href="topics-detail.html">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">SMS</h5>

                                                        <p class="mb-0">We will send sms by reading your data from
                                                            excel.</p>
                                                    </div>

                                                    <span class="badge bg-advertising rounded-pill ms-auto">✆</span>
                                                </div>

                                                <img src="images/topics/undraw_online_ad_re_ol62.png" class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>


        <section class="timeline-section section-padding" id="section_3">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">How does it work?</h1>
                    </div>

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="timeline-container">
                            <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                <div class="list-progress">
                                    <div class="inner"></div>
                                </div>

                                <li>
                                    <h4 class="text-white mb-3">Upload your csv Excel File</h4>

                                    <p class="text-white">Select your csv File Make sure your columns heading are :id,
                                        name, roll no, phone number, email and message</p>

                                    <div class="icon-holder">
                                        <i class="bi-search"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Select operation you want to do.</h4>

                                    <p class="text-white">Select the radio button of email if you want to send email or
                                        select sms if you want to send sms.</p>

                                    <div class="icon-holder">
                                        <i class="bi-bookmark"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Submit</h4>

                                    <p class="text-white">Submit the form and wait until the operation is done.</p>

                                    <div class="icon-holder">
                                        <i class="bi-book"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                  
                </div>
            </div>
        </section>


        <section class="faq-section section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <h2 class="mb-4">Frequently Asked Questions</h2>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-lg-5 col-12">
                        <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
                    </div>

                    <div class="col-lg-6 col-12 m-auto">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What is this Website about?
                                    </button>
                                </h2>

                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        This website takes excel file and reads the data from the excel file like names,
                                        phone number , email and so sends bulk emails or sms to the number or email
                                        mentioned with the message given.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What to keep in mind while uploading?
                                    </button>
                                </h2>

                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Select your csv File Make sure your columns heading are :id, name, roll no,
                                        phone number, email and message.
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="contact-section section-padding section-bg" id="section_5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">Get in touch</h2>
                    </div>

                    <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                    <iframe  class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773.001386254805!2d72.82080781123557!3d18.97554618213429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ce3fb2520efd%3A0x9e30042b6999fc4f!2sWebsite%20Development%20Company%20%7C%20Softscribble%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1713323854234!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                        <h4 class="mb-3">Head office</h4>

                        <p>Softscribble pvt ltd, topaz building, 103, RTO Colony, Mumbai Central, Mumbai, Maharashtra 400011</p>

                        <hr>

                        <p class="d-flex align-items-center mb-1">
                            <span class="me-2">Phone</span>

                            <a href="tel: 836-914-9631" class="site-footer-link">
                               836-914-9631
                            </a>
                        </p>

                        <p class="d-flex align-items-center">
                            <span class="me-2">Email</span>

                            <a href="mailto:support@softsricble.com" class="site-footer-link">
                                support@softsricble.com
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="#section_1">
                        <i class="bi-back"></i>
                        <span>BMBP</span>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <h6 class="site-footer-title mb-3">Resources</h6>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Home</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">How it works</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">FAQs</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Information</h6>

                    <p class="text-white d-flex mb-1">
                        <a href="tel:  836-914-9631" class="site-footer-link">
                        989-218-9805
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:hishamdamudi123@gmail.com" class="site-footer-link">
                            hishamdamudi123@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">


                    <p class="copyright-text mt-lg-5 mt-4">Copyright © Hisham Damudi. All rights reserved.
                        <br><br>Design: <a rel="nofollow" href="" target="_blank">Hisham Damudi</a>
                    </p>

                </div>

            </div>
        </div>
    </footer>


    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>


    <!-- Add the following JavaScript to hide the loading overlay when the page is fully loaded -->
    <script>
        function updateFileName() {
            var fileInput = document.getElementById('excelFile');
            var fileNameSpan = document.getElementById('file-name');

            if (fileInput.files.length > 0) {
                fileNameSpan.textContent = 'File Selected: ' + fileInput.files[0].name;
            } else {
                fileNameSpan.textContent = '';
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // This function will be executed when the page is fully loaded
        var uploadMessage = document.getElementById("upload-message");
        if (uploadMessage) {
            // Remove the element after a delay of 5 seconds (5000 milliseconds)
            setTimeout(function() {
                uploadMessage.remove();
            }, 5000);
        }
        });
        
    
    </script>

</body>

</html>