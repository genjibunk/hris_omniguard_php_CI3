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
                    Employee Records / Accounts<!-- <?php echo $this->session->userdata('userid'); ?>-->
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

                                    <h3 class="h1">Accounts</h3>

                                    <div class="markdown text-secondary">

                                        Access the system using account credentials.

                                    </div>

                                    <div class="mt-3">

                                        <a href="<?php echo base_url();?>Base_8nvp" class="btn btn-orange active">Back</a>

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
                                                            <th>System Role</th>
                                                            <th>Account Status</th>

                                                            <th></th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php foreach($accounts as $data  ) : ?>

                                                            <tr>

                                                                <td><?php echo $data['name']; ?></td>

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

                                                                <td><?php echo $data['status']; ?></td>
                                                                
                                                                <td class="text-end">

                                                                    <?php
                                                                    // Encrypt the ID
                                                                    $encrypted_employee_data_id = base64_encode($this->encryption->encrypt($data['userauth_id']));
                                                                    
                                                                    ?>
                                        
                                                                    <a href="#" class="btn btn-ghost-azure openManageAuth"
                                                                        data-userauth-id="<?= $data['userauth_id']; ?>"
                                                                        data-name="<?= $data['name']; ?>"
                                                                        data-role="<?= $data['role']; ?>"
                                                                        data-status="<?= $data['status']; ?>"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#ManageAuth">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                                    </svg>
                                                                    Manage
                                                                    </a>

                                                                    <a href="#" class="btn btn-ghost-red openManageAuth" data-userauth-id="<?= $data['userauth_id']; ?>">
                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-restore">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                            <path d="M3.06 13a9 9 0 1 0 .49 -4.087"></path>
                                                                            <path d="M3 4.001v5h5"></path>
                                                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                                        </svg>
                                                                    Reset Password
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

<div class="modal fade" id="ManageAuth" tabindex="-1" aria-labelledby="ManageAuthLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?= base_url('Admin_ctrl/update_auth') ?>">
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

<script>
$(document).ready(function () {
    $('.openManageAuth.btn-ghost-red').click(function (e) {
        e.preventDefault();
        const userId = $(this).data('userauth-id');

        if (confirm("Are you sure you want to reset this user's password to 12345?")) {
            $.ajax({
                url: '<?= base_url("admin_ctrl/reset_password") ?>',
                method: 'POST',
                data: { userauth_id: userId },
                success: function (response) {
                    alert("Password has been reset to 12345.");
                },
                error: function () {
                    alert("Failed to reset password.");
                }
            });
        }
    });
});
</script>



<script src="<?php echo base_url()."assets/"; ?>dist/js/search.js" defer></script>