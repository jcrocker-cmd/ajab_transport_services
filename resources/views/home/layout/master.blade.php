<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You Drive</title>
    <link rel="shortcut icon" href="images/tire.png" type="image/x-icon">
    @yield('styles')
</head>
<body>

<a href="#" class="scrollup" id="scroll-up"><i class="fas fa-arrow-up"></i></a>



<!-- PRELOADER -->

<div class="loader-wrapper" id="loads">
<span class="loader"><span class="loader-inner"></span></span>
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
        $(".loader-wrapper").delay(1000).fadeIn("slow").fadeOut("slow");
    });
</script>

</body>

</html>