<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bunq Chat</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">

   
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
           <div class="container">
              <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#app-navbar-collapse" class="navbar-toggle collapsed">
                    <span class="sr-only"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span>
                </button> 
                <a href="#" class="navbar-brand">
                 Bunq Chat
                </a>

                
              </div>
              <div id="app-navbar-collapse" class="collapse navbar-collapse">
                <a href="https://github.com/kareemashraf/bunqChat" class="navbar-brand navbar-nav navbar-right">
                 Github
                </a>
              </div>
           </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="/js/app.js"></script>
     

</body>
</html>
