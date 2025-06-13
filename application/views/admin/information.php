<script>
$(document).ready(function() {
    <?php if ($this->session->flashdata('success')): ?>
        toastr.success("<?= $this->session->flashdata('success') ?>");
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        toastr.error("<?= $this->session->flashdata('error') ?>");
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
                    Employee Records / Information<!-- <?php echo $this->session->userdata('userid'); ?>-->
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

                                    <h3 class="h1">Employee Information</h3>

                                    <div class="markdown text-secondary">

                                        Data encompassing the personal and work-related details of an employee for administrative purposes.

                                    </div>

                                    <div class="mt-3">

                                        <a href="<?php echo base_url();?>base_8nvp" class="btn btn-orange active">Back</a>

                                        <a href="<?php echo base_url();?>view_add_v3sw" class="btn btn-primary active">New Employee</a>

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
                                                        
                                                            <th>Photo</th>
                                                            <th>Name</th>
                                                            <th>Contact</th>
                                                            <th>Position</th>
                                                            <th>System role</th>
                                                            
                                                            <th></th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php foreach($information as $data  ) : ?>

                                                            <tr>
                                                                
                                                                <td style="width: 8%;">
                                                                    <?php if (!empty($data['photo'])): ?>
                                                                        <img src="<?php echo base_url('uploads/photos/' . $data['photo']); ?>" alt="Employee Photo" style="width: 100%; height: 80px; object-fit: cover; border-radius: 5px;">
                                                                    <?php else: ?>
                                                                        <span class="text-muted">No photo</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo $data['last_name']; ?> , <?php echo $data['first_name']; ?> </td>
                                                                <td><?php echo $data['contact_number']; ?></td>
                                                                <td>

                                                                    <?php
                                                                        $badge_class = '';
                                                                        $icon_svg = '';

                                                                        switch ($data['position']) {
                                                                            case 'Admin':
                                                                                $badge_class = 'bg-lime-lt';
                                                                                $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-user me-1" style="min-width:16px;">
                                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                                                </svg>';
                                                                                break;

                                                                            case 'Staff':
                                                                                $badge_class = 'bg-blue-lt';
                                                                                $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users-minus me-1" style="min-width:16px;">
                                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                    <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.948 0 1.818 .33 2.504 .88"></path>
                                                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                                                    <path d="M16 19h6"></path>
                                                                                </svg>';
                                                                                break;

                                                                            case 'Guard':
                                                                                $badge_class = 'bg-orange-lt';
                                                                                $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-shield me-1" style="min-width:16px;">
                                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h2"></path>
                                                                                    <path d="M22 16c0 4 -2.5 6 -3.5 6s-3.5 -2 -3.5 -6c1 0 2.5 -.5 3.5 -1.5c1 1 2.5 1.5 3.5 1.5z"></path>
                                                                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                                                </svg>';
                                                                                break;

                                                                            default:
                                                                                $badge_class = 'bg-light text-dark';
                                                                                $icon_svg = '';
                                                                                break;
                                                                        }
                                                                    ?>

                                                                    <span class="badge <?php echo $badge_class; ?> me-1 d-flex align-items-center">
                                                                        <?php echo $icon_svg; ?>
                                                                        <?php echo htmlspecialchars($data['position']); ?>
                                                                    </span>

                                                                </td>

                                                                <td>

                                                                    <?php
                                                                    $role = $data['role'];
                                                                    $badge_class = '';

                                                                    switch ($role) {
                                                                        case 'Admin':
                                                                            $badge_class = 'bg-success';
                                                                            break;
                                                                        case 'Staff':
                                                                            $badge_class = 'bg-primary';
                                                                            break;
                                                                        case 'Operation':
                                                                            $badge_class = 'bg-danger';
                                                                            break;
                                                                        case 'Guard':
                                                                            $badge_class = 'bg-warning';
                                                                            break;
                                                                        default:
                                                                            $badge_class = 'bg-secondary'; // fallback color
                                                                    }
                                                                    ?>
                                                                    <span class="badge <?php echo $badge_class; ?> me-1"></span> <?php echo htmlspecialchars($role); ?>

                                                                </td>

                                                                <td class="text-end">

                                                                    <?php
                                                                    // Encrypt the ID
                                                                    $encrypted_employee_data_id = base64_encode($this->encryption->encrypt($data['employee_data_id']));
                                                                    
                                                                    ?>
                                        
                                                                    <a class="btn btn-ghost-azure" href="<?php echo site_url("open_z3bt/$encrypted_employee_data_id"); ?>" class="status status-blue ms-auto">

                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>

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