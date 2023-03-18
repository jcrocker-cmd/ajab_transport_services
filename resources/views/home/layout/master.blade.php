<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAB Car Rental</title>
    <link rel="shortcut icon" href="images/tire.png" type="image/x-icon">
    @yield('styles')
</head>
<body>

<a href="#" class="scrollup" id="scroll-up"><i class="fas fa-arrow-up"></i></a>



<!-- PRELOADER -->

<div class="loader-wrapper" id="loads">
    <a href="/" class="brand"><img src="/images/LOGO.png" class="preloader_logo pb-2"></a>
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

</body>

</html>