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


    @yield('content')
    <!-- <script src="https://unpkg.com/scrollreveal"></script> -->
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script src="scrollreveal.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- <script>
        $(window).on("load",function(){
          $(".container").fadeOut("slow");
        });
    </script> -->
    @yield('script')

    
</body>

</html>