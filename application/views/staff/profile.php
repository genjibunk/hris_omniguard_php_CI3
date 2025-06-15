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
                    Employee Records / Information / Information Data <!-- <?php echo $this->session->userdata('userid'); ?>-->
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

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm0 6a1 1 0 0 0 -1 1v2h-2l-.117 .007a1 1 0 0 0 .117 1.993h2v2l.007 .117a1 1 0 0 0 1.993 -.117v-2h2l.117 -.007a1 1 0 0 0 -.117 -1.993h-2v-2l-.007 -.117a1 1 0 0 0 -.993 -.883z" fill="currentColor" stroke-width="0"></path></svg>
                            
                            </div>

                        </div>

                        <div class="card-body">

                            <div class="row align-items-center">

                                <div class="col-10">

                                    <h3 class="h1">Information Data</h3>

                                    <div class="markdown text-secondary">

                                        Foundational data that supports analysis, reporting, and strategic decisions.

                                    </div>

                                    <div class="mt-3">

                                        <a href="<?php echo base_url();?>sbase_8nvp" class="btn btn-primary active">Go back</a>

                                    </div>

                                    </br>

                                </div>

                                <!-- Details -->

                                    <div class="col-12">

                                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('staff_ctrl/update_employee'); ?>">

                                            <input type="hidden" name="employee_id" value="<?php echo $open_information_employee_data['employee_data_id']; ?>">

                                            <?php 
                                            
                                            $existingPhoto = !empty($open_information_employee_data['photo']) ? base_url('uploads/photos/' . $open_information_employee_data['photo']) : '';
                                            ?>

                                            <div class="mb-3">
                                                <label class="form-label required">Photo</label>
                                                <input type="file" class="form-control" name="photo" id="photoInput" accept="image/*" >

                                                <?php if (!empty($open_information_employee_data['photo'])): ?>
                                                    <small>Current file: <?php echo htmlspecialchars($open_information_employee_data['photo']); ?></small>
                                                <?php endif; ?>

                                                <div class="mt-3">
                                                    <img id="photoPreview" 
                                                        src="<?php echo !empty($open_information_employee_data['photo']) ? base_url('uploads/photos/' . $open_information_employee_data['photo']) : '#'; ?>" 
                                                        alt="Photo Preview" 
                                                        class="img-thumbnail" 
                                                        style="<?php echo !empty($open_information_employee_data['photo']) ? 'display: block; max-width: 200px;' : 'display: none;'; ?>">
                                                </div>
                                            </div>


                                            <script>
                                                const photoInput = document.getElementById('photoInput');
                                                const photoPreview = document.getElementById('photoPreview');
                                                const removePhotoBtn = document.getElementById('removePhotoBtn');

                                                photoInput.addEventListener('change', function (event) {
                                                    const file = event.target.files[0];

                                                    if (file && file.type.startsWith('image/')) {
                                                        const reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            photoPreview.src = e.target.result;
                                                            photoPreview.style.display = 'block';
                                                            removePhotoBtn.style.display = 'inline-block';
                                                        };
                                                        reader.readAsDataURL(file);
                                                    } else {
                                                        resetPhotoInput();
                                                    }
                                                });

                                                
                                            </script>

                                                <div class="mb-3">

                                                    <label class="col-3 col-form-label" for="datepicker-icon-prepend">Birthday</label>

                                                    <div class="col">

                                                        <div class="input-icon">

                                                            <span class="input-icon-addon">

                                                                <svg class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 -2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                                                                    <path d="M16 3v4"></path>
                                                                    <path d="M8 3v4"></path>
                                                                    <path d="M4 11h16"></path>
                                                                    <path d="M11 15h1"></path>
                                                                    <path d="M12 15v3"></path>
                                                                </svg>

                                                            </span>

                                                            <input 
                                                                type="date" 
                                                                class="form-control" 
                                                                placeholder="Select a date" 
                                                                id="datepicker-icon-prepend" 
                                                                name="datepicker-icon-prepend" 
                                                                >
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="mb-3 row">

                                                    <label class="col-3 col-form-label required">Age</label>

                                                    <input

                                                        type="text" 
                                                        class="form-control" 
                                                        id="age-display" 
                                                        placeholder="Age will be calculated"
                                                        name="age-display" 
                                                        readonly
                                                        required
                                                        value="<?php echo $open_information_employee_data['age']; ?>"

                                                    >
                                                       
                                                </div>

                                                <!-- Error message container -->
                                                <div class="mb-3 row">

                                                    <div class="col-12">

                                                        <span id="error-message" style="color: red; font-size: 14px;"></span>

                                                    </div>

                                                </div>

                                                <script>

                                                    function calculateAge(birthday) {
                                                        const birthDate = new Date(birthday);
                                                        const today = new Date();
                                                        let age = today.getFullYear() - birthDate.getFullYear();
                                                        const monthDifference = today.getMonth() - birthDate.getMonth();
                                                        
                                                        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                                                            age--;
                                                        }
                                                        return age;
                                                    }

                                                    const birthdayInput = document.getElementById('datepicker-icon-prepend');
                                                    const ageDisplay = document.getElementById('age-display');
                                                    const errorMessage = document.getElementById('error-message');

                                                    birthdayInput.addEventListener('input', () => {
                                                        const birthday = birthdayInput.value;
                                                        if (birthday) {
                                                            const age = calculateAge(birthday);
                                                            if (age < 18) {
                                                                ageDisplay.value = "";
                                                                errorMessage.textContent = "Employee must be at least 18 years old.";
                                                            } else {
                                                                ageDisplay.value = age;
                                                                errorMessage.textContent = "";
                                                            }
                                                        } else {
                                                            ageDisplay.value = "";
                                                            errorMessage.textContent = "";
                                                        }
                                                    });
                                                </script>

                                                <div class="mb-3">

                                                    <label class="form-label required">Contact No.</label>
                                                    <input type="number" class="form-control" name="contact_number" value="<?php echo $open_information_employee_data['contact_number']; ?>" required/>

                                                </div>

                                                <div class="mb-3">

                                                    <label class="form-label required">Marital Status</label>
                                                    <select class="form-select" name="marital_status" required>
                                                        <option value="Single" <?php echo ($open_information_employee_data['marital_status'] == 'Single') ? 'selected' : ''; ?>>Single</option>
                                                        <option value="Married" <?php echo ($open_information_employee_data['marital_status'] == 'Married') ? 'selected' : ''; ?>>Married</option>
                                                        <option value="Divorce" <?php echo ($open_information_employee_data['marital_status'] == 'Divorce') ? 'selected' : ''; ?>>Divorce</option>
                                                        <option value="Widowed" <?php echo ($open_information_employee_data['marital_status'] == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
                                                    </select>



                                                </div>

                                                <div class="mb-3">

                                                    <label class="form-label required">Spouse / Emergency Contact</label>
                                                    <input type="text" class="form-control" name="spouse_name" value="<?php echo $open_information_employee_data['spouse_name']; ?>" required/>

                                                </div>

                                                <div class="mb-3 row">

                                                    <label class="col-3 col-form-label required">Region</label>

                                                    <div class="col">

                                                        <select class="form-control form-select" id="region" name="region" required>
                                                            
                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="mb-3 row">

                                                    <label class="col-3 col-form-label required">Province</label>

                                                    <div class="col">

                                                        <select class="form-control form-select" id="province" name="province" required></select>

                                                    </div>

                                                </div>

                                                <div class="mb-3 row">

                                                    <label class="col-3 col-form-label required">City</label>

                                                    <div class="col">

                                                        <select class="form-control form-select" id="city" name="city" required></select>

                                                    </div>

                                                </div>

                                                <div class="mb-3 row">

                                                    <label class="col-3 col-form-label required">Barangay</label>

                                                    <div class="col">

                                                        <select class="form-control form-select" id="barangay" name="barangay" required></select>

                                                    </div>

                                                </div>
                                                <input type="hidden" id="region-text" name="region_name" value="<?php echo $open_information_employee_data['region']; ?>" />
                                                <input type="hidden" id="province-text" name="province_name" value="<?php echo $open_information_employee_data['province']; ?>" />
                                                <input type="hidden" id="city-text" name="city_name" value="<?php echo $open_information_employee_data['city']; ?>" />
                                                <input type="hidden" id="barangay-text" name="barangay_name" value="<?php echo $open_information_employee_data['brgy']; ?>" />

                                                <div class="mb-3 row">

                                                    <label class="col-3 col-form-label required">Street</label>

                                                    <div class="col">

                                                        <input
                                                            id="Street"
                                                            type="text"
                                                            class="form-control"
                                                            name="Street"
                                                            placeholder="Street"
                                                            readonly
                                                            required
                                                            value="<?php echo $open_information_employee_data['street']; ?>"
                                                        >

                                                     </div>

                                                </div>


                                                <div class="mb-3 row">

                                                    <label class="col-3 col-form-label">Full Address</label>

                                                    <div class="col">
                                        
                                                        <textarea class="form-control" rows="5" id="full-address" name="full-address" readonly>
                                                            <?php echo $open_information_employee_data['region'] . ' ' . $open_information_employee_data['province'] . ' ' . $open_information_employee_data['city'] . ' ' . $open_information_employee_data['brgy'] . ' ' . $open_information_employee_data['street']; ?>
                                                        </textarea>

                                                    </div>

                                                </div>

                                                <div class="card-footer text-end">

                                                    <button type="submit" class="btn bg-green-lt">Update</button>

                                                </div>

                                            </fieldset>

                                        </form>

                                    </div>
            
                                 <!-- Details --> 

                            </div>

                        </div>

                    </div>

                </div>   
              
            </div>
            
          </div>

        </div>
        
    </div>

</div>
<script src="<?php echo base_url()."assets/"; ?>dist/js/ph-address-selector.js"></script>
