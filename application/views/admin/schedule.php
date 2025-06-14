<script>
<?php if ($this->session->flashdata('success')): ?>
    toastr.success("<?= $this->session->flashdata('success'); ?>");
<?php endif; ?>

<?php if ($this->session->flashdata('warning')): ?>
    toastr.warning("<?= $this->session->flashdata('warning'); ?>");
<?php endif; ?>
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                    Employee Records / Schedule<!-- <?php echo $this->session->userdata('userid'); ?>-->
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

                                    <h3 class="h1">Schedule</h3>

                                    <div class="markdown text-secondary">

                                        An organized timeline used to manage employee shifts or work routines.

                                    </div>
                                    
                                    </br>

                                </div>

                                <div class="col-12">

                                    <div class="card">
                                    
                                        <div class="card-body">

                                            <form id="scheduleForm" method="POST" action="<?= base_url('admin_ctrl/save_schedule') ?>">

                                                <div class="mb-3">

                                                    <label class="form-label">Branch Name</label>
                                                    <select id="clientDropdown" name="client_id" class="form-control" required>
                                                        <option value="">-- Select Branch --</option>
                                                    </select>

                                                </div> 

                                                <div class="mb-3">

                                                    <label class="form-label">Employee Name</label>
                                                    <select id="employeeSearch" name="employee_ids[]" multiple="multiple" class="form-control" required>
                                                    <option value="">-- Select Client --</option>
                                                    </select>

                                                </div>


                                                <div class="row">

                                                    <div class="col-lg-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">Date From</label>
                                                            <input type="date" class="form-control" id="schedule_date_from" name="schedule_date_from" required>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">Date To</label>
                                                            <input type="date" class="form-control" id="schedule_date_to" name="schedule_date_to" required>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">Time In</label>
                                                            <input type="time" class="form-control" id="schedule_time_in" name="schedule_time_in" required>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6">

                                                        <div class="mb-3">

                                                            <label class="form-label">Time Out</label>
                                                            <input type="time" class="form-control" id="schedule_time_out" name="schedule_time_out" required>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="mt-3">
                                                    <a href="<?php echo base_url();?>base_8nvp" class="btn btn-orange active">Back</a>
                                                    <button type="submit" class="btn btn-success">Save Schedule</button>
                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                    <br><br>

                                    <div class="card">

                                        <div class="card-body">

                                            <div class="d-flex">

                                                <div class="ms-auto text-secondary">

                                                    Search:
                                                    <div class="ms-2 d-inline-block">

                                                        <input type="text" id="search-input" class="form-control" aria-label="Search invoice">
                                                        
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="table-responsive">

                                                <table class="table card-table table-vcenter text-nowrap datatable">

                                                    <thead>

                                                        <tr>
                                                            <th>Details</th>
                                                            <th>
                                                            </th>
                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php foreach($schedule as $data  ) : ?>

                                                            <tr>

                                                                <td>

                                                                    <span style="font-weight:bold">Employee : </span><span style="font-style:italic"><?php echo $data['first_name']; ?> , <?php echo $data['last_name']; ?></span><br>
                                                                    <span style="font-weight:bold">Date : </span>
                                                                        <span style="font-style:italic">
                                                                            <?php
                                                                                $date_from = $data['date_from'];
                                                                                $date_to   = $data['date_to'];

                                                                                $from = new DateTime($date_from);
                                                                                $to   = new DateTime($date_to);

                                                                                if ($date_from === $date_to) {
                                                                                    
                                                                                    echo $from->format('F j, Y');
                                                                                } else {

                                                                                    echo $from->format('F j') . ' - ' . $to->format('j, Y');
                                                                                }

                                                                            ?>
                                                                        </span>
                                                                    
                                                                    <br>

                                                                    <span style="font-weight:bold">Time : </span><span style="font-style:italic"><?php echo $data['punchin']; ?> - <?php echo $data['punchout']; ?></span><br>
                                                                    <span style="font-weight:bold">Location : </span><span style="font-style:italic; color:blue"><?php echo $data['company']; ?></span>

                                                                </td>
           
                                                                <td class="text-end">

                                                                    <a href="#" 
                                                                        class="btn btn-ghost-red open-delete-modal" 
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#modal-danger"
                                                                        data-id="<?= $data['schedule_id'] ?>"
                                                                        data-name="<?= $data['first_name'] . ' ' . $data['last_name'] ?>">

                                                                        <svg  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M4 7l16 0"></path><path d="M10 11l0 6"></path>
                                                                            <path d="M14 11l0 6"></path>
                                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                        </svg>
                                                                        Remove

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

                                </div>

                            </div>

                        </div>

                    </div>

                </div>   
              
            </div>
            
          </div>

        </div>
        
    </div>

</div>

<script>
$(document).ready(function() {
    $('#employeeSearch').select2({
        placeholder: "Search and select employees",
        minimumInputLength: 2,
        ajax: {
            url: "<?php echo base_url('admin_ctrl/search_employees'); ?>",
            type: "POST",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    term: params.term
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.employee_data_id,
                            text: item.full_name
                        }
                    })
                };
            },
            cache: true
        }
    });
});
</script>

<script>
$(document).ready(function() {
    $.ajax({
        url: "<?php echo base_url('admin_ctrl/load_company'); ?>",
        type: "GET",
        dataType: "json",
        success: function(data) {
            if (data.length > 0) {
                $.each(data, function(index, item) {
                    $('#clientDropdown').append(
                        $('<option>', {
                            value: item.client_id,
                            text: item.full_name
                        })
                    );
                });
            }
        }
    });
});
</script>


<div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">

        <form method="post" action="<?= base_url('admin_ctrl/delete_schedule') ?>">

            <div class="modal-content">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="modal-status bg-danger"></div>

                <div class="modal-body text-center py-4">

                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                        <path d="M12 9v4" /><path d="M12 17h.01" />
                    </svg>

                    <h3>Are you sure?</h3>

                    <div class="text-secondary" id="modal-delete-message">

                        Do you really want to remove this schedule? This action cannot be undone.

                    </div>

                    <input type="hidden" name="schedule_id" id="modal-schedule-id">

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Remove</button>

                </div>

            </div>

        </form>
        
    </div>
</div>

<script>
$(document).ready(function () {
  $('.open-delete-modal').on('click', function () {
    const scheduleId = $(this).data('id');
    const name = $(this).data('name');

    $('#modal-schedule-id').val(scheduleId);

    $('#modal-delete-message').html(
      'Do you really want to remove <strong>' + name + '</strong>? This action cannot be undone.'
    );
  });
});
</script>

<script src="<?php echo base_url()."assets/"; ?>dist/js/search.js" defer></script>

