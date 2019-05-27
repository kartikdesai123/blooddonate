    <style>
        select.error{
            border: 1px solid #e80c0c;
        }
        input.error{
            border: 1px solid #e80c0c !important;
        }
        label.error {
            text-transform: none;
            font-size: 14px;
            color: #e80c0c;
            border: none;
        }
        span.error {
            text-transform: none;
            font-size: 14px;
            color: #e80c0c;
            border: none;
        }
    </style>
    <section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <img src="<?= base_url() ?>public/asset/front/img/logo.png" alt="Flight Template">
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-2">                    
                    <section id="first-tab-group" class="tabgroup">
                        <form method='post' action='<?= base_url().'payment' ;?>' id='bookticket'>
                            <div id="tab1">
                                <!--Step 1-->

                                <div class="submit-form form1 ">
                                    <center><h4>REFUND AND CANCELLATION POLICY</h4></center>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <div class="tabs-content" id="weather">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <center><b><h3>Cancellation Policy</h3></b></center><br>
                        <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Cancellations are allowed one day (24 hours) prior to the departure date of travel. For Agent and offline booking cancellation mail us on helpdesk@indigoseaways.com with details like PNR No, Date of travel & time, No of Passenger, No of Vehicle, Email address, Reason for cancellation and Mobile No. </p>
                        <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Refund amount allowed otherwise is as per below matrix</p>
                        <center>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>Difference between DOC & DOT</th>
                                    <th>% refund</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr> 
                                    <td>>30 days</td>
                                    <td>90%</td>
                                  </tr>
                                  <tr>
                                    <td>20-30 days</td>
                                    <td>70%</td>
                                  </tr>
                                  
                                  <tr>
                                    <td>10-20 days</td>
                                    <td>50%</td>
                                  </tr>
                                  
                                  <tr>
                                    <td>5-10 days</td>
                                    <td>25%</td>
                                  </tr>
                                  
                                  <tr>
                                    <td>2-5 days</td>
                                    <td>10%</td>
                                  </tr>
                                  
                                  <tr>
                                    <td>1 OR DOT = DOC</td>
                                    <td>0%</td>
                                  </tr>
                                </tbody>
                              </table>
                        </center>
                        
                        <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Please note Refund Process time may vary.
                        <br>DOB = Date of Booking, DOT = Date of Travel, DOC = Date of Cancellation
                        </p>
                        <br>
                        <center><b><h3>Baggage </h3></b></center><br>
                        <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Baggage Allowance: Luggage of 7 kg per person will be allowed, above which will be charged at 25 INR per KG</p>
                        <center>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>Class of Travel</th>
                                    <th>Adult</th>
                                    <th>Child</th>
                                    <th>Infant</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr> 
                                    <td>Any</td>
                                    <td>7 KG</td>
                                    <td>4 KG</td>
                                    <td>NILL</td>
                                  </tr>
                                </tbody>
                              </table>
                        </center><br>
                        <center><b><h3>REFUND AND CANCELLATION POLICY</h3></b></center><br>
                        <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Refund will be processed within three working days after the date of cancellation.</p>
                        <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Please note that in case of cancellation of ferry service on account of :</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;1. Bad/ inclement  weather condition.</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;2. Gujarat Maritime Board(GMB), Govt. of Gujarat’s orders/notice.</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;3. Technical  circumstances.</p>
                        <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Ticket booking amount shall be refunded to passenger less taxes/handling charges.</p>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    
    