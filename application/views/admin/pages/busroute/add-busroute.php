<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" id="addBusRoute" action="<?= base_url().'add-route' ?>"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Route Name</label>
                                <div class="col-sm-10"><input type="text" name="routeName" placeholder="Enter route name" class="clockpicker form-control" ></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Ferry Time</label>
                                <div class="col-sm-10"><input type="text" name="routeTime" id="routeTime" placeholder="Enter route time" class="form-control" ></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Route Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="">Select Route Status</option>
                                        <option value="active">Active</option>
                                        <option value="deactive">Deactive</option>
                                    </select>
                                        
                                </div>
                            </div>
                            
                            
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Add New Route</button>
                                    </div>
                                </div>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .has-error {
                border-color: red!important;
                border-width: 1px!important;
            }
            .arrow1{
                    margin: auto;
                        padding: 18px;
            }
        </style>
     
