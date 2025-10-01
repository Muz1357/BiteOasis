<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiteOasis</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Tiny5&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Tiny5&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lobster&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Tiny5&display=swap" rel="stylesheet">
    @vite('../../resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-[#FCF9F6] text-[#FCF9F6]">
    <x-navbar />
    <main class="p-6">
        {{ $slot }} 
    </main>
    @livewireScripts
</body>
</html>