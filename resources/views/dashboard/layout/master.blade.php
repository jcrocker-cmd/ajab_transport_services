<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link rel="shortcut icon" href="images/tire.png" type="image/x-icon">
    @yield('styles')
</head>
<body>
    
<div class="loader-wrapper" id="loads">
    <a href="/" class="brand"><img src="/images/LOGO.png" class="logo pb-2"></a>
    <div class="linePreloader"></div>
</div>

    @yield('content')
    @yield('scripts')
    @stack('scripts')

<script>
$(window).on("load",function(){
    $(".loader-wrapper").delay(1000).fadeIn("slow").fadeOut("slow");
});
</script>

</body>
</html>