        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Station List</h5>
                            <div class="ibox-tools">
                                <a href="<?= base_url().'add-station';?>">
                                    <button class="btn btn-outline btn-warning dim addProduct" type="button"><i class="fa fa-plus"></i></button>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" id="stationList" >
                                <thead>
                                    <tr>
                                        <th>No</th>   
                                        <th>Route</th>
                                        <th>Ferry Time</th>
                                        <th>Station Name</th>
                                        <th>Station Time</th>
                                        <th>Station Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>