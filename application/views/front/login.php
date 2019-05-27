<style>
    .cusClass{
        height : 50px !important;
        width : 80px !important;
    }
    .price{
        display: block;
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
                    <div id="tab1">
                        <!--Step 1-->
                        
                        <div class="submit-form form1">
                            <h4>Trip Selection:</h4>
                            <form id="form-submit" action="" method="get">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                        <div class="radio-select">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <label for="round">Round</label>
                                                    <input type="radio" name="trip" id="round" value="round" required="required" onchange="this.form.()">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <label for="oneway">Oneway</label>
                                                    <input type="radio" name="trip" id="oneway" value="one-way" required="required" onchange="this.form.()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="from">From:</label>
                                            <select required="" name="from" onchange="this.form.()">
                                                <option value="">Select a location...</option>
                                                <option value="Cambodia">Cambodia</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="to">To:</label>
                                            <select required="" name="to" onchange="this.form.()">
                                                <option value="">Select a location...</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="departure">Out Bound:</label>
                                            <input name="deparure" type="text" class="form-control date" id="deparure" placeholder="Select date..." required="" onchange="this.form.()">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="return">Return:</label>
                                            <input name="return" type="text" class="form-control date" id="return" placeholder="Select date..." required="" onchange="this.form.()" disabled="true">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label>Trip (Out Bound):</label>
                                            <br/><br/>
                                            <button class="btn btn-default cusClass">00:00:00<span class="price"><i class="fa fa-rupee"></i>0</span></button>
                                            <button class="btn btn-default cusClass">00:00:00<span class="price"><i class="fa fa-rupee"></i>0</span></button>
                                            <button class="btn btn-default cusClass">00:00:00<span class="price"><i class="fa fa-rupee"></i>0</span></button>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label>Trip (Return):</label>
                                            <br/><br/>
                                            <button class="btn btn-default cusClass">00:00:00<span class="price"><i class="fa fa-rupee"></i>0</span></button>
                                            <button class="btn btn-default cusClass">00:00:00<span class="price"><i class="fa fa-rupee"></i>0</span></button>
                                            <button class="btn btn-default cusClass">00:00:00<span class="price"><i class="fa fa-rupee"></i>0</span></button>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="0-2 Years">Passengers (0-2 Years):</label>
                                            <select required="" name="0-2 Years" onchange="this.form.()">
                                                <option value="">Select a Passengers...</option>
                                                <?php for($i=1; $i<=10; $i++) { ?>
                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php } ?>
                                                
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for=">2 Years">Passengers (>2 Years):</label>
                                            <select required="" name=">2 Years" onchange="this.form.()">
                                                <option value="">Select a Passengers...</option>
                                                <?php for($i=1; $i<=10; $i++) { ?>
                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn">Order Ticket Now</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!--Step 2-->
                        
                        <div class="submit-form form2">
                            <h4>Bus Selection:</h4>
                            <form id="form-submit" action="" method="get">
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="from">Date : 18/05/2018</label>
                                            <br/><br/>
                                            <label for="from">Route : Dahej-Ghogha</label>
                                                
                                        </fieldset>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="to">Trip Time : 02:30 PM</label>
                                            <br/><br/>
                                            <label for="to">Passengers : 13</label>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <hr style="border-top: 1px solid #dbdada;">
                                        <p>
                                        Note: Bus service is additional service for our valued customers. Bus fare is not included in the ferry ticket booking and the same has to be paid during bus journey. To know more information about bus schedule and pricing, Click Here.
                                        </p> 
                                    </div>
                                    <div class="col-md-12">
                                        <!--<div class="col-md-9">-->
                                        <div class="radio-select">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <label for="round">Avail Bus Services</label>
                                                    <input type="radio" name="trip" id="round" value="round" required="required" onchange="this.form.()">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <label for="oneway">Self-Transportation</label>
                                                    <input type="radio" name="trip" id="oneway" value="one-way" required="required" onchange="this.form.()">
                                                </div>
                                            </div>
                                        </div>
                                    <!--</div>-->
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="pickpoint">Pick Point:</label>
                                            <select required="" name="pickpoint" onchange="this.form.()">
                                                <option value="">Select a Pick Point...</option>
                                                <option value="Abc1">Abc1</option>
                                                <option value="Abc2">Abc2</option>
                                                <option value="Abc3">Abc3</option>
                                                <option value="Abc4">Abc4</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="droppoint">Drop Point:</label>
                                            <select required="" name="droppoint" onchange="this.form.()">
                                                <option value="">Select a Pick Point...</option>
                                                <option value="Abc1">Abc1</option>
                                                <option value="Abc2">Abc2</option>
                                                <option value="Abc3">Abc3</option>
                                                <option value="Abc4">Abc4</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12">
                                        <hr style="border-top: 1px solid #dbdada;">
                                        <p>
                                        Please note you have not avail bus service. ISPL is not responsible for your transportation arrangements from/to terminals.
                                        </p> 
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn">Order Ticket Now</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!--Step 3-->
                        
                        <div class="submit-form form3">
                            <h4>Bus OutBound:</h4>
                            <form id="form-submit" action="" method="get">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <fieldset>
                                            <label for="from">Date : 18/05/2018</label>
                                            <br/><br/>
                                            <label for="from">Route : Dahej-Ghogha</label>
                                                
                                        </fieldset>
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <fieldset>
                                            <label for="to">Trip Time : 02:30 PM</label>
                                            <br/><br/>
                                            <label for="to">Passengers : 13</label>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <fieldset>
                                            <label for="to">Total Seats : 2</label>
                                            <br/><br/>
                                            <label for="to">-</label>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <hr style="border-top: 1px solid #dbdada;">
                                        <label for="primary_passanger">Primary Passenger:</label>
                                        <br/><br/>
                                        <div class="col-md-2">
                                            <fieldset>
                                               
                                                <select required="" name="primary_passanger" style="margin-top: 12px;" onchange="this.form.()">
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Ms.">Ms.</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset>
                                               
                                                <input name="deparure" type="text" class="form-control date" id="deparure" placeholder="Enetr name..." required="" onchange="this.form.()">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-2">
                                            <fieldset>
                                               
                                                <select required="" name="primary_passanger" onchange="this.form.()" style="margin-top: 12px;">
                                                    <?php for($i=3; $i<=100; $i++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-select">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6" style="width:46%">
                                                        <label for="gender1">Male</label>
                                                        <input type="radio" name="trip" id="gender1" value="round" required="required" onchange="this.form.()">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6" style="width:51%">
                                                        <label for="oneway1">Female</label>
                                                        <input type="radio" name="trip" id="oneway1" value="one-way" required="required" onchange="this.form.()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <hr style="border-top: 1px solid #dbdada;">
                                        <label for="primary_passanger">Passanger 2:</label>
                                        <br/><br/>
                                        <div class="col-md-2">
                                            <fieldset>
                                               
                                                <select required="" name="primary_passanger" style="margin-top: 12px;" onchange="this.form.()">
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Ms.">Ms.</option>
                                                    <option value="Mrs.">Mrs.</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset>
                                               
                                                <input name="deparure" type="text" class="form-control date" id="deparure" placeholder="Enetr name..." required="" onchange="this.form.()">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-2">
                                            <fieldset>
                                               
                                                <select required="" name="primary_passanger" onchange="this.form.()" style="margin-top: 12px;">
                                                    <?php for($i=3; $i<=100; $i++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="radio-select">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6" style="width:46%">
                                                        <label for="gender1">Male</label>
                                                        <input type="radio" name="trip" id="gender1" value="round" required="required" onchange="this.form.()">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6" style="width:51%">
                                                        <label for="oneway1">Female</label>
                                                        <input type="radio" name="trip" id="oneway1" value="one-way" required="required" onchange="this.form.()">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn">Order Ticket Now</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                         <!--Step 4-->
                        
                        <div class="submit-form form4">
                            <h4>Confirmation:</h4>
                            <form id="form-submit" action="" method="get">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <fieldset>
                                            <label for="from">Date : 18/05/2018</label>
                                            <br/><br/>
                                            <label for="from">Route : Dahej-Ghogha</label>
                                                
                                        </fieldset>
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                        <fieldset>
                                            <label for="to">Trip Time : 02:30 PM</label>
                                            <br/><br/>
                                            <label for="to">Passengers : 13</label>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <fieldset>
                                            <label for="to">Total Seats : 2</label>
                                            <br/><br/>
                                            <label for="to">-</label>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <hr style="border-top: 1px solid #dbdada;">
                                        <div class="col-md-6">
                                         <fieldset>
                                            <label for="email">Email</label>
                                            <br/><br/>
                                            <input name="deparure" type="text" class="form-control date" id="deparure" placeholder="Enetr name..." required="" onchange="this.form.()">
                                            
                                         </fieldset>
                                         <fieldset>
                                            <label for="email">Mobile</label>
                                            <br/><br/>
                                            <input name="deparure" type="text" class="form-control date" id="deparure" placeholder="Enetr name..." required="" onchange="this.form.()">
                                            
                                         </fieldset>
                                         <fieldset>
                                            <label for="email">Have a Promo Code?</label>
                                            <br/><br/>
                                            <div class="col-md-6" style="margin-top:3px">
                                                <input name="deparure" type="text" class="form-control date" id="deparure" placeholder="Enetr name..." required="" onchange="this.form.()">
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn btn-primary">APPLY</button>
                                            </div>
                                            
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <label for="gender1">Personal Booking</label>
                                                        <input type="radio" name="trip" id="gender1" value="round" required="required" onchange="this.form.()">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <label for="oneway1">Corporate Booking</label>
                                                        <input type="radio" name="trip" id="oneway1" value="one-way" required="required" onchange="this.form.()">
                                                    </div>
                                            
                                         </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="to">Total (Ferry Booking) : <i class="fa fa-rupee"></i> 1000.00</label>
                                            <br/><br/>
                                            <label for="to">Bus Pick Location : Valiya Chowkdi</label>
                                            <br/><br/>
                                            <label for="to">Internet Charges : <i class="fa fa-rupee"></i> 20.00</label>
                                            <br/><br/>
                                            <label for="to">Integrated GST (18 %): <i class="fa fa-rupee"></i> 3.60</label>
                                            <br/><br/>
                                            <hr style="border-top: 2px solid #dbdada;">
                                            <label for="to">Sub Total : <i class="fa fa-rupee"></i> 1023.60</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn">Order Ticket Now</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

    <div class="tabs-content" id="weather">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Check Weather For 5 NEXT Days</h2>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="col-md-12">
                        <div class="weather-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="tabs clearfix" data-tabgroup="second-tab-group">
                                        <li><a href="#monday" class="active">Monday</a></li>
                                        <li><a href="#tuesday">Tuesday</a></li>
                                        <li><a href="#wednesday">Wednesday</a></li>
                                        <li><a href="#thursday">Thursday</a></li>
                                        <li><a href="#friday">Friday</a></li>
                                    </ul>    
                                </div>
                                <div class="col-md-12">
                                    <section id="second-tab-group" class="weathergroup">
                                        <div id="monday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Myanmar</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>32&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>26&deg;</span></li>
                                                            <li>12PM <span>32&deg;</span></li>
                                                            <li>6PM <span>28&deg;</span></li>
                                                            <li>12AM <span>22&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Thailand</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>20&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>26&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>India</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>33&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>26&deg;</span></li>
                                                            <li>12PM <span>33&deg;</span></li>
                                                            <li>6PM <span>29&deg;</span></li>
                                                            <li>12AM <span>27&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tuesday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Myanmar</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>18&deg;</span></li>
                                                            <li>12PM <span>27&deg;</span></li>
                                                            <li>6PM <span>25&deg;</span></li>
                                                            <li>12AM <span>17&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Thailand</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>31&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>19&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>India</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>26&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>19&deg;</span></li>
                                                            <li>12PM <span>26&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>20&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="wednesday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Myanmar</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>31&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>19&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Thailand</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>34&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>28&deg;</span></li>
                                                            <li>12PM <span>34&deg;</span></li>
                                                            <li>6PM <span>30&deg;</span></li>
                                                            <li>12AM <span>29&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>India</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>18&deg;</span></li>
                                                            <li>12PM <span>27&deg;</span></li>
                                                            <li>6PM <span>25&deg;</span></li>
                                                            <li>12AM <span>17&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="thursday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Myanmar</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>27&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>21&deg;</span></li>
                                                            <li>12PM <span>27&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Thailand</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>18&deg;</span></li>
                                                            <li>12PM <span>27&deg;</span></li>
                                                            <li>6PM <span>25&deg;</span></li>
                                                            <li>12AM <span>17&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>India</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>31&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>19&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>22&deg;</span></li>
                                                            <li>12AM <span>18&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="friday">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Myanmar</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-03.png" alt="">
                                                        </div>
                                                        <span>33&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>28&deg;</span></li>
                                                            <li>12PM <span>33&deg;</span></li>
                                                            <li>6PM <span>29&deg;</span></li>
                                                            <li>12AM <span>27&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>Thailand</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-02.png" alt="">
                                                        </div>
                                                        <span>31&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>24&deg;</span></li>
                                                            <li>12PM <span>31&deg;</span></li>
                                                            <li>6PM <span>26&deg;</span></li>
                                                            <li>12AM <span>23&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="weather-item">
                                                        <h6>India</h6>
                                                        <div class="weather-icon">
                                                            <img src="img/weather-icon-01.png" alt="">
                                                        </div>
                                                        <span>28&deg;C</span>
                                                        <ul class="time-weather">
                                                            <li>6AM <span>24&deg;</span></li>
                                                            <li>12PM <span>28&deg;</span></li>
                                                            <li>6PM <span>26&deg;</span></li>
                                                            <li>12AM <span>22&deg;</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item first-service">
                        <div class="service-icon"></div>
                        <h4>Easy Tooplate</h4>
                        <p>Donec varius porttitor iaculis. Integer sollicitudin erat et ligula viverra vulputate. In in quam efficitur, pulvinar justo ut, tempor nunc. Phasellus pharetra quis odio.</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item second-service">
                        <div class="service-icon"></div>
                        <h4>Unique Ideas</h4>
                        <p>Cras ligula diam, tristique at aliquam at, fermentum auctor turpis. Proin leo massa, iaculis elementum massa et, consectetur varius dolor. Fusce sed ipsum sit.</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item third-service">
                        <div class="service-icon"></div>
                        <h4>Best Support</h4>
                        <p>Fusce leo dui. Mauris et justo eget arcu ultricies porta. Nulla facilisi. Nulla nec risus sit amet magna hendrerit venenatis. Sed porta tincidunt lectus eget ultrices.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    <div class="tabs-content" id="recommended-hotel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Recommended Hotel For You</h2>
                    </div>
                </div>
                <div class="wrapper">
                    <div class="col-md-4">
                            <ul class="tabs clearfix" data-tabgroup="third-tab-group">
                                <li><a href="#livingroom" class="active">Living Room <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#suitroom">Suit Room <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#swimingpool">Swiming Pool <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#massage">Massage Service <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#fitness">Fitness Life <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="#event">Evening Event <i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <section id="third-tab-group" class="recommendedgroup">
                            <div id="livingroom">
                                <div class="text-content">
                                    <iframe width="100%" height="400px" src="https://www.youtube.com/embed/rMxTreSFMgE">
                                    </iframe>
                                </div>
                            </div>
                            <div id="suitroom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="owl-suiteroom" class="owl-carousel owl-theme">
                                            <div class="item">
                                                <div class="suiteroom-item">
                                                    <img src="img/suite-02.jpg" alt="">
                                                    <div class="text-content">
                                                        <h4>Clean And Relaxing Room</h4>
                                                        <span>Aurora Resort</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="suiteroom-item">
                                                    <img src="img/suite-01.jpg" alt="">
                                                    <div class="text-content">
                                                        <h4>Special Suite Room TV</h4>
                                                        <span>Khao Yai Hotel</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="suiteroom-item">
                                                    <img src="img/suite-03.jpg" alt="">
                                                    <div class="text-content">
                                                        <h4>The Best Sitting</h4>
                                                        <span>Hotel Grand</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="swimingpool">
                                <img src="img/swiming-pool.jpg" alt="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-content">
                                            <h4>Lovely View Swiming Pool For Special Guests</h4>
                                            <span>Victoria Resort and Spa</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="massage">
                                <img src="img/massage-service.jpg" alt="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-content">
                                            <h4>Perfect Place For Relaxation</h4>
                                            <span>Napali Beach</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="fitness">
                                <img src="img/fitness-service.jpg" alt="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-content">
                                            <h4>Insane Street Workout</h4>
                                            <span>Hua Hin Beach</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="event">
                                <img src="img/evening-event.jpg" alt="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-content">
                                            <h4>Finest Winery Night</h4>
                                            <span>Queen Restaurant</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    




    <section id="most-visited">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Most Visited Places</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="owl-mostvisited" class="owl-carousel owl-theme">
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-01.jpg" alt="">
                                <div class="text-content">
                                    <h4>River Views</h4>
                                    <span>New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-02.jpg" alt="">
                                <div class="text-content">
                                    <h4>Lorem ipsum dolor</h4>
                                    <span>Tokyo</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-03.jpg" alt="">
                                <div class="text-content">
                                    <h4>Proin dignissim</h4>
                                    <span>Paris</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-04.jpg" alt="">
                                <div class="text-content">
                                    <h4>Fusce sed ipsum</h4>
                                    <span>Hollywood</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-02.jpg" alt="">
                                <div class="text-content">
                                    <h4>Vivamus egestas</h4>
                                    <span>Tokyo</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-01.jpg" alt="">
                                <div class="text-content">
                                    <h4>Aliquam elit metus</h4>
                                    <span>New York</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-03.jpg" alt="">
                                <div class="text-content">
                                    <h4>Phasellus pharetra</h4>
                                    <span>Paris</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-04.jpg" alt="">
                                <div class="text-content">
                                    <h4>In in quam efficitur</h4>
                                    <span>Hollywood</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-01.jpg" alt="">
                                <div class="text-content">
                                    <h4>Sed faucibus odio</h4>
                                    <span>NEW YORK</span>
                                </div>
                            </div>
                        </div>
                        <div class="item col-md-12">
                            <div class="visited-item">
                                <img src="img/place-02.jpg" alt="">
                                <div class="text-content">
                                    <h4>Donec varius porttitor</h4>
                                    <span>Tokyo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

