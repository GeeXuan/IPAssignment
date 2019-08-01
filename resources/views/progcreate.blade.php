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

        <script type="text/javascript">
            $('input:radio[name="levelOfStudy"]').click(function(){
                var selectedValue = $(this).val();
                $("input[value="+selectedValue+"]").each(function(){
                    if(!$(this).is(':checked')) {
                        $("#progLevel option[value='Diploma']").prop('disabled',false);
                        $("#progLevel option[value='Degree']").prop('disabled',false);
                        $("#progLevel option[value='Foundation']").prop('disabled',true);
                        $("#progLevel option[value='ALevel']").prop('disabled',true);
                    } else {
                        $("#progLevel option[value='Foundation']").prop('disabled',false);
                        $("#progLevel option[value='ALevel']").prop('disabled',false);
                        $("#progLevel option[value='Diploma']").prop('disabled',true);
                        $("#progLevel option[value='Degree']").prop('disabled',true);
                    }
                } 
        });
        </script>

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
                    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Add New Programme<span></h2>
                    <form method="post" action="{{url('programmes')}}">
                        @csrf
                        <p>
                            <label for="progId">Programme Id:</label>
                            <input type="text" name="progId" /> 
                        </p>

                        <p>
                            <label for="progName">Programme Name:</label>
                            <input type="text" name="progName" /> 
                        </p>

                        <p>
                            <label for="progDesc">Programme Description:</label>
                            <textarea rows="4" cols="50" name="progDesc"></textarea>
                        </p>

                        <p>
                            <label for="profession">Profession:</label>
                            <input type="text" name="profession" />
                        </p>
                        
                        <p>
                            <label for="facilitiesFee">Facilities Fee:</label>
                            <input type="text" name="facilitiesFee" /> 
                        </p>
                        
                        <p>
                            <label for="levelOfStudy">Level of study:</label><br/>
                            @foreach($levelOfStudy as $row)
                        <tr>
                            <td><input type="radio" name="levelOfStudy" id="levelOfStudy" value="{{$row->id}}"></td>
                            <td>{{$row->name}}<br/></td>
                        </tr>
                        @endforeach
                        </p>
                        
                        <p>
                            <label for="progLevel">Programme Level:</label>
                            <select name="progLevel[]" id="progLevel">
                                <option value="Diploma">Diploma</option>
                                <option value="Degree">Degree</option>
                                <option value="Foundation">Foundation</option>
                                <option value="ALevel">ALevel</option>
                            </select>
                        </p>
                        
                        <p>
                            <label for="faculty">Faculty:</label>
                            @foreach($faculty as $row)
                        <tr>
                            <td>
                                <select name="faculty">
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                        </p>

                        <p>
                            <label for="duration">Duration of study:</label><br/>
                            <input type="radio" name="duration" value="2">Two
                            <br/><input type="radio" name="duration" value="3">Three
                        </p>

                        <p>
                            <label for="camplist[]">Campuses offered:</label><br/>
                            @foreach($campus as $row)
                        <tr>
                            <td><input type="checkbox" name="camplist[]" value="{{$row->id}}"></td>
                            <td>{{$row->name}}<br/></td>
                        </tr>
                        @endforeach
                        </p>

                        

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




