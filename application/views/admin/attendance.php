<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('success')): ?>
            toastr.success("<?= $this->session->flashdata('success') ?>");
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            toastr.error("<?= $this->session->flashdata('error') ?>");
        <?php endif; ?>

        <?php if ($this->session->flashdata('warning')): ?>
            toastr.warning("<?= $this->session->flashdata('warning') ?>");
        <?php endif; ?>

        <?php if ($this->session->flashdata('info')): ?>
            toastr.info("<?= $this->session->flashdata('info') ?>");
        <?php endif; ?>
    });
</script>


<div class="page">

    <div class="page-wrapper">

        <div class="page-header d-print-none">

          <div class="container-xl">

            <div class="row g-2 align-items-center">

                <div class="col">

                    <div class="page-pretitle">
                    Overview
                    </div>
                    <h2 class="page-title">
                    Employee Records / Attendance<!-- <?php echo $this->session->userdata('userid'); ?>-->
                    </h2>

                </div>
                
              
            </div>

          </div>

        </div>

        <div class="page-body">
            
          <div class="container-xl">

            <div class="row row-deck row-cards">  
              
                <div class="col-12">

                    <div class="card card-md">

                        <div class="card-stamp card-stamp-lg">

                            <div class="card-stamp-icon bg-primary">

                                <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01"></path></svg>
                            
                            </div>

                        </div>

                        <div class="card-body">

                            <div class="row align-items-center">

                                <div class="col-10">

                                    <h3 class="h1">Attendance</h3>

                                    <div class="markdown text-secondary">

                                        Documentation of who is present or absent on a given workday.

                                    </div>

                                    <div class="mt-3">

                                        <a href="<?php echo base_url();?>base_8nvp" class="btn btn-orange active">Back</a>

                                    </div>

                                    </br>

                                </div>

                                <!-- table -->
                                     

                                    <div class="col-12">

                                        <div class="card">
                                        
                                            <div class="card-body border-bottom py-3">

                                                <div class="d-flex">

                                                    <div class="ms-auto text-secondary">

                                                        Search:
                                                        <div class="ms-2 d-inline-block">

                                                            <input type="text" id="search-input" class="form-control" aria-label="Search invoice">
                                                        
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="table-responsive">

                                                <table class="table card-table table-vcenter text-nowrap datatable">

                                                    <thead>

                                                        <tr>
                                                        
                                                            <th>Name</th>

                                                            <th></th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php foreach($attendance as $data  ) : ?>

                                                            <tr>

                                                                <td style="width: 8%;">
                                                                    <?php if (!empty($data['photo'])): ?>
                                                                        <img src="<?php echo base_url('uploads/photos/' . $data['photo']); ?>" alt="Employee Photo" style="width: 100%; height: 80px; object-fit: cover; border-radius: 5px;">
                                                                    <?php else: ?>
                                                                        <span class="text-muted">No photo</span>
                                                                    <?php endif; ?>
                                                                </td>

                                                                <td><?php echo $data['first_name']; ?> , <?php echo $data['last_name']; ?> </td>
                                                                
                                                                <td class="text-end">

                                                                    <?php
                                                                    // Encrypt the ID
                                                                    $encrypted_employee_data_id = base64_encode($this->encryption->encrypt($data['employee_data_id']));
                                                                    
                                                                    ?>
                                        
                                                                    <a href="<?php echo site_url("atndfile_n5gw/$encrypted_employee_data_id"); ?>" class="btn btn-ghost-azure">
                                                                        <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-folder">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2"></path>
                                                                        </svg>
                                                                    Open
                                                                    </a>


                                                                </td> 

                                                            </tr>
                                                        <?php endforeach; ?>
                                                        
                                                    </tbody>

                                                </table>

                                            </div>

                                            <div class="card-footer d-flex align-items-center">

                                                <ul class="pagination m-0 ms-auto" id="pagination-container">
                                                    
                                                </ul>

                                            </div>

                                        </div>

                                    </div>
            
                                    <!-- table --> 

                            </div>

                        </div>

                    </div>

                </div>   
              
            </div>
            
          </div>

        </div>
        
    </div>

</div>


<script src="<?php echo base_url()."assets/"; ?>dist/js/search.js" defer></script>