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

    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .user-dropdown{
            margin: 10px;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster')
        ]) !!};

    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
           <div class="container">
              <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#app-navbar-collapse" class="navbar-toggle collapsed">
                    <span class="sr-only">Toggle Navigation</span> 
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
                 <!-- <ul class="nav navbar-nav">
                    &nbsp;
                 </ul>
                 <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                       <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
                            <span class="caret"></span>
                        </a> 
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <a href="#" onclick=""> Github </a>
                            </li>
                        </ul>
                    </li>
                 </ul> -->
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
