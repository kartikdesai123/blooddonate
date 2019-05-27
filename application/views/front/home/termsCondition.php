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
                                    <center><h4>Terms & Condition</h4></center>

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
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;CURRENT BOOKING CLOSES 45 MINUTES BEFORE SCHEDULE DEPARTURE.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;TERMINAL GATES SHALL BE CLOSED 30 MINUTES BEFORE SCHEDULED DEPARTURE. ENTRY TO THE TERMINAL SHALL NOT BE PERMITTED THEREAFTER. TICKETS OF PASSENGERS / VEHICLES REPORTING AFTER THE TERMINAL GATES CLOSE SHALL BE AUTOMATICALLY CANCELLED AND NO REFUND SHALL BE ISSUED. </p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;ALL PASSENGERS ARE REQUESTED TO CARRY A VALID PHOTO ID PROOF. HALF - FARES SHALL BE APPLICABLE FOR CHILDREN BETWEEN 2 TO 12 YEARS OF AGE, SUBJECT TO PRESENTATION OF VALID AGE PROOF. IF VALID AGE PROOF IS NOT PRESENTED THE FULL FARE SHALL BE APPLICABLE. </p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;PASSENGERS ARE REQUESTED TO WEAR THE WRIST BAND ISSUED FROM TICKET COUNTERS THROUGHOUT THE JOURNEY. ABSENCE OF WRIST BAND SHALL ATTRACT A PENALTY OF RS. 500/-. THE WRIST BAND IS YOUR RESPONSIBILITY.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;PRIORITY WILL BE GIVEN TO EMERGENCY SERVICES AT ALL TIMES.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;TRUCK DRIVERS ARE REQUESTED TO ENSURE THAT THEY HAVE VALID DRIVING LICENSE AND THAT THE TRUCK IS IN GOOD CONDITIONS\ WITH VALID REGISTRATION, INSURANCE AND FITNESS CERTIFICATE. TRUCK DRIVERS ARE REQUESTED TO PRODUCE BILTI/LR & CHALLAN AT TICKET COUNTER. BOARDING THE FERRY CAN BE DENIED IN THE ABSENCE OF ANY OF THE ABOVE DOCUMENTS. </p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;SMOKING / SPITTING / CHEWING TOBACCO ON THE FERRY AND WITHIN THE TERMINAL PREMISES IS STRICTLY PROHIBITED AND PUNISHABLE BY LAW. A PENALTY OF RS. 2500/- SHALL BE CHARGED FROM DEFAULTERS</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;CARRYING & CONSUMPTION OF ALCOHOL OR DRUGS ON THE FERRY AND WITHIN THE TERMINAL PREMISES IS STRICTLY PROHIBITED AND IS A PUNISHABLE BY LAW</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;ALL PASSENGERS ARE REQUESTED TO COOPERATE FOR LUGGAGE / VEHICLE SCANNING.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;MISCONDUCT WITH SECURITY STAFF, TERMINAL STAFF, FERRY CREW AND FELLOW PASSENGERS IS PUNISHABLE BY LAW.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;DAMAGE TO THE FERRY / TERMINAL PROPERTY IS PUNISHABLE BY LAW.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;THE FERRY OPERATOR IS INDEMNIFIED FROM ANY LOSS TO OWNERS BELONGINGS.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;PARKING & BOARDING AT OWNERS RISK.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;RIGHT OF ADMISSION RESERVED.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Correction of NAME is not permitted in ticket ONCE BOOKED. So please make sure for correct NAME.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Reporting time should be 1 HOUR prior to departure.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Passenger carry a PHOTO IDENTITY CARD at the time of checking.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Ticket will be valid only till the date of travel prior to departure.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Carriage of security Removed articles will not permitted in hand baggage eg: cutter, knifes, explosives, inflammable etc.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Passenger belongings carried in hand will be at their own risk carrier is no way liable in any lose or damage from what so it may cause.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;The carrier reserves the right to cancel or change the published voyage for any official purpose and in any manner or to any extent. The carrier shall bear no liability for any loss that passenger may suffer, any consequences thereof or in respect of any changes in scheduled due to Bad weather or technical reason. In this case passenger can either claim full refund or can rescheduled His/her journey on availability.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;The passenger hereby warrants and declares he / she including any accompanying children and / or babies in arms does not suffer from any form of major illness or ailments. The carrier shall not be responsible for any consequences of whatsoever nature resulting from pre-carriage illness / ailments that may manifest during the course of carriage. The passenger undertakes to indemnity and hold the carrier harmless from any and all such consequences.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;This ticket and the carriage of passenger & Vehicle hereunder shall be governed by Indian law, and all disputes and claims (Including but not limited to claims arising out of personal injury) and the carriage of passengers & Vehicles shall be referred to the exclusive jurisdiction of the competent court in Surat, Gujarat, India.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;The carrier shall have no liability whatsoever for any injury of illness arising or resulting from any cause not attributable to any act, neglect, default on the part of  the carrier and its servants. a) Check In Counter Closes – 30 Mins. Prior to departure. b) Boarding Closes – 15 Mins Prior to departure.</p>
                                            <p><i class="fa fa-hand-o-right" aria-hidden="true"></i> &nbsp;Pets and animals not allowed on board the ferry.</p>
                                            
                                        </div>
                                    </div>
            </div>
        </div>
    </div><br><br>
    
    