<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
    </head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <body>

        <div class="bg-white font-inter">




       


            <script>
                // Ambil elemen tombol dan menu
                const menuToggle = document.getElementById('menu-toggle');
                const menuClose = document.getElementById('menu-close');
                const mobileMenu = document.getElementById('mobile-menu');

                // Event untuk membuka menu
                menuToggle.addEventListener('click', () => {
                    mobileMenu.classList.remove('hidden');
                });

                // Event untuk menutup menu
                menuClose.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            </script>


    </body>

</html>
