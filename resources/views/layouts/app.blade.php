<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LGU Caramoran</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .bg-map{
        background-image: url('/image/caramoran.png');
        height: 700px;
    }
    .bg-custom{
     
    background: #00a65a;
    opacity: 0.99;
    color: #fff;
    }
    .bg-form{
        background: #fff;
    }
    .contact-section{
        height: 100vh;
        background: rgb(255,255,255);
background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(224,224,224,1) 47%, rgba(251,251,251,1) 100%, rgba(163,163,163,1) 100%);
    }  
    li.nav-item {
    font-weight: 900;
}

    </style>
</head>
<body>

        <div class="container-fluid" style="height: 50px; width:100%; background: #3c8dbc">
                <nav class="navTop navbar navbar-expand-lg navbar-dark">
                  
                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                            aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> MENU</button>
                        <div class="collapse navbar-collapse" id="collapsibleNavId">
            
                          
            
                          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <!-- SMALL DEVICE ONLY-->
                            <div class="d-md-none">
                                    <li class="nav-item active">
                                            <a class="nav-link" href="/">home <span class="sr-only">(current)</span></a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" href="/about">ABOUT US</a>
                                          </li>
                                          <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                              <a class="dropdown-item" href="#">Action 1</a>
                                              <a class="dropdown-item" href="#">Action 2</a>
                                            </div>
                                          </li>
                                          <li class="nav-item dropdown">
                                              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                              <div class="dropdown-menu" aria-labelledby="dropdownId">
                                                <a class="dropdown-item" href="#">Action 2</a>
                                              </div>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" href="/contact">CONTACT US</a>
                                            </li>
                            </div>
                             <!-- SMALL DEVICE ONLY-->
                          @guest
                          <li class="nav-item">
                                <a class="nav-link" href="/login">LOGIN</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="/register">CREATE ACCOUNT</a>
                              </li>
                             
                            @endguest
                            
                            @auth
                            <li class="nav-item">
                              <a class="nav-link" href="/admin/student">Dashboard</a>
                            </li>
                            @endauth
                    
                        
                         
                             
                               
            
                            
                          </ul>
            
                         
                        
                        </div>
                      
                       
                      </nav>
            
        </div>
        <section>
                <div class="bg-white row py-3 px-5">
                <div class="col-md-2 col-2">
                        <a href="/home" class="navbar-brand">
                            <img src="/image/logo.jpeg" height="100" alt="" class="src">
        
                     
                        </a>
                        
                      </div> 
                      <div class="col-md-10 py-3 mt-2">
                            <section class="container py-2" style="border-top: 1px solid #f0f6f9; border-bottom: 1px solid #f0f6f9;">
                                    <nav class="navbar navbar-expand-lg navbar-light bg-white">
                           
                                     
                                        <div class="collapse navbar-collapse" id="collapsibleNavId1">
                                          <ul class="navbar-nav mx-auto text-secondary mt-2 mt-lg-0  ">
                                            <li class="nav-item active">
                                              <a class="text-dark px-2" href="#">HOME <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="text-dark px-2" href="/about">ABOUT US</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                              <a class="text-dark px-2 " href="/profile">PROFILE</a>
                                        
                                            </li>
                                           
                                              <li class="nav-item">
                                                <a class="text-dark px-2" href="/contact">CONTACT US</a>
                                              </li>
                                            
                                          </ul>
                                       
                                        </div>
                                      </nav>
                                  </section>
                    </div>  
                </div>
        </section>
        
    @yield('content')
</body>
</html>
