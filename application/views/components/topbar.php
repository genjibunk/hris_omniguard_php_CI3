<!doctype html>

<html lang="en">

    <head>

      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>HRIS (Omniguard)</title>
      
      <link href="<?php echo base_url()."assets/"; ?>dist/css/tabler.min.css?1692870487" rel="stylesheet"/>
      <link href="<?php echo base_url()."assets/"; ?>dist/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
      <link href="<?php echo base_url()."assets/"; ?>dist/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
      <link href="<?php echo base_url()."assets/"; ?>dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
      <link href="<?php echo base_url()."assets/"; ?>dist/css/demo.min.css?1692870487" rel="stylesheet"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

        <script src="<?php echo base_url()."assets/"; ?>dist/js/demo-theme.min.js?1692870487"></script>

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
                                <span class="avatar avatar-sm">
                                    <?php if (!empty($open_information_employee_data['photo'])): ?>
                                        <img src="<?= base_url('uploads/photos/' . $open_information_employee_data['photo']); ?>" 
                                            alt="Employee Photo" 
                                            style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;">
                                    <?php else: ?>
                                        <span class="text-muted">No photo</span>
                                    <?php endif; ?>
                                </span>
                                <div class="d-none d-xl-block ps-2">
                                    <div><?= $open_information_employee_data['first_name'] . ' ' . $open_information_employee_data['last_name']; ?></div>
                                    <div class="mt-1 small text-secondary"><?= $open_information_employee_data['position']; ?></div>
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
                               <strong>Company:</strong>
                                <em id="clientName" class="text-azure">
                                    <?= $this->session->userdata('client_name') ?: 'Not verified yet' ?>
                                </em>
                                <br>
                                <strong>Location:</strong>
                                <em id="locationStatus" class="<?= $this->session->userdata('location_status') === 'Verified' ? 'text-lime' : 'text-danger' ?>">
                                    <?= $this->session->userdata('location_status') ?: 'Not Verified' ?>
                                </em>
                                •
                                <strong>Punch in</strong>
                                <em>--:--:--</em>
                                •
                                <strong>Punch out</strong>
                                <em>--:--:--</em>

                                </br></br>

                                <a href="#" id="punchInBtn" class="btn bg-lime-lt btn-pill w-20 disabled"
                                style="pointer-events: none; opacity: 0.6;" onclick="togglePunch(this)">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-power">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 6a7.75 7.75 0 1 0 10 0"></path>
                                        <path d="M12 4l0 8"></path>
                                    </svg>
                                    <span id="punchText">Punch in</span>
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

                                document.getElementById("greeting").textContent = `${greeting}, <?php echo $open_information_employee_data['first_name']; ?> <?php echo $open_information_employee_data['last_name']; ?>`;
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

        <script>
        const userRole = "<?= $this->session->userdata('role') ?>";

        navigator.geolocation.getCurrentPosition(
            function (position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                console.log("📍 User location:", lat, lon);

                fetch("<?= base_url('auth_ctrl/verify_location') ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ latitude: lat, longitude: lon }),
                })
                .then(async res => {
                    const contentType = res.headers.get("content-type");
                    if (!res.ok || !contentType || !contentType.includes("application/json")) {
                        throw new Error("Invalid JSON response or server error.");
                    }
                    return res.json();
                })
                .then(data => {
                    console.log("Server response:", data);
                    const punchBtn = document.getElementById("punchInBtn");
                    const clientName = document.getElementById("clientName");
                    const locationStatus = document.getElementById("locationStatus");

                    if (data.status === "verified") {
                        alert("Location verified! " + data.client_name);

                        clientName.textContent = data.client_name;
                        locationStatus.textContent = "Verified";
                        locationStatus.classList.remove("text-danger");
                        locationStatus.classList.add("text-lime");

                        if (userRole === "Guard") {
                            punchBtn.classList.remove("disabled");
                            punchBtn.style.pointerEvents = "auto";
                            punchBtn.style.opacity = "1";
                        }
                    } 

                    else if (data.status === "not_verified") {
                        alert("Location mismatch!");

                        clientName.textContent = "Not verified yet";
                        locationStatus.textContent = "Not Verified";
                        locationStatus.classList.remove("text-lime");
                        locationStatus.classList.add("text-danger");

                        if (userRole === "Guard") {
                            punchBtn.classList.add("disabled");
                            punchBtn.style.pointerEvents = "none";
                            punchBtn.style.opacity = "0.6";
                        }
                    } 

                    else if (data.status === "error" && data.message === "No Schedule found") {
                        alert("⚠️ No schedule found for today!");

                        clientName.textContent = "Main office";
                        locationStatus.textContent = "Not required";
                        locationStatus.classList.remove("text-lime");
                        locationStatus.classList.add("text-danger");

                        punchBtn.classList.add("disabled");
                        punchBtn.style.pointerEvents = "none";
                        punchBtn.style.opacity = "0.6";
                    } 

                    else {
                        alert("⚠️ " + data.message);
                    }

                    if (userRole !== "Guard") {
                        punchBtn.classList.remove("disabled");
                        punchBtn.style.pointerEvents = "auto";
                        punchBtn.style.opacity = "1";
                    }
                })
                .catch(error => {
                    console.error("Fetch error:", error);
                    alert("⚠️ Error verifying location.");
                });
            },
            function (error) {
                console.error("Geolocation error:", error.message);
                alert("Location access denied");
            },
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
        </script>


        <script>
        function togglePunch(button) {
            const punchText = document.getElementById("punchText");
            const action = punchText.textContent.trim().toLowerCase() === "punch in" ? "in" : "out";

            fetch("<?= base_url('staff_ctrl/record_attendance') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: "action=" + action
            })
            .then(res => res.json())
            .then(data => {
                alert(data.message);

                if (action === "in") {
                    punchText.textContent = "Punch out";
                    button.classList.remove("bg-lime-lt");
                    button.classList.add("bg-red-lt");
                } else {
                    punchText.textContent = "Punch in";
                    button.classList.remove("bg-red-lt");
                    button.classList.add("bg-lime-lt");
                }
            })
            .catch(err => {
                console.error("❌ Error punching:", err);
                alert("❌ Error saving punch data.");
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            fetch("<?= base_url('staff_ctrl/check_punch_status') ?>")
                .then(res => res.json())
                .then(data => {
                    const punchText = document.getElementById("punchText");
                    const punchBtn = document.getElementById("punchInBtn");

                    punchBtn.classList.remove("disabled");
                    punchBtn.style.pointerEvents = "auto";
                    punchBtn.style.opacity = "1";

                    if (data.status === "punchin") {
                        punchText.textContent = "Punch in";
                        punchBtn.classList.remove("bg-red-lt");
                        punchBtn.classList.add("bg-lime-lt");
                    } else if (data.status === "punchout") {
                        punchText.textContent = "Punch out";
                        punchBtn.classList.remove("bg-lime-lt");
                        punchBtn.classList.add("bg-red-lt");
                    }
                })
                .catch(err => {
                    console.error("Error checking punch status:", err);
                });
        });

        </script>

        <script src="<?php echo base_url()."assets/"; ?>dist/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
        <script src="<?php echo base_url()."assets/"; ?>dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487" defer></script>
        <script src="<?php echo base_url()."assets/"; ?>dist/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
        <script src="<?php echo base_url()."assets/"; ?>dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script>
        
        
        <script src="<?php echo base_url()."assets/"; ?>dist/js/tabler.min.js?1692870487" defer></script>
        <script src="<?php echo base_url()."assets/"; ?>dist/js/demo.min.js?1692870487" defer></script>
    
    </body>

</html>