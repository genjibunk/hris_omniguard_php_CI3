<!doctype html>

<html lang="en">
    <head>

        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>HRIS</title>
    
        <link href="<?php echo base_url()."assets/"; ?>dist/css/tabler.min.css?1692870487" rel="stylesheet"/>
        <link href="<?php echo base_url()."assets/"; ?>dist/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
        <link href="<?php echo base_url()."assets/"; ?>dist/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
        <link href="<?php echo base_url()."assets/"; ?>dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
        <link href="<?php echo base_url()."assets/"; ?>dist/css/demo.min.css?1692870487" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
        </style>

    </head>

    <body class="layout-navbar-sticky">

        <script src="./dist/js/demo-theme.min.js?1692870487"></script>

        <div>

            <header class="navbar navbar-expand-md d-print-none" >

                <div class="container-xl">

                    <div class="collapse navbar-collapse" id="navbar-menu">

                        <div>

                        <img src="<?php echo base_url()."assets/"; ?>logo/hris_mainlogo.PNG" style="width: 40px; height: auto;" alt="Tabler" class="navbar-brand-image me-2">Human Resource Information System

                        </div>

                    </div>

                    <div class="navbar-nav flex-row order-md-last">
                  
                        <div class="nav-item dropdown">

                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                <div class="d-none d-xl-block ps-2">
                                <div>Paweł Kuna</div>
                                <div class="mt-1 small text-secondary">UI Designer</div>
                                </div>
                            </a>

                        </div>

                    </div>

                </div>

            </header>

            <div class="page-wrapper">

                <div class="page-body" style="position: relative; overflow: hidden; background-color: #f1f1f1;">

                    <div style="
                        position: absolute;
                        top: -100px;
                        left: -100px;
                        width: 300px;
                        height: 300px;
                        background: radial-gradient(circle, #60a5fa, #a78bfa, #f472b6);
                        border-radius: 50%;
                        opacity: 0.3;
                        z-index: 0;">
                    </div>

                    <div style="position: relative; z-index: 1;">

                        <div class="container-xl">
                                    
                            <div id="weather" class="text-center p-4 text-xl">

                                <div id="icon" class="mb-2">Loading weather...</div>
                                <div id="greeting" class="font-semibold">Loading...</div>
                                <div id="datetime" class="text-sm text-gray-600"></div>
                                
                            </div>

                            <center>
                                <strong>Location:</strong>
                                <em class="text-success">Verified</em>
                                •
                                <strong>Punch in</strong>
                                <em>--:--:--</em>
                                •
                                <strong>Punch out</strong>
                                <em>--:--:--</em>

                                </br></br>
                                <a href="#" class="btn bg-lime-lt btn-pill w-20">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-power"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 6a7.75 7.75 0 1 0 10 0"></path><path d="M12 4l0 8"></path></svg>
                                    Punch in
                                </a>

                            </center>

                            </br>

                            <script>

                                const apiKey = '7e281ea5af344b399fa53609251206';

                                function updateGreetingAndTime() {
                                const now = new Date();
                                const hour = now.getHours();
                                const day = now.toLocaleDateString(undefined, {
                                    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
                                });
                                const time = now.toLocaleTimeString(undefined, { hour: '2-digit', minute: '2-digit' });

                                let greeting = "Hello";
                                if (hour < 12) greeting = "Good morning";
                                else if (hour < 18) greeting = "Good afternoon";
                                else greeting = "Good evening";

                                document.getElementById("greeting").textContent = `${greeting}, User!`;
                                document.getElementById("datetime").textContent = `${day} • ${time}`;
                                }

                                function fetchWeather(lat, lon) {
                                const url = `https://api.weatherapi.com/v1/current.json?key=${apiKey}&q=${lat},${lon}`;

                                fetch(url)
                                    .then(res => res.json())
                                    .then(data => {
                                    const iconUrl = "https:" + data.current.condition.icon;
                                    document.getElementById("icon").innerHTML =
                                        `<img src="${iconUrl}" alt="Weather Icon" class="inline-block w-[60px] h-[60px]" />`;
                                    })
                                    .catch(() => {
                                    document.getElementById("icon").textContent = "Unable to load weather.";
                                    });
                                }

                                navigator.geolocation.getCurrentPosition(
                                (position) => {
                                    fetchWeather(position.coords.latitude, position.coords.longitude);
                                },
                                () => {
                                    document.getElementById("icon").textContent = "Location access denied.";
                                }
                                );

                                updateGreetingAndTime();

                            </script>

                        </div>
                        
                    </div>

                </div>

            </div>

        </div>

        <script src="<?php echo base_url()."assets/"; ?>dist/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
        <script src="<?php echo base_url()."assets/"; ?>dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487" defer></script>
        <script src="<?php echo base_url()."assets/"; ?>dist/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
        <script src="<?php echo base_url()."assets/"; ?>dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script>
        
        <script src="<?php echo base_url()."assets/"; ?>dist/js/tabler.min.js?1692870487" defer></script>
        <script src="<?php echo base_url()."assets/"; ?>dist/js/demo.min.js?1692870487" defer></script>
    
    </body>

</html>