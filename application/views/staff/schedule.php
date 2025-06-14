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

                                    <h3 class="h1">Schedule</h3>

                                    <div class="markdown text-secondary">

                                        The assigned days and hours an employee is expected to be on duty.

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