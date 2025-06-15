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

                                        <a href="<?php echo base_url();?>base_8nvp" class="btn btn-orange active">Back</a>

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
                                                        
                                                            <th>Name</th>
                                                            <th>Leave type</th>
                                                            <th>Total Credit</th>
                                                            <th>Year</th>
                                                            
                                                            <th></th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php foreach($leavecredits as $data  ) : ?>

                                                            <tr>

                                                                <td><?php echo $data['last_name']; ?> , <?php echo $data['first_name']; ?> </td>
                                                                <td><?php echo $data['description']; ?></td>
                                                                <td><?php echo $data['total']; ?></td>
                                                                <td><?php echo $data['year']; ?></td>
                                                                <td class="text-end">

                                                                    <?php
                                                                    // Encrypt the ID
                                                                    $encrypted_employee_data_id = base64_encode($this->encryption->encrypt($data['employee_data_id']));
                                                                    
                                                                    ?>
                                        
                                                                    <a href="#" class="btn btn-ghost-azure openLeaveModal"
                                                                        data-employee-id="<?= $data['employee_data_id']; ?>"
                                                                        data-description="<?= $data['description']; ?>"
                                                                        data-total="<?= $data['total']; ?>"
                                                                        data-year="<?= $data['year']; ?>"
                                                                        data-name="<?= $data['last_name'] . ', ' . $data['first_name']; ?>"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#leaveModal">

                                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>

                                                                        Update

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
            
            <form action="<?= base_url('Admin_ctrl/insert_leavecredits_for_all') ?>" method="post">

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
                            <option value="2025" selected>2025</option>
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

<div class="modal fade" id="leaveModal" tabindex="-1" aria-labelledby="leaveModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" action="<?= base_url('Admin_ctrl/update_or_delete') ?>">

        <div class="modal-header">

          <h5 class="modal-title" id="leaveModalLabel">Edit Leave Credit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>

        <div class="modal-body">

            <input type="hidden" name="employee_data_id" id="modalEmployeeId">

            <div class="mb-3">

                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="modalName" disabled>

            </div>

            <div class="mb-3">

                <label class="form-label">Leave Type</label>
                <input type="text" class="form-control" name="description" id="modalDescription">

            </div>

            <div class="mb-3">

                <label class="form-label">Total Credit</label>
                <input type="number" class="form-control" name="total" id="modalTotal">

            </div>

            <div class="mb-3">

                <label class="form-label">Year</label>
                <input type="number" class="form-control" name="year" id="modalYear">

            </div>

        </div>

        <div class="modal-footer">

            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="btnDelete" value="delete" class="btn btn-danger">Delete</button>
            <button type="submit" id="btnUpdate"  value="update" class="btn btn-primary">Update</button>

        </div>

      </form>

    </div>

  </div>

</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Confirm Action</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="confirmationMessage">
        Are you sure you want to proceed?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmActionBtn">Yes, Proceed</button>
      </div>
    </div>
  </div>
</div>

<script>

    document.querySelectorAll('.openLeaveModal').forEach(button => {
    button.addEventListener('click', function () {
        const employeeId = this.getAttribute('data-employee-id');
        const name = this.getAttribute('data-name');
        const description = this.getAttribute('data-description');
        const total = this.getAttribute('data-total');
        const year = this.getAttribute('data-year');

        document.getElementById('modalEmployeeId').value = employeeId;
        document.getElementById('modalName').value = name;
        document.getElementById('modalDescription').value = description;
        document.getElementById('modalTotal').value = total;
        document.getElementById('modalYear').value = year;
    });
    });

    let intendedAction = null;

    document.addEventListener("DOMContentLoaded", function () {
    const updateBtn = document.getElementById("btnUpdate");
    const deleteBtn = document.getElementById("btnDelete");
    const confirmBtn = document.getElementById("confirmActionBtn");
    const confirmationModal = new bootstrap.Modal(document.getElementById("confirmationModal"));
    const confirmationMessage = document.getElementById("confirmationMessage");
    const form = document.querySelector("#leaveModal form");

    updateBtn.addEventListener("click", function (e) {
        e.preventDefault();
        intendedAction = "update";
        confirmationMessage.textContent = "Are you sure you want to update this leave credit?";
        confirmationModal.show();
    });

    deleteBtn.addEventListener("click", function (e) {
        e.preventDefault();
        intendedAction = "delete";
        confirmationMessage.textContent = "Are you sure you want to delete this leave credit?";
        confirmationModal.show();
    });

    confirmBtn.addEventListener("click", function () {
        if (intendedAction) {
        // Set the intended action before submitting
        const actionInput = document.createElement("input");
        actionInput.type = "hidden";
        actionInput.name = "action";
        actionInput.value = intendedAction;
        form.appendChild(actionInput);

        form.submit();
        }
    });
    });

</script>

<script src="<?php echo base_url()."assets/"; ?>dist/js/search.js" defer></script>