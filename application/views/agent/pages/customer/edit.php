<?php 
if($details['cgst'] == '0'){
    $details['cgst'] ='';
}

if($details['sgst'] == '0'){
    $details['sgst'] ='';
}

if($details['otherTax'] == '0'){
    $details['otherTax'] ='';
}

if($details['benefits'] == '0'){
    $details['benefits'] ='';
}
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" id="editCustomer" action="<?= base_url().'perview'; ?>"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            <div class="form-group">
                                <center>
                                    <label class=" control-label">
                                        <h2><b>Customer Details</b></h2>
                                    </label>
                                </center>
                            </div>
                        
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Customer's Name </label>
                                <div class="col-sm-10"><input type="text" name="customerName" placeholder="Enter Customer's Name" class="form-control"  value="<?= $details['customerName']; ?>" autocomplete="off"></div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Customer's Phone Number </label>
                                <div class="col-sm-10"><input type="text" name="customerPhoneNo" placeholder="Enter Customer's Phone Number" class="form-control" value="<?= $details['customerPhoneNo']; ?>" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Customer's Email</label>
                                <div class="col-sm-10"><input type="text" name="customerEmail" placeholder="Enter Customer's Email" class="form-control" value="<?= $details['customerEmail']; ?>" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">CGST (%)</label>
                                <div class="col-sm-10"><input type="text" name="cgst" placeholder="Enter CGST tax (%)" class="form-control" value="<?= $details['cgst']; ?>" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">SGST (%)</label>
                                <div class="col-sm-10"><input type="text" name="sgst" placeholder="Enter SGST tax (%)" class="form-control" value="<?= $details['sgst']; ?>" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Additional Tax (%)</label>
                                <div class="col-sm-10"><input type="text" name="otherTax" placeholder="Enter additional tax (%)" class="form-control" value="<?= $details['otherTax']; ?>" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Customer benefits (%)</label>
                                <div class="col-sm-10"><input type="text" name="benefits" placeholder="Enter Customer benefits (%)" class="form-control" value="<?= $details['benefits']; ?>" value="<?= $details['customerName']; ?>" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Payment Methode</label>
                                    <div class="col-sm-10">
                                        <select name="paymentMethode" id="paymentMethode" class="form-control"  >
                                            <option value="">Select payment methode</option>
                                            <option value="Cash Payment" <?php if($details['paymentMethode' ] == "Cash Payment"){ print_r('selected="selected"');}?>>Cash Payment</option>
                                            <option value="Card Payment" <?php if($details['paymentMethode'] == "Card Payment"){ print_r('selected="selected"');}?>>Card Payment</option>
                                            <option value="Other" <?php if($details['paymentMethode'] == "Other"){ print_r('selected="selected"');}?>>Other(Like Party Sample etc...)</option>
                                        </select>
                                    </div>
                                </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Note</label>
                                <div class="col-sm-10">
                                    <textarea name="note" class="form-control" placeholder="Enter Note">
                                        <?= $details['note']; ?>
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <center>
                                    <label class=" control-label">
                                        <h2><b>Product Details</b></h2>
                                    </label>
                                </center>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-sm-4">
                                            <center>
                                                <label class="control-label ">Product Name</label>
                                            </center>
                                        </div>
                                        <div class="col-sm-3">
                                            <center>
                                                <label class="control-label text-center">Product Quantity</label>
                                            </center>
                                        </div>
                                        <div class="col-sm-3">
                                            <center>
                                                <label class="control-label text-center ">Product Single Piece Amount</label>
                                            </center>  
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row appendDiv">
                                    <div class="col-lg-12 ">
                                        <div class="col-sm-4">
                                            <select name="productName[]" class="form-control productName"  >
                                                <option value="">Select product Name and Size</option>
                                                <?php 
                                                    foreach($productList as $key => $value){?>
                                                    <option value="<?= $value->productId; ?>" <?php if($value->productId == $details['productName'][0]){ print_r('selected="selected"');}?>><?= $value->productName; ?> - <?= $value->productSize; ?></option>
                                                <?php
                                                }?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control productQuantity" value="<?= $details['productQuantity'][0]; ?>" name="productQuantity[]" placeholder="Enter product's Quantity">
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control productAmount" name="productAmount[]" value="<?= $details['productAmount'][0]; ?>" placeholder="Enter product's  amount">
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <button class="btn btn-outline btn-warning dim addProduct" type="button"><i class="fa fa-plus"></i></button>
                                            
                                        </div>
                                    </div>
                               
                                <?php for($i = 1 ; $i < count($details['productName']) ;$i++){?>
                                    <div class="row removeDiv">
                                    <div class="col-lg-12 ">
                                        
                                        <div class="col-sm-4">
                                            <select name="productName[]" class="form-control productName"  >
                                                <option value="">Select product Name and Size</option>
                                                <?php 
                                                    foreach($productList as $key => $value){?>
                                                    <option value="<?= $value->productId; ?>" <?php if($value->productId == $details['productName'][$i]){ print_r('selected="selected"');}?>><?= $value->productName; ?> - <?= $value->productSize; ?></option>
                                                <?php
                                                }?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control productQuantity" value="<?= $details['productQuantity'][$i]; ?>" name="productQuantity[]" placeholder="Enter product's Quantity">
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control productAmount" name="productAmount[]" value="<?= $details['productAmount'][$i]; ?>" placeholder="Enter product's  amount">
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <button class="btn btn-outline btn-warning dim addProduct" type="button"><i class="fa fa-plus"></i></button>
                                            <button class="btn btn-outline btn-danger  dim removeBtn" type="button"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div> 
                               <?php } ?>
                                 </div>
                            <div class="hr-line-dashed"></div>
                          
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white " type="submit">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Preview</button>
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
            .form-control.error {
                border: 1px solid red!important;
            }
            label.error {
                display: none!important;
            }
            
            .row {
                 margin-right: 0px!important;
                 margin-left: 0px!important;
            }
        </style>
        