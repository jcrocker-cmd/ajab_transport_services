<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="images/tire.png" type="image/x-icon">
    @yield('styles')
</head>
<body>

<a href="#" class="scrollup" id="scroll-up"><i class="fas fa-arrow-up"></i></a>

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>


<!-- PRELOADER -->

<div class="loader-wrapper" id="loads">
    <a href="/" class="brand"><img src="/images/LOGO.webp" class="preloader_logo pb-2"></a>
    <div class="linePreloader"></div>
</div>



@yield('content')

@if (session('message'))
<div class="bg-success text-white request-alert" id="myAlert">
{{ session('message') }}
</div>
@endif

@yield('script')

<script>
$(window).on("load",function(){
    $(".loader-wrapper").delay(500).fadeIn("slow").fadeOut("slow");
});
</script>

</script>





<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "122087324217539");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v16.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
</body>

</html>