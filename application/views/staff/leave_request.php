<div class="page">

    <div class="page-wrapper">

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

                                    <h3 class="h1">Leave Request</h3>

                                    <div class="markdown text-secondary">

                                        Allows employees to request time off.

                                    </div>

                                    <div class="mt-3">

                                        <a href="<?php echo base_url();?>sbase_8nvp" class="btn btn-orange active">Back</a>

                                        <a href="" class="btn btn-primary active" data-bs-toggle="modal" data-bs-target="#modal-leave">New Request</a>

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

                                                    <tbody>

                                                        <?php foreach($leaverequest as $data) : ?>

                                                            <tr>
                                                                <td>
                                                                    <span style="font-weight:bold">Employee : </span>
                                                                    <span style="font-style:italic"><?php echo $data['first_name']; ?> , <?php echo $data['last_name']; ?></span><br>
                                                                    
                                                                    <span style="font-weight:bold">Leave Type : </span>
                                                                    <span style="font-style:italic"><?php echo $data['leavetype']; ?></span><br>
                                                                    
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
                                                                    </span><br>

                                                                    <span style="font-weight:bold">Total : </span>
                                                                    <span style="font-style:italic"><?php echo $data['total']; ?></span><br>

                                                                    <span style="font-weight:bold">Status : </span>
                                                                    <span style="font-style:italic">
                                                                        <?php if ($data['status'] === 'Approved') : ?>
                                                                            <span class="badge bg-lime text-lime-fg">Approved</span>
                                                                        <?php elseif ($data['status'] === 'Declined') : ?>
                                                                            <span class="badge bg-red text-red-fg">Declined</span>
                                                                        <?php else: ?>
                                                                            <span class="badge bg-warning text-warning-fg"><?php echo $data['status']; ?></span>
                                                                        <?php endif; ?>
                                                                    </span><br>

                                                                    <span style="font-weight:bold">Approver : </span>
                                                                    <span style="font-style:italic"><?php echo $data['updated_by_last_name']; ?> <?php echo $data['updated_by_first_name']; ?></span><br><br>

                                                                    <!-- <?php if ($data['status'] === 'Pending') : ?>
                                                                        <a href="#" class="btn btn-red openDeleteModal" data-leaverequest-id="<?= $data['leaverequest_id'] ?>">
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                <path d="M4 7l16 0"></path>
                                                                                <path d="M10 11l0 6"></path>
                                                                                <path d="M14 11l0 6"></path>
                                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                            </svg>
                                                                            Remove
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <button class="btn btn-secondary" disabled>
                                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                <path d="M4 7l16 0"></path>
                                                                                <path d="M10 11l0 6"></path>
                                                                                <path d="M14 11l0 6"></path>
                                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                            </svg>
                                                                            Remove
                                                                        </button>
                                                                    <?php endif; ?> -->

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

<div class="modal modal-blur fade" id="modal-leave" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">Request Leave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            
            <form action="<?= base_url('staff_ctrl/insert_leave_request') ?>" method="post" id="leaveRequestForm">

                <div class="modal-body">

                    <div class="row mb-3 align-items-end">

                        <div class="col-auto">
                        
                            <span class="avatar avatar-xl">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-location-broken"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12.896 19.792l-2.896 -5.792l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5l-3.487 9.657"></path><path d="M21.5 21.5l-5 -5"></path><path d="M16.5 21.5l5 -5"></path></svg>
                            
                            </span>

                        </div>

                        <div class="col">

                            <label class="form-label required">Leave Type</label>

                            <select class="form-select" id="leave_type" name="leave_type" required>
                                <option value="Service Incentive Leave (SIL)">Service Incentive Leave (SIL)</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="Vacation Leave">Vacation Leave</option>
                            </select>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label class="form-label required">Date from</label>

                        <input type="date" class="form-control" id="leave_date_from" name="leave_date_from" required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label required">Date to</label>

                        <input type="date" class="form-control" id="leave_date_to" name="leave_date_to" required>

                    </div>

                    <div class="mb-3">
                        <label class="form-label required">Total Days</label>
                        <input type="number" class="form-control" name="total_days" id="total_days" readonly required>
                    </div>


                </div>

                <div class="modal-footer">

                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Request</button>
                    
                </div>

            </form>

        </div>

    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const fromInput = document.getElementById('leave_date_from');
        const toInput = document.getElementById('leave_date_to');
        const totalDaysInput = document.getElementById('total_days');

        function calculateDays() {
            const fromDate = new Date(fromInput.value);
            const toDate = new Date(toInput.value);

            if (fromInput.value && toInput.value && toDate >= fromDate) {
                const timeDiff = toDate.getTime() - fromDate.getTime();
                const dayDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) + 1; // Include both dates
                totalDaysInput.value = dayDiff;
            } else {
                totalDaysInput.value = '';
            }
        }

        fromInput.addEventListener('change', calculateDays);
        toInput.addEventListener('change', calculateDays);
    });

</script>


<!-- Delete Confirmation Modal -->
<div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <form method="post" action="<?= base_url('staff_ctrl/delete_leaverequest') ?>">
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
          <div class="text-secondary">
            Do you really want to remove this leave request? This action cannot be undone.
          </div>
          <input type="hidden" name="leaverequest_id" id="modal-leaverequest-id">
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
$(document).ready(function() {
    $('.openDeleteModal').click(function() {
        var requestId = $(this).data('leaverequest-id');
        $('#modal-leaverequest-id').val(requestId);
        $('#modal-danger').modal('show');
    });
});
</script>



<script src="<?php echo base_url()."assets/"; ?>dist/js/search.js" defer></script>