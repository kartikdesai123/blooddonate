<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form method="post" id="addCustomer" action="<?= base_url().'perview'; ?>"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                            <div class="form-group">
                                <center>
                                    <label class=" control-label">
                                        <h2><b>Customer Details</b></h2>
                                    </label>
                                </center>
                            </div>
                        
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Customer's Name </label>
                                <div class="col-sm-10"><input type="text" name="customerName" placeholder="Enter Customer's Name" class="form-control" autocomplete="off"></div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Customer's Phone Number </label>
                                <div class="col-sm-10"><input type="text" name="customerPhoneNo" placeholder="Enter Customer's Phone Number" class="form-control" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Customer's Email</label>
                                <div class="col-sm-10"><input type="text" name="customerEmail" placeholder="Enter Customer's Email" class="form-control" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">CGST (%)</label>
                                <div class="col-sm-10"><input type="text" name="cgst" placeholder="Enter CGST tax (%)" class="form-control" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">SGST (%)</label>
                                <div class="col-sm-10"><input type="text" name="sgst" placeholder="Enter SGST tax (%)" class="form-control" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Additional Tax (%)</label>
                                <div class="col-sm-10"><input type="text" name="otherTax" placeholder="Enter additional tax (%)" class="form-control" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Customer benefits (%)</label>
                                <div class="col-sm-10"><input type="text" name="benefits" placeholder="Enter Customer benefits (%)" class="form-control" autocomplete="off"></div>
                            </div>
                            
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Payment Methode</label>
                                    <div class="col-sm-10">
                                        <select name="paymentMethode" id="paymentMethode" class="form-control"  >
                                            <option value="">Select payment methode</option>
                                            <option value="Cash Payment">Cash Payment</option>
                                            <option value="Card Payment">Card Payment</option>
                                            <option value="Other">Other(Like Party Sample etc...)</option>
                                        </select>
                                    </div>
                                </div>
                            
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Note</label>
                                <div class="col-sm-10">
                                    <textarea name="note" class="form-control" placeholder="Enter Note"></textarea>
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
                                                    <option value="<?= $value->productId; ?>"><?= $value->productName; ?> - <?= $value->productSize; ?></option>
                                                <?php
                                                }?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <input type="input" class="form-control productQuantity" name="productQuantity[]" placeholder="Enter product's Quantity">
                                        </div>
                                        
                                        <div class="col-sm-3">
                                            <input type="input" class="form-control productAmount" name="productAmount[]" placeholder="Enter product's  amount">
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <button class="btn btn-outline btn-warning dim addProduct" type="button"><i class="fa fa-plus"></i></button>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                
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
        </style>
        