<?php 
$invoiceNo = "INV-".time()."-".date("Y");
?>
        <div class="wrapper wrapper-content p-xl">
            <div class="ibox-content p-xl">
                <div class="row">
                    <div class="col-sm-6">
                        <img  style="width:210px"alt="image"  src="http://localhost/luxolla/public/images/logo.png">
                    </div>

                    <div class="col-sm-6 text-right">
                        <h4>Invoice No.</h4>
                        <h4 class="text-navy"><?= $invoiceNo ; ?></h4>
                        <span>To:</span>
                        <address>
                            <strong><?php print_r($details['customerName']);?></strong><br>
                            Phone Number : &nbsp;<?php print_r($details['customerPhoneNo']);?><br>
                            Email Id : &nbsp;<?php print_r($details['customerEmail']);?><br>
                            Payment Type : &nbsp;<?php print_r($details['paymentMethode']);?><br>
                        </address>
                        <p>
                            <span><strong>Invoice Date:</strong> <?php print_r(date("d , F Y")); ?></span><br/>
                        </p>
                    </div>
                </div>

                <div class="table-responsive m-t">
                    <table class="table invoice-table">
                        <thead>
                        <tr>
                            <th>Item List</th>
                            <th>Quantity</th>
                            <th>Unit Price &nbsp;(<i class="fa fa-inr" aria-hidden="true"></i>)</th>
                            <th>CGST(<?php print_r($details['cgst']); ?>%) &nbsp;(<i class="fa fa-inr" aria-hidden="true"></i>)</th>
                            <th style="text-align:right">SGST(<?php print_r($details['sgst']); ?>%) &nbsp;(<i class="fa fa-inr" aria-hidden="true"></i>)</th>
                            <th style="text-align:right">Other Tax(<?php print_r($details['otherTax']); ?>%) &nbsp;(<i class="fa fa-inr" aria-hidden="true"></i>)</th>
                            <th>Total Price &nbsp;(<i class="fa fa-inr" aria-hidden="true"></i>)</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $total = 0 ;
                                for($i = 0; $i < count($details['productName']) ; $i++)
                                {
                                    if($details['sgst'] == NULL){
                                       $details['sgst']='0'; 
                                    }

                                    if($details['cgst'] == NULL){
                                       $details['cgst']='0'; 
                                    }
                                    if($details['otherTax'] == NULL){
                                       $details['otherTax']='0'; 
                                    }

                                    $sgst=($details['productQuantity'][$i] * $details['productAmount'][$i] * $details['sgst'])/100;
                                    $cgst=($details['productQuantity'][$i] * $details['productAmount'][$i] * $details['cgst'])/100;
                                    $otherTax=($details['productQuantity'][$i] * $details['productAmount'][$i] * $details['otherTax'])/100;
                                    $unitTotal= $sgst + $cgst + $otherTax + ($details['productQuantity'][$i] * $details['productAmount'][$i]);
                                    $total = $total + $unitTotal ;
                                ?>
                                    <tr>
                                        <td>
                                            <div>
                                                <strong><?php print_r($productName[$i]);?></strong>
                                            </div>
                                        </td>
                                        <td><?php print_r($details['productQuantity'][$i]);?></td>
                                        <td><?php print_r(number_format($details['productAmount'][$i],2));?></td>
                                        <td><?php print_r(number_format($cgst,2));?></td>
                                        <td style="text-align:right"><?php print_r(number_format($sgst,2));?></td>
                                        <td style="text-align:right"><?php print_r(number_format($otherTax,2));?></td>
                                        <td><?php print_r(number_format($unitTotal,2));?></td>
                                    </tr>
                                <?php } ?>



                        </tbody>
                    </table>
                </div><!-- /table-responsive -->
                <div class="hr-line-dashed"></div>
                <table class="table invoice-total">
                    <tbody>
                    <tr>
                        <td><strong>Sub Total :</strong></td>
                        <td><?php print_r(number_format($total,2)); ?></td>
                    </tr>
                    <?php if($details['benefits'] != NULL){?>
                        <tr>
                            <td><strong>Customer Benetfits (<?php print_r($details['benefits']) ?>%) : </strong></td>
                            <td><?php print_r(number_format((($total*$details['benefits'])/100),2)); ?></td>
                        </tr>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td><?php print_r(number_format($total - (($total*$details['benefits'])/100),2)); ?></td>
                        </tr>
                    <?php }else{ ?>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td><?php print_r(number_format($total,2)); ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        
                            <form method="post" action="<?= base_url().'edit-invoice'; ?>"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                <div class="hidden">
                                    <input type="text" name="customerName" value="<?= $details['customerName'] ; ?>">
                                    <input type="text" name="customerPhoneNo" value="<?= $details['customerPhoneNo'] ; ?>">
                                    <input type="text" name="customerEmail" value="<?= $details['customerEmail'] ; ?>">
                                    <input type="text" name="cgst" value="<?= $details['cgst'] ; ?>">
                                    <input type="text" name="sgst" value="<?= $details['sgst'] ; ?>">
                                    <input type="text" name="otherTax" value="<?= $details['otherTax'] ; ?>">
                                    <input type="text" name="benefits" value="<?= $details['benefits'] ; ?>">
                                    <input type="text" name="paymentMethode" value="<?= $details['paymentMethode'] ; ?>">
                                    
                                    <input type="text" name="note" value="<?= $details['note'] ; ?>">
                                    <?php for($i=0;$i < count($details['productName']) ;$i++){?>
                                        <input type="text" name="productName[]" value="<?= $details['productName'][$i] ; ?>">
                                        <input type="text" name="productQuantity[]" value="<?= $details['productQuantity'][$i] ; ?>">
                                        <input type="text" name="productAmount[]" value="<?= $details['productAmount'][$i] ; ?>">
                                    <?php }?>
                                </div>
                                <button class="btn btn-info pull-left " type="submit" style="width: 45%">Edit</button>
                                
                            </form>
                        
                        
                        
                            <form method="post" action="<?= base_url().'print-invoice'; ?>"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                                <div class="hidden">
                                    <input type="text" name="customerName" value="<?= $details['customerName'] ; ?>">
                                    <input type="text" name="invoiceNo" value="<?= $invoiceNo ; ?>">
                                    <input type="text" name="customerPhoneNo" value="<?= $details['customerPhoneNo'] ; ?>">
                                    <input type="text" name="customerEmail" value="<?= $details['customerEmail'] ; ?>">
                                    <input type="text" name="cgst" value="<?= $details['cgst'] ; ?>">
                                    <input type="text" name="sgst" value="<?= $details['sgst'] ; ?>">
                                    <input type="text" name="otherTax" value="<?= $details['otherTax'] ; ?>">
                                    <input type="text" name="benefits" value="<?= $details['benefits'] ; ?>">
                                    <input type="text" name="total" value="<?= number_format($total,2)  ; ?>">
                                    <input type="text" name="finalAmount" value="<?= number_format($total - (($total*$details['benefits'])/100),2) ; ?>">
                                    <input type="text" name="paymentMethode" value="<?= $details['paymentMethode'] ; ?>">
                                    <input type="text" name="note" value="<?= $details['note'] ; ?>">
                                    <?php for($i=0;$i < count($details['productName']) ;$i++){?>
                                        <input type="text" name="productName[]" value="<?= $details['productName'][$i] ; ?>">
                                        <input type="text" name="productQuantity[]" value="<?= $details['productQuantity'][$i] ; ?>">
                                        <input type="text" name="productAmount[]" value="<?= $details['productAmount'][$i] ; ?>">
                                    <?php }?>
                                </div>
                                <button class="btn btn-primary pull-right" type="submit" style="width: 45%">Print</button>
                                
                            </form>
                       
                    </div>
                </div>
                
            </div>
            
        </div>
<br><br>