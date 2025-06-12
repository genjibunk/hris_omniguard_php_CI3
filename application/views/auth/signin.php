

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
  <body  class=" d-flex flex-column">
    <script src="assets/dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="card card-md">
          <div class="card-body">
            <a href="#" class="navbar-brand navbar-brand-autodark d-flex align-items-center text-decoration-none">
            <img src="assets/logo/hris_mainlogo.PNG" style="width: 60px; height: auto; min-w-[60px]" alt="Tabler" class="navbar-brand-image me-2">

            Human Resource Information System
       
            </a>
            </br>
           
            <?php if ($this->session->flashdata('session_expired')): ?>
            <script>
              document.addEventListener('DOMContentLoaded', function () {
                Toastify({
                  text: "<?php echo $this->session->flashdata('session_expired'); ?>",
                  duration: 3000,
                  gravity: "top", 
                  position: "right", 
                  style: {
                    background: "#ffcc00",
                    color: "#000",
                    fontSize: "14px",
                    borderRadius: "8px",
                    padding: "10px 20px"
                  }
                }).showToast();
              });
            </script>
            <?php endif; ?>
            <script>
                <?php if($this->session->flashdata('success')): ?>
                    toastr.success("<?= $this->session->flashdata('success'); ?>");
                <?php endif; ?>

                <?php if($this->session->flashdata('error')): ?>
                    toastr.error("<?= $this->session->flashdata('error'); ?>");
                <?php endif; ?>
            </script>

            <form method="post" action="<?php echo site_url('auth4r9x'); ?>">
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="your@email.com" autocomplete="off">
              </div>
              <div class="mb-2">
                <label class="form-label">Password</label>
                <div class="input-group input-group-flat">
                  <input type="text" class="form-control" name="password" placeholder="Your password" autocomplete="off">
                </div>
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </div>
            </form>

          </div>
          <!-- <div class="card-body">
           <img src="assets/logo/company_logo.PNG" style="width: 100%; height: auto;" alt="Tabler" class="navbar-brand-image me-2">
          </div> -->
        </div>
      </div>
    </div>

    <script src="<?php echo base_url()."assets/"; ?>dist/js/tabler.min.js?1692870487" defer></script>
    <script src="<?php echo base_url()."assets/"; ?>dist/js/demo.min.js?1692870487" defer></script>
  </body>
</html>