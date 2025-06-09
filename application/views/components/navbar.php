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

  <body >

    <script src="<?php echo base_url()."assets/"; ?>dist/js/demo-theme.min.js?1692870487"></script>

    <div class="page">

      <!-- Sidebar -->

      <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">

        <div class="container-fluid">

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          
          </button>

          <h1 class="navbar-brand navbar-brand-autodark">

            <a href="">

              <img src="<?php echo base_url()."assets/"; ?>logo/company_logo.PNG" style="width: 100%; height: auto;" alt="Tabler" class="navbar-brand-image me-2">

            </a>

          </h1>
          
          <div class="collapse navbar-collapse" id="sidebar-menu">

            <ul class="navbar-nav pt-lg-3">

              <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url();?>base_8nvp" >

                  <span class="nav-link-icon d-md-none d-lg-inline-block">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l-2 0l9 -9l9 9l-2 0"></path><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path></svg>
                  
                  </span>

                  <span class="nav-link-title">

                      Home

                  </span>

                </a>

              </li>
             
              <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="false" >

                  <span class="nav-link-icon d-md-none d-lg-inline-block">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-friends"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5"></path><path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path><path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4"></path></svg>
                  
                  </span>

                  <span class="nav-link-title">

                    Employee Records

                  </span>

                </a>

                <div class="dropdown-menu">

                  <a class="dropdown-item" href="<?php echo base_url();?>info_a7xk">

                    Information

                  </a>

                  <a class="dropdown-item" href="">

                    Absences

                  </a>

                  <a class="dropdown-item" href="">

                    Leave Credits

                  </a>

                  <a class="dropdown-item" href="" rel="noopener">

                    Attendance

                  </a>

                  <a class="dropdown-item" href="" rel="noopener">

                    Schedule

                  </a>

                  <a class="dropdown-item" href="" rel="noopener">

                    Accounts

                  </a>

                </div>

              </li>

              <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url();?>base_8nvp" >

                  <span class="nav-link-icon d-md-none d-lg-inline-block">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-buildings"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15"></path><path d="M16 8h2c1 0 2 1 2 2v11"></path><path d="M3 21h18"></path><path d="M10 12v0"></path><path d="M10 16v0"></path><path d="M10 8v0"></path><path d="M7 12v0"></path><path d="M7 16v0"></path><path d="M7 8v0"></path><path d="M17 12v0"></path><path d="M17 16v0"></path></svg>
                  
                  </span>

                  <span class="nav-link-title">

                      Clients

                  </span>

                </a>

              </li>

              <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url();?>base_8nvp" >

                  <span class="nav-link-icon d-md-none d-lg-inline-block">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697"></path><path d="M18 14v4h4"></path><path d="M18 11v-4a2 2 0 0 0 -2 -2h-2"></path><path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M8 11h4"></path><path d="M8 15h3"></path></svg>
                  
                  </span>

                  <span class="nav-link-title">

                      Payroll

                  </span>

                </a>

              </li>

              <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url();?>base_8nvp" >

                  <span class="nav-link-icon d-md-none d-lg-inline-block">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-invoice"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 3v4a1 1 0 0 0 1 1h4"></path><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path><path d="M9 7l1 0"></path><path d="M9 13l6 0"></path><path d="M13 17l2 0"></path></svg>

                  </span>

                  <span class="nav-link-title">

                      Billing

                  </span>

                </a>

              </li>

              <li class="nav-item">

                <a class="nav-link" href="<?php echo base_url();?>" >

                  <span class="nav-link-icon d-md-none d-lg-inline-block">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"></path><path d="M15 12h-12l3 -3"></path><path d="M6 15l-3 -3"></path></svg>
                  
                  </span>
                  <span class="nav-link-title">

                    Logout

                  </span>
                </a>

              </li>

            </ul>
          </div>
        </div>

      </aside>

      <!-- Sidebar -->

      <!-- Header -->

      <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none" >

        <div class="container-xl">

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            
            <span class="navbar-toggler-icon"></span>

          </button>
          
          <div class="collapse navbar-collapse" id="navbar-menu">

            <div>

              <img src="<?php echo base_url()."assets/"; ?>logo/hris_mainlogo.PNG" style="width: 40px; height: auto;" alt="Tabler" class="navbar-brand-image me-2">Human Resource Information System

            </div>

          </div>

        </div>

      </header>

      <!-- Header -->
 
    <script src="<?php echo base_url()."assets/"; ?>dist/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
    <script src="<?php echo base_url()."assets/"; ?>dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487" defer></script>
    <script src="<?php echo base_url()."assets/"; ?>dist/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
    <script src="<?php echo base_url()."assets/"; ?>dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script>
    
    <script src="<?php echo base_url()."assets/"; ?>dist/js/tabler.min.js?1692870487" defer></script>
    <script src="<?php echo base_url()."assets/"; ?>dist/js/demo.min.js?1692870487" defer></script>
    
  </body>
</html>