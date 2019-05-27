<section class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="logo">
                    <img src="<?= base_url() ?>public/asset/front/img/logo.png" alt="Flight Template">
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-direction-button">
                    <a href="<?= base_url().'account' ?>"><i class="fa fa-home"></i>Go Back Home</a>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Contact Information</h2>
                    <p> Pellentesque quis turpis et lectus auctor gravida ut vel orci. Proin et tempus nunc. Proin sed justo neque. Donec et tempus ligula, et gravida elit. Vivamus vitae placerat metus.</p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="<?= base_url() ?>public/asset/front/img/contact-01.jpg" alt="">
            </div>
            <div class="col-md-6">
                <img src="<?= base_url() ?>public/asset/front/img/contact-02.jpg" alt="">
            </div>
            <div class="col-md-4">
                <h6>Proin dignissim rhoncus</h6>
                <p>Aliquam elit metus, varius in ligula sed, posuere aliquam nibh. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis vel rhoncus lectus.</p>
            </div>
            <div class="col-md-4">
                <h6>Duis vehicula quis elit</h6>
                <p>Donec nisl felis, eleifend eu diam ut, condimentum finibus erat. Aliquam luctus commodo ultricies. Etiam in tellus mi. Nam lobortis est magna, et rutrum ipsum lacinia id.</p>
            </div>
            <div class="col-md-4">
                <h6>Duis vel rhoncus lectus</h6>
                <p>Mauris aliquet eget lorem a tempor. Morbi in dui sed orci placerat ultrices sed a mi. Praesent eget porttitor enim. In tempor eros mi. Morbi a lobortis ante. Sed blandit vitae diam commodo ultricies.</p>
            </div>
        </div>
    </div>
</section>

<section class="contact-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Leave us a message</h2>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <form id="contact" action="#" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="btn">Submit Your Message</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="map">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7895.485196115994!2d103.85995441789784!3d1.2880401763270322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7fb4e58ad9cd826e!2sSingapore+Flyer!5e0!3m2!1sen!2sth!4v1505825620371" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
