<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Welcome | AJAB</title>
    <!-- <link rel="shortcut icon" href="images/tire.png" type="image/x-icon"> -->
    @yield('styles')
    @stack('style')
</head>
<body>

<!-- PRELOADER -->

<div class="loader-wrapper" id="loads">
    <a href="/" class="brand"><img src="/images/LOGO.png" class="preloader_logo pb-2"></a>
    <div class="linePreloader"></div>
</div>

    @yield('content')
    @yield('script')
    @stack('script')

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    
    <!-- <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('efda0cb5254ac4bb5450', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('channel-sample');
    channel.bind('event-sample', function(data) {
      alert(JSON.stringify(data));
    });
  </script> -->

  <script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('7607621ec0998a311eee', {
    cluster: 'ap1'
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
    alert(JSON.stringify(data));
  });
  </script>

  <script>
  $(window).on("load",function(){
      $(".loader-wrapper").delay(1000).fadeIn("slow").fadeOut("slow");
  });
  </script>


</body>

</html>