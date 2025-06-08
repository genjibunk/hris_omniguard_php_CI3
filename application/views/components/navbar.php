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

              <img src="assets/logo/company_logo.PNG" style="width: 100%; height: auto;" alt="Tabler" class="navbar-brand-image me-2">

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

                    <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M15 15l3.35 3.35" /><path d="M9 15l-3.35 3.35" /><path d="M5.65 5.65l3.35 3.35" /><path d="M18.35 5.65l-3.35 3.35" /></svg>
                  
                  </span>

                  <span class="nav-link-title">

                    Help

                  </span>

                </a>

                <div class="dropdown-menu">

                  <a class="dropdown-item" href="" rel="noopener">

                    Documentation

                  </a>

                  <a class="dropdown-item" href="">

                    Changelog

                  </a>

                  <a class="dropdown-item" href="" rel="noopener">

                    Source code

                  </a>

                  <a class="dropdown-item text-pink" href="" target="_blank" rel="noopener">
                    
                    <svg class="icon icon-inline me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                    Sponsor project!

                  </a>

                </div>

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

              <img src="assets/logo/hris_mainlogo.PNG" style="width: 40px; height: auto;" alt="Tabler" class="navbar-brand-image me-2">Human Resource Information System

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