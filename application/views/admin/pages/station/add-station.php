<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" id="addBusStation" action="<?= base_url().'add-station' ?>"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Route</label>
                                <div class="col-sm-10">
                                    <select name="route" id="route" class="form-control">
                                        <option value="">Select Route</option>
                                        <?php for($i=0 ;$i < count($route) ; $i++){?>
                                            <option value="<?= $route[$i]->id ?>"><?= $route[$i]->route ?></option>
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
                                        </select>

                                    </div>
                                </div>
                             <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-sm-3">
                                            <center>
                                                <label class="control-label ">Station Type</label>
                                            </center>
                                        </div>
                                        <div class="col-sm-3">
                                            <center>
                                                <label class="control-label text-center">Staion Name</label>
                                            </center>
                                        </div>
                                        <div class="col-sm-4">
                                            <center>
                                                <label class="control-label text-center ">Time</label>
                                            </center>  
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row appendDiv">
                                    <div class="col-lg-12 ">
                                        
                                        <div class="col-sm-3">
                                            <select name="stationType[]" class="form-control stationType"  >
                                                <option value="">Select station type</option>
                                                <option value="pickup">Pickup</option>
                                                <option value="drop">Drop</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <input type="input" class="form-control stationName" name="stationName[]" placeholder="Enter station Name">
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <input type="input" class="form-control stationTime" name="stationTime[]" placeholder="Enter station time">
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <button class="btn btn-outline btn-warning dim addstation" type="button"><i class="fa fa-plus"></i></button>
                                         </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Add New Station</button>
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
     
