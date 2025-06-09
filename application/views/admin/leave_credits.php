
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
                    Employee Records / Leave Credits<!-- <?php echo $this->session->userdata('userid'); ?>-->
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

                                    <h3 class="h1">Leave Credits</h3>

                                    <div class="markdown text-secondary">

                                        Total allowable days an employee can take off work without loss of pay.

                                    </div>

                                    <div class="mt-3">

                                        <a href="" class="btn btn-primary active" data-bs-toggle="modal" data-bs-target="#modal-team">Set Credits</a>

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
                                        
                                                                    <a class="btn btn-ghost-yellow" href="<?php echo site_url("open_z3bt/$encrypted_employee_data_id"); ?>" class="status status-blue ms-auto">

                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-folder"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 3a1 1 0 0 1 .608 .206l.1 .087l2.706 2.707h6.586a3 3 0 0 1 2.995 2.824l.005 .176v8a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-11a3 3 0 0 1 2.824 -2.995l.176 -.005h4z"></path></svg>

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

<!-- modals -->

<div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Set Credits</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            
            <form action="<?= base_url('admin_ctrl/insert_leavecredits_for_all') ?>" method="post">

                <div class="modal-body">

                    <div class="row mb-3 align-items-end">

                        <div class="col-auto">
                        
                            <span class="avatar avatar-xl">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-location-broken"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12.896 19.792l-2.896 -5.792l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5l-3.487 9.657"></path><path d="M21.5 21.5l-5 -5"></path><path d="M16.5 21.5l5 -5"></path></svg>
                            
                            </span>

                        </div>

                        <div class="col">

                            <label class="form-label required">Credit Type</label>

                            <select class="form-select" name="description" required>
                                <option value="Service Incentive Leave (SIL)">Service Incentive Leave (SIL)</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="Vacation Leave">Vacation Leave</option>
                            </select>

                        </div>

                    </div>

                    <div>

                        <label class="form-label required">Additional info</label>

                        <select class="form-select" name="year" required>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Set</button>
                    
                </div>

            </form>

        </div>

    </div>

</div>
