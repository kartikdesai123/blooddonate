<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" id="addBusRoute" action="<?= base_url().'edit-station/'.$routeDetails[0]->id ?>"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            <div class="form-group hidden">
                                <div class="col-sm-10">
                                    <input type="input" class="form-control stationTime" name="id" value="<?= $routeDetails[0]->id ;?>" placeholder="Enter station time">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Route</label>
                                <div class="col-sm-10">
                                    <select name="route" id="route" class="form-control">
                                        <option value="">Select Route</option>
                                        <?php for($i=0 ;$i < count($route) ; $i++){?>
                                            <option value="<?= $route[$i]->id ?>" <?php if($routeDetails[0]->routeId == $route[$i]->id) { print_r('selected="selected"'); }?>><?= $route[$i]->route ?></option>
                                        <?php 
                                        }?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Ferry Time</label>
                                <div class="col-sm-10">
                                    <select name="ferryTime" class="time1 form-control">
                                        <option value="">Select Ferry Time</option>
                                        <option value="<?= $routeDetails[0]->forTime ;?>" selected="selected"><?= $routeDetails[0]->forTime ;?></option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Station Type</label>
                                <div class="col-sm-10">
                                    <select name="stationType" class="form-control stationType"  >
                                        <option value="">Select station type</option>
                                        <option value="pickup" <?php if($routeDetails[0]->stationType == "pickup") { print_r('selected="selected"'); }?>>Pickup</option>
                                        <option value="drop" <?php if($routeDetails[0]->stationType == "drop") { print_r('selected="selected"'); }?>>Drop</option>
                                    </select>
                                        
                                </div>
                            </div>
                            
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Station Name</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control stationName" name="stationName" value="<?= $routeDetails[0]->stationName ;?>" placeholder="Enter station Name">
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Station Time</label>
                                <div class="col-sm-10">
                                    <input type="input" class="form-control stationTime" name="stationTime" value="<?= $routeDetails[0]->time ;?>" placeholder="Enter station time">
                                </div>
                            </div>
                            
                            
                            
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Edit Station</button>
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
     
