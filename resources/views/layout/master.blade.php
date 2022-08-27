<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="preloader.css">
    <title>You Drive</title>
</head>
<body>

<!-- PRELOADER -->
<div class="container">
	<div class="logo">
		<div class>
			<img src="images/tire.png" class="tire">
		</div>
		<div class>
			<img src="images/text.png" class="text">
		</div>
	</div>

	</div>

    @yield('content')
    <!-- <script src="https://unpkg.com/scrollreveal"></script> -->
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <script src="scrollreveal.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- <script>
        $(window).on("load",function(){
          $("").fadeOut("slow");
        });
    </script> -->
    
</body>

</html>