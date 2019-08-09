<!-- create.blade.php -->


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
                    <form method="post" action="{{url('accreditation')}}">
                        @if (isset($accreditations))
                        <table border='1'>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            @foreach($accreditations as $row)
                            <tr>
                                <td>{{$row['name']}}</td>
                                <td>{{$row['description']}}</td>
                                <td>
                                    <button class="btn btn-danger" name="delete" value='{{$row['id']}}' formnovalidate>Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @endif
                        @csrf
                        <br/><br/><br/>
                        <h2>Last Step: Add Accreditation That is Associated with the Faculty</h2>
                        <h3>(You can skip this step by pressing done)</h3>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <p>
                            <label for="name">Accreditation Name:</label>
                            <br/>
                            <input type="text" name="name" size="52" maxlength="50" placeholder="Accreditation name..." required>
                        </p>
                        <p>
                            <label for="description">Accreditation Description:</label>
                            <br/>
                            <textarea rows="3" cols="52"  placeholder="Description of the accreditation..." name="description" required></textarea>
                        </p>
                        <p>
                            <button type="submit" name="add" class="btn btn-primary">Add</button>&nbsp&nbsp
                            <button type="submit" name="done" class="btn btn-success" formnovalidate>Done</button>
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
