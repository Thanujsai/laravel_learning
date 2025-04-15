<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        
    </head>
    <body class="">
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>

     {{-- <?php echo $slot ?> --}}
    {{ $slot }}{{-- both the above stmt and this stmt is the same thing --}}{{-- the navbar etc etc is the same for all the file which uses this templates, the all the other specific things of that particualr page, they go to this slot --}}
    </body>
</html>