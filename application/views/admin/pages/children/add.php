<?php 
$bloodGroup = unserialize (BLOOD_GROUP);    ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" id="addChild" methode="<?= base_url().'children-add'; ?>"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            <div class="form-group">
                                <center>
                                    <label class=" control-label">
                                        <h2><b>Child Details </b></h2>
                                    </label>
                                </center>
                            </div>
                        
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Child's Full Name </label>
                                <div class="col-sm-10"><input type="text" name="childName" placeholder="Enter child's full name" class="form-control" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Child's Gender </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="childGender">
                                        <option value="">Select child's Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Contact Number </label>
                                <div class="col-sm-10"><input type="text" name="childPhoneNo" placeholder="Enter contact number" class="form-control" ></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Child's Birth date</label>
                                <div class="col-sm-10"><input type="text" id="startdate" name="childBirthDate" placeholder="Enter child's birth date" class="form-control" ></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Child's Blood Group </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="childBloodGroup">
                                        <option value="">Select child's blood group</option>
                                        <?php for($i = 0;$i<count($bloodGroup);$i++){?>
                                        <option value="<?= $bloodGroup[$i]?>"><?= $bloodGroup[$i]?></option>
                                        <?php
                                        }?>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Child's Address </label>
                                <div class="col-sm-10">
                                    <textarea placeholder="Enter child's address" class="form-control"  name="childAddress"></textarea >
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Child's Photo </label>
                                <div class="col-sm-10"><input type="file" name="childPhoto" class="form-control" ></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                          
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Add Child</button>
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
        </style>
        