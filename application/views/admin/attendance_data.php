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
                    Employee Records / Attendance / Attendance data<!-- <?php echo $this->session->userdata('userid'); ?>-->
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

                                    <h3 class="h1">Attendance data</h3>

                                    <div class="markdown text-secondary">

                                        Detailed logs of time-ins, time-outs, and daily work participation.

                                    </div>

                                    <div class="mt-3">

                                        <a href="<?php echo base_url();?>Atnd_n5gw" class="btn btn-orange active">Back</a>

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
                                                            <th>Punch in</th>
                                                            <th>Punch out</th>
                                                            <th>Status</th>
                                                            <th>System Status</th>
                                                            <th>Remarks</th>

                                                            <th></th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php foreach($attendance_data as $data  ) : ?>

                                                            <tr>

                                                                <td><?php echo $data['first_name']; ?> , <?php echo $data['last_name']; ?> ( <?php echo $data['name']; ?> )</td>
                                                                <td><?php echo $data['punchin']; ?> </td>
                                                                <td><?php echo $data['punchout']; ?> </td>
                                                                <td>
                                                                    <?php
                                                                    $badge_class = 'bg-light text-dark'; // Default class
                                                                    $icon_svg = ''; // Default icon

                                                                    switch ($data['attendance_status']) {
                                                                        case 'Punched Out':
                                                                            $badge_class = 'bg-lime-lt';
                                                                            $icon_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-power">
                                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                            <path d="M7 6a7.75 7.75 0 1 0 10 0"></path>
                                                                                            <path d="M12 4l0 8"></path>
                                                                                        </svg>';
                                                                            break;

                                                                        case 'No Punch out':
                                                                            $badge_class = 'bg-red-lt';
                                                                            $icon_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-power">
                                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                            <path d="M7 6a7.75 7.75 0 1 0 10 0"></path>
                                                                                            <path d="M12 4l0 8"></path>
                                                                                        </svg>';
                                                                            break;

                                                                        default:
                                                                            // Already set to default values at the top
                                                                            break;
                                                                    }
                                                                    ?>
                                                                    <span class="badge <?php echo $badge_class; ?> me-1 d-flex align-items-center">
                                                                        <?php echo $icon_svg; ?>
                                                                        <?php echo htmlspecialchars($data['attendance_status']); ?>
                                                                    </span>
                                                                </td>

                                                                <td>
                                                                    <?php
                                                                    $badge_class = 'bg-light text-dark'; // Default class
                                                                    $icon_svg = ''; // Default icon

                                                                    switch ($data['status']) {
                                                                        case 'Approved':
                                                                            $badge_class = 'bg-lime-lt';
                                                                            $icon_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-checks">
                                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                            <path d="M7 12l5 5l10 -10"></path>
                                                                                            <path d="M2 12l5 5m5 -5l5 -5"></path>
                                                                                        </svg>';
                                                                            break;

                                                                        case 'For Approval':
                                                                            $badge_class = 'bg-orange-lt';
                                                                            $icon_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-hourglass">
                                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                            <path d="M6.5 7h11"></path>
                                                                                            <path d="M6.5 17h11"></path>
                                                                                            <path d="M6 20v-2a6 6 0 1 1 12 0v2a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1z"></path>
                                                                                            <path d="M6 4v2a6 6 0 1 0 12 0v-2a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1z"></path>
                                                                                        </svg>';
                                                                            break;

                                                                        case 'Disapproved':
                                                                            $badge_class = 'bg-red-lt';
                                                                            $icon_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                            <path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path>
                                                                                        </svg>';
                                                                            break;

                                                                        default:
                                                                            // Already set to default values at the top
                                                                            break;
                                                                    }
                                                                    ?>
                                                                    <span class="badge <?php echo $badge_class; ?> me-1 d-flex align-items-center">
                                                                        <?php echo $icon_svg; ?>
                                                                        <?php echo htmlspecialchars($data['status']); ?>
                                                                    </span>
                                                                </td>
                                                                <td><?php echo $data['remarks']; ?> </td>
                                                                
                                                                <td class="text-end">

                                                                    <?php
                                                                    // Encrypt the ID
                                                                    $encrypted_employee_data_id = base64_encode($this->encryption->encrypt($data['employee_data_id']));
                                                                    
                                                                    ?>
                                                                    
                                                                    <?php
                                                                    $is_disabled = trim($data['status']) === '-' ? true : false;
                                                                    ?>

                                                                    <a href="#"
                                                                    class="btn btn-ghost-azure <?php echo $is_disabled ? 'disabled' : ''; ?>"
                                                                    <?php if (!$is_disabled): ?>
                                                                        tabindex="-1" aria-disabled="true"
                                                                    <?php endif; ?>>

                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                                                            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                                                            <path d="M9 12h6"></path>
                                                                            <path d="M9 16h6"></path>
                                                                        </svg>
                                                                        Evaluate

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