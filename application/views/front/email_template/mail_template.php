<div style="width:100%; margin:0px; padding: 0px;">
    <!-- main -->
    <div style="padding: 48px;">
        <div style="width: 560px; margin: 0 auto; display: block; box-shadow: 0px 0px 14px 0px rgba(142, 140, 140, 0.67); background: #fff; padding: 48px;">
            <!-- wrapper -->

            <p style=""><img src="<?php echo 'http://roroferry.in/public/asset/front/img/logo.png'; ?>" style="display: block;margin: 0 auto; text-align: center; width: 200px;padding: 10px;"></p>

            <div style="background: linear-gradient(#fff,rgba(222, 13, 0, 0.16)); box-shadow: 0px 0px 16px 0px rgba(0, 0, 0, 0.33); padding: 16px;">
                <!-- Contnt start -->
                <?php 
                if($passangerDetails[0]->passangerGender == "Male"){
                    $passangerDetails[0]->passangerGender= "Mr.";
                }else{
                    $passangerDetails[0]->passangerGender= "Miss/Mrs.";
                }
                ?>
                <h3 style="margin-top: 10px;font-family: sans-serif;">Dear <?php print_r($passangerDetails[0]->passangerGender." ".$passangerDetails[0]->passangerName);?> </h3>
                <!-- <h3 style="margin-top: 30px;">Hello ,</h3> -->
                <p style ="font-size:16px; font-family: sans-serif; margin-top:30px;line-height: 24px;">Your roroferry ticket confirmed successfully.</p>

                <p style ="font-size:16px;font-family: sans-serif;line-height: 24px;">Your Ticket No : <?php print_r($ticketDetails[0]->transaction_id);?></p>

                <p style ="font-size:16px;font-family: sans-serif;line-height: 24px;">Your Ticket pdf atteched below.</p>
                <p style ="font-size:16px;font-family: sans-serif;line-height: 24px;">Please carry out hard copy of ticket with you during Journey.</p>
                <br>

                <p style="font-size:16px; margin-top:20px; font-family: sans-serif; line-height: 24px;">Thank You,</p>
                <p style="font-size:16px; margin-top:0px;font-family: sans-serif; line-height: 24px;">Team <?php echo PROJECT_NAME; ?> </p>
            </div>
            <!-- content over -->
        </div>
        <!-- wrapper over -->
    </div>
</div>