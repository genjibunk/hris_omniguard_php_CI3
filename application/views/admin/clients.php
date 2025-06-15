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
                    Employee Records / Companies / Clients<!-- <?php echo $this->session->userdata('userid'); ?>-->
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

                                    <h3 class="h1">Clients</h3>

                                    <div class="markdown text-secondary">

                                        Extensions of the main company, established to manage business activities in other locations.

                                    </div>

                                    <div class="mt-3">

                                        <a href="<?php echo base_url();?>Cmpy_k5hc" class="btn btn-orange active">Back</a>

                                        <a href="#" class="btn btn-primary active" data-bs-toggle="modal" data-bs-target="#newClientModal">New Branch</a>

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
                                                        
                                                            <th>Branches</th>
                                                            <th>Address</th>
                                                            <th>Coordinates</th>
                                                            <th>Date Affiliate</th>
                                                            <th>Date Added</th>
                                                            
                                                            <th></th>

                                                        </tr>

                                                    </thead>

                                                    <tbody>

                                                        <?php foreach($clients as $data  ) : ?>

                                                            <tr>
                                                                
                                                                <td><?php echo $data['name']; ?></td>
                                                                <td><?php echo $data['region']; ?> <?php echo $data['province']; ?> <?php echo $data['city']; ?> <?php echo $data['brgy']; ?> <?php echo $data['street']; ?></td>
                                                                <td><?php echo $data['latitude']; ?> | <?php echo $data['longitude']; ?></td>
                                                                <td><?php echo $data['date_affiliate']; ?></td>
                                                                <td><?php echo $data['created_at']; ?></td>
                                                                <td class="text-end">

                                                                    <a href="#" 
                                                                    class="btn btn-ghost-azure openUpdateModal"
                                                                    data-client_id="<?= $data['client_id'] ?>"
                                                                    data-id="<?= $data['company_id'] ?>"
                                                                    data-name="<?= $data['name'] ?>"
                                                                    data-region="<?= $data['region'] ?>"
                                                                    data-province="<?= $data['province'] ?>"
                                                                    data-city="<?= $data['city'] ?>"
                                                                    data-brgy="<?= $data['brgy'] ?>"
                                                                    data-street="<?= $data['street'] ?>"
                                                                    data-date="<?= $data['date_affiliate'] ?>"
                                                                    data-latitude="<?= $data['latitude'] ?>"
                                                                    data-longitude="<?= $data['longitude'] ?>"
                                                                    >

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


<!--Modal -->
<div class="modal fade" id="updateCompanyModal" tabindex="-1" aria-labelledby="updateCompanyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="updateClientForm" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Company</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="client_id" id="update_client_id">

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Company Name</label>
              <input type="text" class="form-control" name="name" id="update_name" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Date Affiliate</label>
              <input type="date" class="form-control" name="date_affiliate" id="update_date_affiliate" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Region</label>
              <input type="text" class="form-control" name="region" id="update_region" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Province</label>
              <input type="text" class="form-control" name="province" id="update_province" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">City</label>
              <input type="text" class="form-control" name="city" id="update_city" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Barangay</label>
              <input type="text" class="form-control" name="brgy" id="update_brgy" required>
            </div>

            <div class="col-md-12 mb-3">
              <label class="form-label">Street</label>
              <input type="text" class="form-control" name="street" id="update_street" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Latitude</label>
              <input type="text" class="form-control" name="latitude" id="update_latitude" required>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label">Longitude</label>
              <input type="text" class="form-control" name="longitude" id="update_longitude" required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update Company</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="newClientModal" tabindex="-1" aria-labelledby="newClientModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form method="post" action="<?= base_url('Admin_ctrl/insert_client') ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Client</h5>
          <input type="text" name="company_id" value="<?php echo $client_id; ?>">
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="row">
            
            <div class="col-md-6 mb-3">
              <label>Company Name</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Date Affiliate</label>
              <input type="date" class="form-control" name="date_affiliate" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Region</label>
              <select class="form-control form-select" id="region" name="region" required></select>
            </div>
            <div class="col-md-6 mb-3">
              <label>Province</label>
              <select class="form-control form-select" id="province" name="province" required></select>
            </div>
            <div class="col-md-6 mb-3">
              <label>City</label>
              <select class="form-control form-select" id="city" name="city" required></select>
            </div>
            <div class="col-md-6 mb-3">
              <label>Barangay</label>
              <select class="form-control form-select" id="barangay" name="barangay" required></select>
            </div>

            <input type="hidden" id="region-text" name="region_name" />
                        <input type="hidden" id="province-text" name="province_name" />
                        <input type="hidden" id="city-text" name="city_name" />
                        <input type="hidden" id="barangay-text" name="barangay_name" />
            <div class="col-md-12 mb-3">
              <label>Street</label>
              <input
                                    id="Street"
                                    type="text"
                                    class="form-control"
                                    name="Street"
                                    placeholder="Street"
                                    readonly
                                    required
                                >
            </div>
            <div class="col-md-6 mb-3">
              <label>Latitude</label>
              <input type="text" class="form-control" name="latitude" required>
            </div>
            <div class="col-md-6 mb-3">
              <label>Longitude</label>
              <input type="text" class="form-control" name="longitude" required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Save Client</button>
        </div>
      </div>
    </form>
  </div>
</div>



<script>

    $(document).ready(function () {
    $('.openUpdateModal').click(function (e) {
        e.preventDefault();

        $('#update_client_id').val($(this).data('client_id'));
        $('#update_name').val($(this).data('name'));
        $('#update_region').val($(this).data('region'));
        $('#update_province').val($(this).data('province'));
        $('#update_city').val($(this).data('city'));
        $('#update_brgy').val($(this).data('brgy'));
        $('#update_street').val($(this).data('street'));
        $('#update_date_affiliate').val($(this).data('date'));
        $('#update_latitude').val($(this).data('latitude'));
        $('#update_longitude').val($(this).data('longitude'));

        $('#updateCompanyModal').modal('show');
    });

        $('#updateClientForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: "<?= base_url('Admin_ctrl/update_clients') ?>",
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function (res) {
                    if (res.status === 'success') {
                        $('#updateCompanyModal').modal('hide');
                        alert('Client updated successfully!');
                        location.reload(); // or update the table row dynamically
                    } else {
                        alert('Update failed. Please try again.');
                    }
                },
                error: function () {
                    alert('Something went wrong. Please contact support.');
                }
            });
        });
    });

</script>

<script src="<?php echo base_url()."assets/"; ?>dist/js/ph-address-selector.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/search.js" defer></script>
