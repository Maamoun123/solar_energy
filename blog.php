<?php
session_start();
include_once 'includes/db.php';
include_once 'header.php';
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Solar Energy Blog, Solar News, Solar Panels Lebanon, Renewable Energy Blog">
    <meta name="description" content="Read the latest news and insights about solar energy in Lebanon. Tips, guides, and case studies to help you maximize your solar investment.">
    <title>Solar Energy Blog - SolarEnergy Lebanon</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="index.css" media="screen">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <!-- <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .blog-header {
            background-color: #f8f9fa;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        .blog-card {
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 30px;
            height: 100%;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .blog-img {
            height: 200px;
            object-fit: cover;
        }

        .blog-date {
            font-size: 0.85rem;
            color: #666;
        }

        .blog-category {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .featured-post {
            border-left: 4px solid #198754;
            padding-left: 1rem;
        }
    </style>
</head>

<body class="u-body u-xl-mode" data-lang="en">


    <!-- Blog Header Section -->
    <section class="blog-header bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="fw-bold mb-3">Solar Energy <span class="text-success">Blog</span></h1>
                    <p class="lead">Stay updated with the latest news, insights, and tips about solar energy in Lebanon</p>
                </div>
                <div class="col-lg-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search articles...">
                        <button class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Post -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm mb-4">
                        <img src="images/solar-energy-panel-light-bulb-gr.jpg" class="card-img-top" alt="Featured Post">
                        <div class="card-body">
                            <span class="badge bg-success mb-2">Featured</span>
                            <h2 class="card-title h3">Lebanon's Shift to Solar: How Renewable Energy is Transforming the Country</h2>
                            <p class="blog-date mb-3"><i class="far fa-calendar-alt me-1"></i> May 3, 2025 • <i class="far fa-user me-1"></i> By Ahmed Khalil</p>
                            <p class="card-text">As Lebanon faces ongoing electricity challenges, solar energy has emerged as a beacon of hope for both residential and commercial sectors. This comprehensive guide examines how solar power is revolutionizing energy consumption across the country...</p>
                            <a href="#" class="btn btn-outline-success">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="h5 mb-4">Popular Categories</h3>
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-outline-success btn-sm">Solar Installations</a>
                                <a href="#" class="btn btn-outline-success btn-sm">Maintenance Tips</a>
                                <a href="#" class="btn btn-outline-success btn-sm">Energy Efficiency</a>
                                <a href="#" class="btn btn-outline-success btn-sm">Battery Storage</a>
                                <a href="#" class="btn btn-outline-success btn-sm">Government Policies</a>
                                <a href="#" class="btn btn-outline-success btn-sm">Cost Savings</a>
                            </div>

                            <h3 class="h5 mb-3 mt-4">Subscribe to Newsletter</h3>
                            <p class="small">Get the latest solar news and tips delivered directly to your inbox.</p>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Your email address">
                                <button class="btn btn-success" type="button">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Blog Posts -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4">Recent Articles</h2>
            <div class="row">
                <!-- Blog Post 1 -->
                <div class="col-md-4">
                    <div class="card blog-card h-100">
                        <span class="badge bg-primary blog-category">Technology</span>
                        <img src="images/business-person-planning-alterna.jpg" class="card-img-top blog-img" alt="Solar Panel Efficiency">
                        <div class="card-body">
                            <h3 class="h5 card-title">New Solar Panel Technology Increases Efficiency by 30%</h3>
                            <p class="blog-date mb-2"><i class="far fa-calendar-alt me-1"></i> April 28, 2025</p>
                            <p class="card-text">The latest generation of solar panels is now available in Lebanon, offering significantly improved efficiency even on cloudy days...</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="#" class="btn btn-sm btn-outline-success">Continue Reading</a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 2 -->
                <div class="col-md-4">
                    <div class="card blog-card h-100">
                        <span class="badge bg-info blog-category">Guide</span>
                        <img src="images/electric-farm-with-panels-producing-clean-ecologic-energy5-min.jpg" class="card-img-top blog-img" alt="Solar Installation Guide">
                        <div class="card-body">
                            <h3 class="h5 card-title">Complete Guide to Installing Solar Panels on Lebanese Homes</h3>
                            <p class="blog-date mb-2"><i class="far fa-calendar-alt me-1"></i> April 15, 2025</p>
                            <p class="card-text">From permits to installation, this comprehensive guide walks you through everything you need to know about installing solar in Lebanon...</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="#" class="btn btn-sm btn-outline-success">Continue Reading</a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 3 -->
                <div class="col-md-4">
                    <div class="card blog-card h-100">
                        <span class="badge bg-warning text-dark blog-category">Case Study</span>
                        <img src="images/person-near-alternative-energy-p.jpg" class="card-img-top blog-img" alt="Business Solar Case Study">
                        <div class="card-body">
                            <h3 class="h5 card-title">How This Beirut Factory Cut Electricity Costs by 70% with Solar</h3>
                            <p class="blog-date mb-2"><i class="far fa-calendar-alt me-1"></i> April 3, 2025</p>
                            <p class="card-text">A local manufacturing business shares their journey to energy independence and the significant cost savings achieved after switching to solar...</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="#" class="btn btn-sm btn-outline-success">Continue Reading</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- Blog Post 4 -->
                <div class="col-md-4">
                    <div class="card blog-card h-100">
                        <span class="badge bg-danger blog-category">News</span>
                        <img src="images/hgghgh.jpg" class="card-img-top blog-img" alt="Government Incentives">
                        <div class="card-body">
                            <h3 class="h5 card-title">Lebanese Government Announces New Solar Energy Incentives</h3>
                            <p class="blog-date mb-2"><i class="far fa-calendar-alt me-1"></i> March 22, 2025</p>
                            <p class="card-text">The Ministry of Energy has unveiled a new program to encourage residential solar adoption with financial incentives and tax breaks...</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="#" class="btn btn-sm btn-outline-success">Continue Reading</a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 5 -->
                <div class="col-md-4">
                    <div class="card blog-card h-100">
                        <span class="badge bg-success blog-category">Maintenance</span>
                        <img src="images/electric-farm-with-panels-product7.jpg" class="card-img-top blog-img" alt="Solar Panel Maintenance">
                        <div class="card-body">
                            <h3 class="h5 card-title">10 Essential Maintenance Tips for Your Solar Panel System</h3>
                            <p class="blog-date mb-2"><i class="far fa-calendar-alt me-1"></i> March 15, 2025</p>
                            <p class="card-text">Keep your solar system performing at its best with these essential maintenance tips designed for Lebanon's unique climate conditions...</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="#" class="btn btn-sm btn-outline-success">Continue Reading</a>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 6 -->
                <div class="col-md-4">
                    <div class="card blog-card h-100">
                        <span class="badge bg-secondary blog-category">Opinion</span>
                        <img src="images/3d-house-with-solar-pannels.jpg" class="card-img-top blog-img" alt="Future of Solar">
                        <div class="card-body">
                            <h3 class="h5 card-title">The Future of Solar Energy in Lebanon: Trends to Watch</h3>
                            <p class="blog-date mb-2"><i class="far fa-calendar-alt me-1"></i> March 5, 2025</p>
                            <p class="card-text">Industry experts share their predictions on how solar technology will evolve in Lebanon over the next decade and what it means for consumers...</p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="#" class="btn btn-sm btn-outline-success">Continue Reading</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-success px-4">Load More Articles</button>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mb-4">What Our Readers Say</h2>
                    <div class="card border-0 shadow-sm py-4 px-5 mb-4 featured-post">
                        <div class="card-body">
                            <p class="lead fst-italic">"The blog posts about battery storage systems really helped me make an informed decision for my home. I've been following this blog for over a year and it's been an invaluable resource!"</p>
                            <div class="d-flex justify-content-center">
                                <div class="text-center">
                                    <h5 class="mb-0">Mariam Khoury</h5>
                                    <p class="small text-muted">Homeowner in Jounieh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-success text-white">
        <div class="container text-center">
            <h2 class="mb-4">Ready to harness the power of the sun?</h2>
            <p class="lead mb-4">Our experts can help you design a solar energy system that meets your specific needs</p>
            <a href="contact.php" class="btn btn-light btn-lg px-4">Get a Free Consultation</a>
        </div>
    </section>

    <!-- Footer -->

    <?php include_once 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>