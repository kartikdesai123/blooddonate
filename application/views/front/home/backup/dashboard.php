  <section class="banner" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="left-side">
                            <div class="logo">
                                <img src="<?= base_url()?>public/asset/front/img/logo.png" alt="Flight Template">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <section id="first-tab-group" class="tabgroup">
                            <div id="tab1">
                                <div class="submit-form">
                                    <h4>Check Trips Details </h4>
                                    <form id="form-submit" action="" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <label class="col-md-5" for="from">From:</label>
                                                    <div class="col-md-6">
                                                    <select required name='from' onchange='this.form.()'>
                                                        <option value="">Select a location...</option>
                                                        <option value="1">Dahej</option>
                                                        <option value="2">Ghogha</option>
                                                        <option value="3">Joi ride</option>
                                                    </select>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <label class="col-md-5" for="to">To:</label>
                                                    <div class="col-md-6">
                                                    <select required name='to' onchange='this.form.()'>
                                                        <option value="">Select a location...</option>
                                                        <option value="1">Dahej</option>
                                                        <option value="2">Ghogha</option>
                                                        <option value="3">Joi ride</option>
                                                    </select>
                                                        </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <label class="col-md-5" for="departure">Departure date:</label>
                                                    <div class="col-md-6">
                                                    <input name="departure" type="text" class="form-control date" id="departure" placeholder="Select date..." required="" onchange='this.form.()'>
                                                </div>
                                                    </fieldset>
                                            </div> 
                                            <div class="col-md-6 col-md-offset-5">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="btn">Check Now</button>
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