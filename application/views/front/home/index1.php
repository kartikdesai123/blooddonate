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
                <?php if(($this->session->flashdata('success'))){ ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>.
                     </div>
                <?php } ?>
                <section id="first-tab-group" class="tabgroup">
                    <form method='post' action='submit-booking' id='bookticket'>
                        <div id="tab1">
                            <!--Step 1-->
                            <div class="submit-form form1 ">
                                <center>
                                    <h4>Trip Type </h4>
                                </center>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="radio-select">
                                                <div class="row">
                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                        
                                                    </div>
                                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                                        <label for="oneway">Without Cargo Ferry</label>
                                                        <input type="radio" class="tripFerrySelection" name="trip_type" id="withoutcargo" value="without cargo ferry" checked='checked'>

                                                        <label for="trip_type" class="error"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="radio-select">
                                                <div class="row">
                                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                                        <label for="round">Cargo Ferry</label>
                                                        <input type="radio" class="tripFerrySelection" name="trip_type" id="cargo" value="cargo ferry" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-12">
                                        <center>
                                            <fieldset>
                                                <button type="button" data-next-form='2' id="form-submit" class="btn nextbtn">Next</button>
                                            </fieldset>
                                        </center>
                                    </div>
                                </div>

                            </div>

                            <!--Step 2-->

                            <div class="submit-form form2 hidden">
                                <center>
                                    <h4>Trip Route </h4>
                                </center>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Ferry Type  :&nbsp;<span class="TRIPTYPE"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="from">From :</label>
                                                <select name="fromstaton" class="tripFrom fromstaton">
                                                    <option value="">Select a location...</option>
                                                    <?php for($i=0;$i<count($getStop);$i++){ ?>
                                                    <option value="<?php echo $getStop[$i]['stationID']; ?>"><?php echo $getStop[$i]['stationName']; ?></option>
                                                    <?php } ?>
                                                    
                                                </select>
                                                <label for="fromstaton" class="error"></label>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="to">To :</label>
                                                <select name="tostation" class="tripTo tostation">
                                                    <option value="">Select a location...</option>
                                                    
                                                </select>
                                                <label for="tostation" class="error"></label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-prev-form='1' class="btn prevbtn">Prev</button>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-next-form='3' class="btn nextbtn">Next</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3 -->

                            <div class="submit-form form3 hidden">
                                <center>
                                    <h4>Select Vehical</h4>
                                </center>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Ferry Type  :&nbsp;<span class="TRIPTYPE"></span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Ferry Route  :&nbsp;<span class="ROUTE"></span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            
                                        </div>
                                        <div class="col-md-6">
                                           <fieldset>
                                                <label for="vehical">Vehicle:</label>
                                                <select class="vehical"  name="vehical" >
                                                    <option value="">Select a Vehicle...</option>
                                                    <?php for ($i = 0; $i <count($getVehical); $i++) { ?>
                                                         <option data-vehicleCategoryID="<?= $getVehical[$i]['vehicleCategoryID']; ?>"data-passanger="<?= $getVehical[$i]['maximumPassenger']; ?>" value="<?= $getVehical[$i]['vehicleCategoryID']; ?>"><?= $getVehical[$i]['vehicleCategoryName']; ?></option>
                                                    <?php } ?>

                                                </select>

                                                <label for="vehical" class="error"></label>
                                            </fieldset> 
                                        </div>

                                        <div class="col-md-3">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-prev-form='2' class="btn prevbtn">Prev</button>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-next-form='4' class="btn nextbtn">Next</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4 -->
                            <div class="submit-form form4 hidden">
                                <center>
                                    <h4>Trip Date</h4>
                                </center>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Ferry Type  :&nbsp;<span class="TRIPTYPE"></span></label>
                                        </div>

                                        <div class="col-md-6 VEHICAL">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Ferry Route  :&nbsp;<span class="ROUTE"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        
                                        <div class="col-md-3">
                                           
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <label for="departure">Trip Date :</label>
                                                <input name="depature" type="text" class="form-control date onewayTrip" id="deparure" placeholder="Select date..." autocomplete="off">
                                                <label for="depature" class="error"></label>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-3">
                                           
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-prev-form='3' class="btn prevbtn">Prev</button>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-next-form='5' class="btn nextbtn">Next</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 5 -->

                            <div class="submit-form form5 hidden">
                                <center>
                                    <h4>Trip Details</h4>
                                </center>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Trip ID :&nbsp;<span class="TRIPID"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">Trip Date  :&nbsp;<span class="TRIP_DATE"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Ferry ID :&nbsp;<span class="FERRYID"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">Ferry Name :&nbsp;<span class="FERRYNAME"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Departure Time" :&nbsp;<span class="DEPARTURETIME"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">Arrival Time" :&nbsp;<span class="ARRIVALTIME"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">From Station Name :&nbsp;<span class="FROMSTATION"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">To Station Name :&nbsp;<span class="TOSTATION"></span></label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-prev-form='4' class="btn prevbtn">Prev</button>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-next-form='6' class="btn nextbtn">Next</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 6 -->

                            <div class="submit-form form6 hidden">
                                <center>
                                    <h4>Select Class</h4>
                                </center>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Trip ID :&nbsp;<span class="TRIPID" id="TRIPID"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">Trip Date  :&nbsp;<span class="TRIP_DATE"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Ferry ID :&nbsp;<span class="FERRYID"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">Ferry Name :&nbsp;<span class="FERRYNAME"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Departure Time" :&nbsp;<span class="DEPARTURETIME"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">Arrival Time" :&nbsp;<span class="ARRIVALTIME"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">From Station Name :&nbsp;<span class="FROMSTATION"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">To Station Name :&nbsp;<span class="TOSTATION"></span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            
                                        </div>
                                        <div class="col-md-6">
                                           <fieldset>
                                                <label for="to">Select Class :</label>
                                                <select name="selectClass" class="selectClassdiv">
                                                    <option value="">Select a class...</option>
                                                    
                                                </select>
                                                <label for="selectClass" class="error"></label>
                                            </fieldset>
                                        </div>
                                         <div class="col-md-3">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-prev-form='5' class="btn prevbtn">Prev</button>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-next-form='7' class="btn nextbtn">Next</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Step 7 -->

                            <div class="submit-form form7 hidden">
                                <center>
                                    <h4>Enter Passenger Details</h4>
                                </center>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Trip ID :&nbsp;<span class="TRIPID" id="TRIPID"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">Trip Date  :&nbsp;<span class="TRIP_DATE"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Ferry ID :&nbsp;<span class="FERRYID"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">Ferry Name :&nbsp;<span class="FERRYNAME"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">Departure Time" :&nbsp;<span class="DEPARTURETIME"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">Arrival Time" :&nbsp;<span class="ARRIVALTIME"></span></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label for="from">From Station Name :&nbsp;<span class="FROMSTATION"></span></label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="from">To Station Name :&nbsp;<span class="TOSTATION"></span></label>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            
                                        </div>
                                        <div class="col-md-6">
                                           
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-prev-form='6' class="btn prevbtn">Prev</button>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-prev-form='8' class="btn prevbtn">Next</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 8 -->

                            <div class="submit-form form8 hidden">
                                <center>
                                    <h4>Enter Passenger Details</h4>
                                </center>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            
                                        </div>
                                        <div class="col-md-6">
                                           
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="button" id="form-submit" data-prev-form='7' class="btn prevbtn">Prev</button>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <button type="submit" id="form-submit"  class="btn nextbtn">Finish</button>
                                            </fieldset>
                                        </div>
                                    </div>
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-03.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-02.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-01.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-02.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-03.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-01.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-03.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-01.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-02.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-01.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-02.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-03.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-03.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-02.png" alt="">
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
                                                        <img src="<?php echo base_url() ?>public/asset/front/img/weather-icon-01.png" alt="">
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
                                            <img src="<?php echo base_url() ?>public/asset/front/img/suite-02.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Clean And Relaxing Room</h4>
                                                <span>Aurora Resort</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="suiteroom-item">
                                            <img src="<?php echo base_url() ?>public/asset/front/img/suite-01.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Special Suite Room TV</h4>
                                                <span>Khao Yai Hotel</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="suiteroom-item">
                                            <img src="<?php echo base_url() ?>public/asset/front/img/suite-03.jpg" alt="">
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
                        <img src="<?php echo base_url() ?>public/asset/front/img/swiming-pool.jpg" alt="">
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
                        <img src="<?php echo base_url() ?>public/asset/front/img/massage-service.jpg" alt="">
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
                        <img src="<?php echo base_url() ?>public/asset/front/img/fitness-service.jpg" alt="">
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
                        <img src="<?php echo base_url() ?>public/asset/front/img/evening-event.jpg" alt="">
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
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-01.jpg" alt="">
                            <div class="text-content">
                                <h4>River Views</h4>
                                <span>New York</span>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <div class="visited-item">
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-02.jpg" alt="">
                            <div class="text-content">
                                <h4>Lorem ipsum dolor</h4>
                                <span>Tokyo</span>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <div class="visited-item">
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-03.jpg" alt="">
                            <div class="text-content">
                                <h4>Proin dignissim</h4>
                                <span>Paris</span>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <div class="visited-item">
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-04.jpg" alt="">
                            <div class="text-content">
                                <h4>Fusce sed ipsum</h4>
                                <span>Hollywood</span>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <div class="visited-item">
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-02.jpg" alt="">
                            <div class="text-content">
                                <h4>Vivamus egestas</h4>
                                <span>Tokyo</span>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <div class="visited-item">
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-01.jpg" alt="">
                            <div class="text-content">
                                <h4>Aliquam elit metus</h4>
                                <span>New York</span>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <div class="visited-item">
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-03.jpg" alt="">
                            <div class="text-content">
                                <h4>Phasellus pharetra</h4>
                                <span>Paris</span>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <div class="visited-item">
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-04.jpg" alt="">
                            <div class="text-content">
                                <h4>In in quam efficitur</h4>
                                <span>Hollywood</span>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <div class="visited-item">
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-01.jpg" alt="">
                            <div class="text-content">
                                <h4>Sed faucibus odio</h4>
                                <span>NEW YORK</span>
                            </div>
                        </div>
                    </div>
                    <div class="item col-md-12">
                        <div class="visited-item">
                            <img src="<?php echo base_url() ?>public/asset/front/img/place-02.jpg" alt="">
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