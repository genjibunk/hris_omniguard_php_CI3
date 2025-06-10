<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
<?php if ($this->session->flashdata('success')): ?>
    toastr.success("<?= $this->session->flashdata('success'); ?>");
<?php endif; ?>

<?php if ($this->session->flashdata('warning')): ?>
    toastr.warning("<?= $this->session->flashdata('warning'); ?>");
<?php endif; ?>
</script>

<?php if ($this->session->flashdata('success')) : ?>
  <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>

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
                    Employee Records / Leave Requests<!-- <?php echo $this->session->userdata('userid'); ?>-->
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

                                    <h3 class="h1">Leave Requests</h3>

                                    <div class="markdown text-secondary">

                                        Requests made by staff to use their leave credits for personal or medical reasons.

                                    </div>

                                    <div class="mt-3">

                                        <a href="<?php echo base_url();?>base_8nvp" class="btn btn-primary active">Back</a>

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
                                                            <th>Leave type</th>
                                                            <th>Date From - To</th>
                                                            <th>Total Credit</th>
                                                            <th>Status</th>
                                                            <th>Update by</th>
                                                            
                                                            <th></th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php foreach($leaverequest as $data  ) : ?>

                                                            <tr>

                                                                <td><?php echo $data['last_name']; ?> , <?php echo $data['first_name']; ?> </td>
                                                                <td><?php echo $data['leavetype']; ?></td>
                                                                <td><?php echo $data['date_from']; ?> - <?php echo $data['date_to']; ?></td>
                                                                <td><?php echo $data['total']; ?></td>
                                                                <td>
                                                                    <?php if ($data['status'] === 'Approved') : ?>
                                                                        <span class="badge bg-lime text-lime-fg">Approved</span>
                                                                    <?php elseif ($data['status'] === 'Declined') : ?>
                                                                        <span class="badge bg-red text-red-fg">Declined</span>
                                                                    <?php else: ?>
                                                                        <span class="badge bg-secondary text-secondary-fg"><?php echo $data['status']; ?></span>
                                                                    <?php endif; ?>
                                                                </td>

                                                                <td><?php echo $data['updated_by_last_name']; ?> <?php echo $data['updated_by_first_name']; ?></td>
                                                                <td class="text-end">

                                                                    <a href="#" class="btn btn-ghost-yellow openApproveModal"
                                                                        data-request-id="<?= $data['leaverequest_id'] ?>"
                                                                        data-employee-id="<?= $data['employee_data_id'] ?>"
                                                                        data-leave-type="<?= $data['leavetype'] ?>"
                                                                        data-total="<?= $data['total'] ?>">

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

<div class="modal fade" id="approveModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="post" action="<?= base_url('admin_ctrl/leaverequest_status') ?>" id="leaveRequestForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Leave Request</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <p id="leaveRequestMessage">Are you sure you want to approve this leave request and deduct credits?</p>

          <input type="hidden" name="request_id" id="approveRequestId">
          <input type="hidden" name="employee_id" id="approveEmployeeId">
          <input type="hidden" name="leave_type" id="approveLeaveType">
          <input type="hidden" name="total" id="approveTotal">
          <input type="hidden" name="action" id="actionType">

          <div class="mb-3" id="commentSection" style="display: none;">
            <label for="decline_comment" class="form-label">Reason for Decline</label>
            <textarea class="form-control" name="decline_comment" id="declineComment" rows="3" placeholder="Enter comment..."></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success" onclick="setAction('approve')">Approve</button>
          <button type="submit" class="btn btn-danger" onclick="setAction('decline')">Decline</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>

    function setAction(type) {
        document.getElementById('actionType').value = type;

        if (type === 'decline') {
            const comment = document.getElementById('declineComment').value.trim();
            if (comment === '') {
                alert('Please provide a reason for declining.');
                event.preventDefault(); // Cancel form submission
                return false;
            }
        }
        return true;
    }

    document.addEventListener('DOMContentLoaded', function () {
        const approveModal = new bootstrap.Modal(document.getElementById('approveModal'));

        document.querySelectorAll('.openApproveModal').forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('approveRequestId').value = this.dataset.requestId;
                document.getElementById('approveEmployeeId').value = this.dataset.employeeId;
                document.getElementById('approveLeaveType').value = this.dataset.leaveType;
                document.getElementById('approveTotal').value = this.dataset.total;

                // Reset comment field and hide
                document.getElementById('declineComment').value = '';
                document.getElementById('commentSection').style.display = 'none';
                document.getElementById('leaveRequestMessage').innerText = "Are you sure you want to approve this leave request and deduct credits?";

                approveModal.show();
            });
        });

        // Show comment section only if Decline button is clicked
        document.querySelector('.btn-danger').addEventListener('click', function () {
            document.getElementById('commentSection').style.display = 'block';
            document.getElementById('leaveRequestMessage').innerText = "Are you sure you want to decline this leave request?";
        });
    });

</script>

<script src="<?php echo base_url()."assets/"; ?>dist/js/search.js" defer></script>