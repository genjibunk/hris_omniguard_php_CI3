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

                                    <h3 class="h1">Attendance Data</h3>

                                    <div class="markdown text-secondary">

                                        Detailed logs of time-ins, time-outs, and daily work participation.

                                    </div>

                                    <div class="mt-3">

                                        <a href="<?php echo base_url();?>sbase_8nvp" class="btn btn-orange active">Back</a>

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
                                                            <th>Details</th>
                                                            <th>Remarks</th>
                                                            <th>
                                                            </th>
                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php foreach($attendance as $data  ) : ?>

                                                            <tr>

                                                                <td>

                                                                    <span style="font-weight:bold">Employee : </span><span style="font-style:italic"><?php echo $data['employeename']; ?></span><br>
                                                                    <span style="font-weight:bold">Location : </span><span style="font-style:italic"><?php echo $data['companyname']; ?> - <?php echo $data['clientname']; ?></span><br>
                                                                    <span style="font-weight:bold">Punch in : </span><span style="font-style:italic"><?php echo $data['punchin']; ?></span>
                                                                    <br>
                                                                    <span style="font-weight:bold">Punch out : </span><span style="font-style:italic"><?php echo $data['punchout']; ?></span>
                                                                    <br>
                                                                    <span style="font-weight:bold">Status : </span><span style="font-style:italic"><?php echo $data['attendance_status']; ?></span>
                                                                    <br>
                                                                    <span style="font-weight:bold">System Status : </span><span style="font-style:italic"><?php echo $data['status']; ?></span>
                                                                    <br>
                                                                </td>

                                                                <td>

                                                                    <span style="font-weight:bold">Remarks : </span><span style="font-style:italic"><?php echo $data['remarks']; ?></span>
                                                                   
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

<div class="modal fade" id="ManageAuth" tabindex="-1" aria-labelledby="ManageAuthLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?= base_url('admin_ctrl/update_auth') ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="ManageAuthLabel">Manage Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="userauth_id" id="modalUserAuthId">

          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" id="modalName" disabled>
          </div>

          <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-select" name="role" id="modalRole" required>
              <option value="Admin">Admin</option>
              <option value="Staff">Staff</option>
              <option value="Guard">Guard</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" id="modalStatus" required>
              <option value="Active">Active</option>
              <option value="Inactive">Inactive</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).on('click', '.openManageAuth', function () {
    const id = $(this).data('userauth-id');
    const name = $(this).data('name');
    const role = $(this).data('role');
    const status = $(this).data('status');

    $('#modalUserAuthId').val(id);
    $('#modalName').val(name);
    $('#modalRole').val(role);
    $('#modalStatus').val(status);
});


</script>


<script src="<?php echo base_url()."assets/"; ?>dist/js/search.js" defer></script>