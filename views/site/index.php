<?php
/* @var $this yii\web\View */

$this->title = 'Documentator';

$this->registerCssFile('web/css/main.css');
$this->registerCssFile('web/css/custom.css');
$this->registerJsFile('//use.edgefonts.net/bebas-neue.js');
$this->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800');
$this->registerCssFile('web/css/icomoon-social.css');
$this->registerCssFile('web/css/font-awesome.min.css');
$this->registerJsFile('web/js/modernizr-2.6.2-respond-1.1.0.min.js');

?>
<!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active" style="background-image: url(web/img/slides/1.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content centered">
                                <h2 class="animation animated-item-1">Welcome to BASICA! A Bootstrap3 Template</h2>
                                <p class="animation animated-item-2">Sed mattis enim in nulla blandit tincidunt. Phasellus vel sem convallis, mattis est id, interdum augue. Integer luctus massa in arcu euismod venenatis. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(web/img/slides/2.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content center centered">
                                <h2 class="animation animated-item-1">Powerful and Responsive HTML Template</h2>
                                <p class="animation animated-item-2">Phasellus adipiscing felis a dictum dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at ligula risus. </p>
                                <br>
                                <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" style="background-image: url(web/img/slides/3.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content centered">
                                <h2 class="animation animated-item-1">Works Seamlessly Well on All Devices</h2>
                                <p class="animation animated-item-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae euismod lacus. Maecenas in tempor lectus. Nam mattis, odio ut dapibus ornare, libero. </p>
                                <br>
                                <a class="btn btn-md animation animated-item-3" href="#">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section><!--/#main-slider-->


<!-- Call to Action Bar -->
<div class="section section-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="calltoaction-wrapper">
                    <h3>Welcome to <span style="color:#aec62c; text-transform:uppercase;font-size:24px;">Basica!</span> A free fully responsive Bootstrap 3 HTML5 template!</h3> <a href="http://www.vactualart.com/portfolio-item/basica-a-free-html5-template/" class="btn btn-orange">Download here!</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Call to Action Bar -->


<!-- Services -->
<div class="section section-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="service-wrapper">
                    <i class="icon-home"></i>
                    <h3>Aliquam in adipiscing</h3>
                    <p>Praesent rhoncus mauris ac sollicitudin vehicula. Nam fringilla turpis turpis, at posuere turpis aliquet sit amet condimentum</p>
                    <a href="#" class="btn">Read more</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-wrapper">
                    <i class="icon-briefcase"></i>
                    <h3>Curabitur mollis</h3>
                    <p>Suspendisse eget libero mi. Fusce ligula orci, vulputate nec elit ultrices, ornare faucibus orci. Aenean lectus sapien, vehicula</p>
                    <a href="#" class="btn">Read more</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-wrapper">
                    <i class="icon-calendar"></i>
                    <h3>Vivamus mattis</h3>
                    <p>Phasellus posuere et nisl ac commodo. Nulla facilisi. Sed tincidunt bibendum cursus. Aenean vulputate aliquam risus rutrum scelerisque</p>
                    <a href="#" class="btn">Read more</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Services -->


<hr>

<!-- Our Portfolio -->	

<div class="section section-white">
    <div class="container">
        <div class="row">

            <div class="section-title">
                <h1>Our Recent Works</h1>
            </div>


            <ul class="grid cs-style-3">
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="web/img/portfolio/4.jpg" alt="img04">
                        <figcaption>
                            <h3>Settings</h3>
                            <span>Jacob Cummings</span>
                            <a href="portfolio-item.html">Take a look</a>
                        </figcaption>
                    </figure>
                </div>	
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="web/img/portfolio/1.jpg" alt="img01">
                        <figcaption>
                            <h3>Camera</h3>
                            <span>Jacob Cummings</span>
                            <a href="portfolio-item.html">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="web/img/portfolio/2.jpg" alt="img02">
                        <figcaption>
                            <h3>Music</h3>
                            <span>Jacob Cummings</span>
                            <a href="portfolio-item.html">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="web/img/portfolio/5.jpg" alt="img05">
                        <figcaption>
                            <h3>Safari</h3>
                            <span>Jacob Cummings</span>
                            <a href="portfolio-item.html">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="web/img/portfolio/3.jpg" alt="img03">
                        <figcaption>
                            <h3>Phone</h3>
                            <span>Jacob Cummings</span>
                            <a href="portfolio-item.html">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-6">
                    <figure>
                        <img src="web/img/portfolio/6.jpg" alt="img06">
                        <figcaption>
                            <h3>Game Center</h3>
                            <span>Jacob Cummings</span>
                            <a href="portfolio-item.html">Take a look</a>
                        </figcaption>
                    </figure>
                </div>
            </ul>
        </div>
    </div>
</div>
<!-- Our Portfolio -->

<hr>

<!-- Our Clients -->
<div class="section">
    <div class="container">

        <div class="section-title">
            <h1>Our Success Stories</h1>
        </div>

        <div class="clients-logo-wrapper text-center row">
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-1.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-2.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-3.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-4.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-5.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-6.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-7.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-8.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-9.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-10.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-11.jpg" alt="Client Name"></a></div>
            <div class="col-lg-1 col-md-1 col-sm-3 col-xs-6"><a href="#"><img src="web/img/logos/logo-12.jpg" alt="Client Name"></a></div>
        </div>
    </div>
</div>
<!-- End Our Clients -->

<!-- Footer -->
<div class="footer">
    <div class="container">

        <div class="row">

            <div class="col-footer col-md-4 col-xs-6">
                <h3>Contact Us</h3>
                <p class="contact-us-details">
                    <b>Address:</b> 123 Downtown Avenue, Manhattan, New York, United States of America<br/>
                    <b>Phone:</b> +1 123 45678910<br/>
                    <b>Fax:</b> +1 123 45678910<br/>
                    <b>Email:</b> <a href="mailto:info@yourcompanydomain.com">info@yourcompanydomain.com</a>
                </p>
            </div>				
            <div class="col-footer col-md-4 col-xs-6">
                <h3>Our Social Networks</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam.</p>
                <div>
                    <img src="web/img/icons/facebook.png" width="32" alt="Facebook">
                    <img src="web/img/icons/twitter.png" width="32" alt="Twitter">
                    <img src="web/img/icons/linkedin.png" width="32" alt="LinkedIn">
                    <img src="web/img/icons/rss.png" width="32" alt="RSS Feed">
                </div>
            </div>
            <div class="col-footer col-md-4 col-xs-6">
                <h3>About Our Company</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci.</p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-copyright">&copy; <?= date('Y') ?> <a href="http://www.vactualart.com/portfolio-item/basica-a-free-html5-template/">Basica</a> Bootstrap HTML Template. By <a href="http://www.vactualart.com">Vactual Art</a>.</div>
            </div>
        </div>
    </div>
</div>

<!-- Javascripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="web/js/jquery-1.9.1.min.js"><\/script>');</script>
<?php 
$this->registerJsFile('js/bootstrap.min.js');
$this->registerJsFile('web/js/jquery.easing.min.js');
$this->registerJsFile('web/js/scrolling-nav.js');
?>