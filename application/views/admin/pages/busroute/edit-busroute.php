<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" id="editBusRoute" action="<?= base_url().'edit-route/'.$routeDetails[0]->id ?>"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            
                            <div class="hidden form-group"><label class="col-sm-2 control-label">Route Name</label>
                                <div class="col-sm-10"><input type="text" name="id" placeholder="Enter route name" class="clockpicker form-control" value="<?= $routeDetails[0]->id ;?>"></div>
                            </div>
                        
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Route Name</label>
                                <div class="col-sm-10"><input type="text" name="routeName" placeholder="Enter route name" class="clockpicker form-control" value="<?= $routeDetails[0]->route ;?>"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Ferry Time</label>
                                <div class="col-sm-10"><input type="text" name="routeTime" id="routeTime"  placeholder="Enter route time" class="form-control" value="<?= $routeDetails[0]->time ;?>"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Route Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="" >Select Route Status</option>
                                        <option value="active" <?php if($routeDetails[0]->is_active == 'active'){print_r('selected="selected"');}?>>Active</option>
                                        <option value="deactive" <?php if($routeDetails[0]->is_active == 'deactive'){ print_r('selected="selected"');}?>>Deactive</option>
                                    </select>
                                        
                                </div>
                            </div>
                            
                            
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Edit Route</button>
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
     
