<!-- resources/views/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        h5{
            color: coral !important;
        }
        small{
            color: chartreuse;
        }
    </style>
    <!-- Additional styles can be added here -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body  data-bs-theme="dark">
    
    <div class="container">
    <div>
        @include('layouts.navigation')
    </div>
        <!-- Your app content will be included here -->
        @yield('content')
    </div>
    <!-- jQuery and Bootstrap JS (order matters) -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>