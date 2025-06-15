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
<div class="page-body">

    <div class="container-xl">

        <div class="row row-deck row-cards">

            <div class="col-6">

                <div class="row row-cards">

                    <div class="col-sm-12 col-lg-6">

                        <a href="<?php echo base_url('satnd_n5gw');?>" style="text-decoration: none; color: inherit;">

                            <div class="card card-sm">

                                <div class="card-body">

                                    <div class="row align-items-center">

                                        <div class="col-auto">

                                            <span class="bg-azure text-white avatar">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-caret-up">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M17 3.34a10 10 0 1 1 -15 8.66l.005 -.324a10 10 0 0 1 14.995 -8.336m-4.293 5.953a1 1 0 0 0 -1.414 0l-3 3a1 1 0 0 0 .707 1.707h6c.217 0 .433 -.07 .613 -.21l.094 -.083a1 1 0 0 0 0 -1.414z"></path>
                                                </svg>
                                            </span>

                                        </div>

                                        <div class="col">

                                            <div class="font-weight-medium">Attendance</div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </a>

                    </div>

                    <div class="col-sm-12 col-lg-6">

                        <a href="<?php echo base_url('sroster_k0jb');?>" style="text-decoration: none; color: inherit;">

                            <div class="card card-sm">

                                <div class="card-body">

                                    <div class="row align-items-center">

                                        <div class="col-auto">

                                            <span class="bg-cyan text-white avatar">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-caret-up">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M17 3.34a10 10 0 1 1 -15 8.66l.005 -.324a10 10 0 0 1 14.995 -8.336m-4.293 5.953a1 1 0 0 0 -1.414 0l-3 3a1 1 0 0 0 .707 1.707h6c.217 0 .433 -.07 .613 -.21l.094 -.083a1 1 0 0 0 0 -1.414z"></path>
                                                </svg>
                                            </span>

                                        </div>

                                        <div class="col">

                                            <div class="font-weight-medium">My Schedule</div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

            <div class="col-6">

                <div class="row row-cards">

                    <div class="col-sm-12 col-lg-6">

                        <a href="<?php echo base_url('stokenreq_m4tz');?>" style="text-decoration: none; color: inherit;">

                            <div class="card card-sm">

                                <div class="card-body">

                                    <div class="row align-items-center">

                                        <div class="col-auto">

                                            <span class="bg-pink text-white avatar">

                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-caret-up">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M17 3.34a10 10 0 1 1 -15 8.66l.005 -.324a10 10 0 0 1 14.995 -8.336m-4.293 5.953a1 1 0 0 0 -1.414 0l-3 3a1 1 0 0 0 .707 1.707h6c.217 0 .433 -.07 .613 -.21l.094 -.083a1 1 0 0 0 0 -1.414z"></path>
                                                </svg>

                                            </span>

                                        </div>

                                        <div class="col">

                                            <div class="font-weight-medium">Leave Request</div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="col-sm-12 col-lg-6">

                        <div class="card card-sm">

                            <div class="card-body">

                                <div class="row align-items-center">

                                    <div class="col-auto">

                                        <span class="bg-purple text-white avatar">

                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-caret-up">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M17 3.34a10 10 0 1 1 -15 8.66l.005 -.324a10 10 0 0 1 14.995 -8.336m-4.293 5.953a1 1 0 0 0 -1.414 0l-3 3a1 1 0 0 0 .707 1.707h6c.217 0 .433 -.07 .613 -.21l.094 -.083a1 1 0 0 0 0 -1.414z"></path>
                                            </svg>

                                        </span>

                                    </div>

                                    <div class="col">

                                        <div class="font-weight-medium">Payslip</div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-12">

                <div class="row row-cards">

                    <div class="col-sm-6 col-lg-6">

                        <a href="<?php echo base_url('sopen_z3bt');?>" style="text-decoration: none; color: inherit;">

                            <div class="card card-sm">

                                <div class="card-body">

                                    <div class="row align-items-center">

                                        <div class="col-auto">

                                            <span class="bg-orange text-white avatar">

                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-caret-up">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M17 3.34a10 10 0 1 1 -15 8.66l.005 -.324a10 10 0 0 1 14.995 -8.336m-4.293 5.953a1 1 0 0 0 -1.414 0l-3 3a1 1 0 0 0 .707 1.707h6c.217 0 .433 -.07 .613 -.21l.094 -.083a1 1 0 0 0 0 -1.414z"></path>
                                                </svg>

                                            </span>

                                        </div>

                                        <div class="col">

                                            <div class="font-weight-medium">My Profile</div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                    <div class="col-sm-6 col-lg-6">

                        <a href="<?php echo base_url();?>" style="text-decoration: none; color: inherit;">

                            <div class="card card-sm">

                                <div class="card-body">

                                    <div class="row align-items-center">

                                        <div class="col-auto">

                                            <span class="bg-red text-white avatar">

                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-caret-up">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M17 3.34a10 10 0 1 1 -15 8.66l.005 -.324a10 10 0 0 1 14.995 -8.336m-4.293 5.953a1 1 0 0 0 -1.414 0l-3 3a1 1 0 0 0 .707 1.707h6c.217 0 .433 -.07 .613 -.21l.094 -.083a1 1 0 0 0 0 -1.414z"></path>
                                                </svg>

                                            </span>

                                        </div>

                                        <div class="col">

                                            <div class="font-weight-medium">Sign out</div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
