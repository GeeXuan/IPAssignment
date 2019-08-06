<!-- mercreate.blade.php -->


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Nitro &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
        <meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
        <meta name="author" content="FreeHTML5.co" />

        <!-- 
              //////////////////////////////////////////////////////
      
              FREE HTML5 TEMPLATE 
              DESIGNED & DEVELOPED by FreeHTML5.co
                      
              Website: 		http://freehtml5.co/
              Email: 			info@freehtml5.co
              Twitter: 		http://twitter.com/fh5co
              Facebook: 		https://www.facebook.com/fh5co
      
              //////////////////////////////////////////////////////
        -->

        <!-- Facebook and Twitter integration -->
        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="/favicon.ico">

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <!-- Animate.css -->
        <link rel="stylesheet" href="/css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="/css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="/css/bootstrap.css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/owl.theme.default.min.css">
        <!-- Theme style  -->
        <link rel="stylesheet" href="/css/style.css">

        <!-- Modernizr JS -->
        <script src="/js/modernizr-2.6.2.min.js"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div id="fh5co-page">
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
            <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

                <h1 id="fh5co-logo"><a href="index.html"><img src="/images/logo.png" alt="Free HTML5 Bootstrap Website Template"></a></h1>
                <nav id="fh5co-main-menu" role="navigation">
                    <ul>
                        <li class="fh5co-active"><a href="index.html">Home</a></li>
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>

                <div class="fh5co-footer">
                    <p><small>&copy; 2016 Nitro Free HTML5. All Rights Reserved.</span> <span>Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> </span> <span>Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></span></small></p>
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    </ul>
                </div>

            </aside>

            <div id="fh5co-main">

                <div class="fh5co-narrow-content">
                    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Add Minimum Entry Requirements<span></h2>
                    
                    <table class="table table-striped">
                        <tr>
                            <th>Programme ID</th>
                            <th>Programme Level</th>
                            <th>Course ID</th>
                        </tr>

                        <tr>
                            <td>{{$progId}}</td>
                            <td>{{$progLevel}}</td>
                            <td>
                                @foreach ($courselist as $course)
                                    {{$course}}
                                @endforeach
                            </td>
                        </tr>
                    </table>

                    <form method="post" action="{{URL('programmes')}}">
                        @csrf
                        <p>
                            <label for="progId">Programme Id:</label>
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="text" name="progId" value="{{$progId}}" readonly/> 
                        </p>
                        
                        <p>
                            <label for="merId">MER Id:</label>
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="text" name="merId" /> 
                        </p>
                        
                        <p>
                            <label for="mer">Minimum Entry Requirements:</label>
                            @if ($progLevel == "Diploma")
                            <p>
                                <table border="0">
                                    <tr>
                                        <td style="width: 50%">
                                            <table border="1">
                                                <caption>SPM</caption>
                                                <tr>
                                                    <th>Subjects</th>
                                                    <th>Pass with credits</th>
                                                </tr>

                                                <tr>
                                                    <td>Bahasa Melayu</td>
                                                    <td><input type="checkbox" name="spm[]" value="BM">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Bahasa Inggeris</td>
                                                    <td><input type="checkbox" name="spm[]" value="BI">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Sejarah</td>
                                                    <td><input type="checkbox" name="spm[]" value="SJ">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Mathematics</td>
                                                    <td><input type="checkbox" name="spm[]" value="MM">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Additional Mathematics</td>
                                                    <td><input type="checkbox" name="spm[]" value="AM">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Biology</td>
                                                    <td><input type="checkbox" name="spm[]" value="BIO">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Chemistry</td>
                                                    <td><input type="checkbox" name="spm[]" value="CHEM">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Physics</td>
                                                    <td><input type="checkbox" name="spm[]" value="PHY">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Accounting</td>
                                                    <td><input type="checkbox" name="spm[]" value="ACC">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Economy</td>
                                                    <td><input type="checkbox" name="spm[]" value="ECO">Yes</td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td>
                                            <table border="1">
                                                <caption>O Level</caption>
                                                <tr>
                                                    <th>Subjects</th>
                                                    <th>Pass with grade C</th>
                                                </tr>

                                                <tr>
                                                    <td>Bahasa Melayu</td>
                                                    <td><input type="checkbox" name="olevel[]" value="BM">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Bahasa Inggeris</td>
                                                    <td><input type="checkbox" name="olevel[]" value="BI">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Sejarah</td>
                                                    <td><input type="checkbox" name="olevel[]" value="SJ">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Mathematics</td>
                                                    <td><input type="checkbox" name="olevel[]" value="MM">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Additional Mathematics</td>
                                                    <td><input type="checkbox" name="olevel[]" value="AM">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Biology</td>
                                                    <td><input type="checkbox" name="olevel[]" value="BIO">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Chemistry</td>
                                                    <td><input type="checkbox" name="olevel[]" value="CHEM">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Physics</td>
                                                    <td><input type="checkbox" name="olevel[]" value="PHY">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Accounting</td>
                                                    <td><input type="checkbox" name="olevel[]" value="ACC">Yes</td>
                                                </tr>

                                                <tr>
                                                    <td>Economy</td>
                                                    <td><input type="checkbox" name="olevel[]" value="ECO">Yes</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </p>
                            
                            @else
                            <p>
                                <label for='cgpaRequired'>CGPA (minimum):</label>
                                <input type='hidden' name='_token' value='{{csrf_token()}}' />
                                <input type='text' name='cgpaRequired' />
                            </p>
                            
                            <table border="1">
                                <caption>STPM</caption>
                                <tr>
                                    <th>Subjects</th>
                                    <th>Pass with grade C</th>
                                </tr>

                                <tr>
                                    <td>Bahasa Melayu</td>
                                    <td><input type="checkbox" name="stpm[]" value="BM">Yes</td>
                                </tr>

                                <tr>
                                    <td>Bahasa Inggeris</td>
                                    <td><input type="checkbox" name="stpm[]" value="BI">Yes</td>
                                </tr>

                                <tr>
                                    <td>Sejarah</td>
                                    <td><input type="checkbox" name="stpm[]" value="SJ">Yes</td>
                                </tr>

                                <tr>
                                    <td>Mathematics</td>
                                    <td><input type="checkbox" name="stpm[]" value="MM">Yes</td>
                                </tr>

                                <tr>
                                    <td>Additional Mathematics</td>
                                    <td><input type="checkbox" name="stpm[]" value="AM">Yes</td>
                                </tr>

                                <tr>
                                    <td>Biology</td>
                                    <td><input type="checkbox" name="stpm[]" value="BIO">Yes</td>
                                </tr>

                                <tr>
                                    <td>Chemistry</td>
                                    <td><input type="checkbox" name="stpm[]" value="CHEM">Yes</td>
                                </tr>

                                <tr>
                                    <td>Physics</td>
                                    <td><input type="checkbox" name="stpm[]" value="PHY">Yes</td>
                                </tr>

                                <tr>
                                    <td>Accounting</td>
                                    <td><input type="checkbox" name="stpm[]" value="ACC">Yes</td>
                                </tr>

                                <tr>
                                    <td>Economy</td>
                                    <td><input type="checkbox" name="stpm[]" value="ECO">Yes</td>
                                </tr>
                            </table>
                            @endif
                        <p>
                            <button type="submit">Next</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="/js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="/js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- Carousel -->
        <script src="/js/owl.carousel.min.js"></script>
        <!-- Stellar -->
        <script src="/js/jquery.stellar.min.js"></script>
        <!-- Waypoints -->
        <script src="/js/jquery.waypoints.min.js"></script>
        <!-- Counters -->
        <script src="/js/jquery.countTo.js"></script>


        <!-- MAIN JS -->
        <script src="/js/main.js"></script>

    </body>
</html>




