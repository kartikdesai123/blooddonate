var Home = function() {
    var mainForm = function() {
        var validateTrip = true;
        var submitFrom = false;
        $('#bookticket').validate({
            debug: true,
            rules: {
                fromstaton: {required: true},                
                tostation: {required: true},
                'pasanger_1': {required: true},
                depature: {required: true},
                one_way_price: {required: true},
                more2years: {required: true},
                returntrip: {required: {depends: function(e) {
                            return ($('input[name="trip"]').val() == 'round');
                        }}},
            },
            messages: {
                fromstaton: {
                    required: "please select from station"
                },
                tostation: {
                    required: "please select to station"
                },
                depature: {
                    required: "please select to depature"
                },
                returntrip: {
                    required: "please select to return"
                },
                one_way_price: {
                    required: "please select to one_way_price"
                },
                more2years: {
                    required: "please select to passanger"
                },
                'pasanger_1': {
                    required: "please select to passanger"
                },
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                validateTrip = false;
            },
            submitHandler: function(form) {
                validateTrip = checkCustom();
               // $('#bookticket').submit();
                //   $(form).ajaxSubmit();
                if(submitFrom)
                {
                     form.submit();
                }
//                  form.submit();
            }


        });


        $('body').on('click', '.nextbtn', function(form) {
            var nextForm = $(this).attr('data-next-form');
            if (nextForm == 2)
            {
                $('#bookticket').submit();
                var deparure = $('#deparure').val();
                var tripTime = $('.tripTime').val();
                var fromstaton = $('.fromstaton option:selected').text();
                var tostation = $('.tostation option:selected').text();
                var less2years = $('.less2years option:selected').val();
                var more2years = $('.more2years option:selected').val();
                if (less2years == "")
                {
                    less2years = 0;
                }

                var totalPassengers = parseInt(less2years) + parseInt(more2years);
                $('.fromDate').html(deparure);
                $('.tripstartTime').html(tripTime);
                $('.route').html(fromstaton + ' - ' + tostation);
                $('.passengers').html(totalPassengers);
                $('#bookticket').validate();
               // console.log($('#bookticket').validate());
                if (validateTrip)
                {
                    var postData = {};
                    ajaxcall(baseurl + 'get-pickup-detail', postData, function(data) {
                        var output = JSON.parse(data);
                        var html = "";
                        for (var i = 0; i < output.data.departureBuses.length; i++) {
                            $('.pickpoint').append($('<option>', {value: output.data.departureBuses[i].buspoint, text: output.data.departureBuses[i].buspoint}));
                        }
                        for (var i = 0; i < output.data.arrivalBuses.length; i++) {
                            $('.droppoint').append($('<option>', {value: output.data.arrivalBuses[i].buspoint, text: output.data.arrivalBuses[i].buspoint}));
                        }
                    });

                    $('.submit-form').addClass('hidden');
                    $('.form' + nextForm).removeClass('hidden');
                }
            }
             if (nextForm == 3)
            {
                $('#bookticket').submit();
                var i;
                var less2years = $('.less2years option:selected').val();
                var more2years = $('.more2years option:selected').val();
                if (less2years == "")
                {
                    less2years = 0;
                }

                var totalPassengers = parseInt(less2years) + parseInt(more2years);
                
                $('.passangerDetail').html('');
                for( i =0;i  < totalPassengers; i++){
                   
                    var getHtml = $('.pessngerSample').html();
//                    var s = getHtml.replace(/\@/g, i);
                    var res = getHtml.replace(/\@/g,i); 
                    $('.passangerDetail').append(res);
                    
                     $('.pasanger_name_'+i).rules("add", {
                        required: true
                    });
                }
                
               setTimeout(function(){
                    if(validateTrip)
                    {
                        $('.submit-form').addClass('hidden');
                        $('.form' + nextForm).removeClass('hidden');
                    }
                },1000);
                
            }
             if (nextForm == 4)
            {
               
                $('#bookticket').submit();
                $('.emailadd').rules("add", {
                        required: true
                    });
                $('.mobile-no').rules("add", {
                        required: true
                    });
                setTimeout(function(){
                    if(validateTrip)
                    {
                        $('.submit-form').addClass('hidden');
                        $('.form' + nextForm).removeClass('hidden');
                    }
                },1000);
            }
            if (nextForm == 5)
            {
                submitFrom = true;
            }

        });
        $('body').on('click', '.prevbtn', function() {
            var nextForm = $(this).attr('data-prev-form');

            $('.submit-form').addClass('hidden');
            $('.form' + nextForm).removeClass('hidden');
        });
        
        $('body').on('change','.busservices',function(){
            var services=$(this).val();
            if(services == 'busservices'){
                $('.pickpoint').removeAttr('disabled');
                $('.droppoint').removeAttr('disabled');
            }else{
                $('.pickpoint').attr( "disabled", "disabled" );  
                $('.droppoint').attr( "disabled", "disabled" );  
            }
        });
        $('body').on('change','.tripFerrySelection',function(){
            $feeryType=$(this).val();
            if($feeryType == 'cargo-ferry'){
                $('.vehical').removeAttr('disabled'); 
                $('.vehicalmore2years').removeAttr('disabled');
                $('.more2years').attr( "disabled", "disabled" ); 
            }else{
              $('.vehical').attr( "disabled", "disabled" ); 
              $('.vehicalmore2years').attr( "disabled", "disabled" ); 
              $('.more2years').removeAttr('disabled'); 
            }
        });
    }   
    

// call when all validate is true
    function checkCustom() {

        if ($('.tripSelection:checked').val() == 'one-way') {

            if ($('input[name="one_way_time"]').val() == '') {
                $('.one_way_trip').html('Please select time');
                $('.one_way_trip').removeAttr('style');
                return false;
            } else {
                $('.one_way_trip').html('');
                return true;
            }
        } else {
            var errorCount = 0;
            if ($('input[name="one_way_time"]').val() == '') {
                $('.one_way_trip').removeAttr('style');
                $('.one_way_trip').html('Please select time');

                errorCount++;
            } else {
                $('.one_way_trip').html('');
                errorCount = 0;
            }

            if ($('input[name="round_way_time"]').val() == '') {
                $('.round_way_trip').removeAttr('style');
                $('.round_way_trip').html('Please select time');

                errorCount++;
            } else {
                $('.round_way_trip').html('');
                errorCount = 0;
            }

            if (errorCount == 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    var handleGenral = function() {
        $('body').on('click', '.tripSelection', function() {
            var value = $(this).val();
            if (value == 'one-way') {
                $('.roundTrip').attr('disabled', true);
                $('.roundTicket').attr('disabled', true);

            } else {
                $('.roundTrip').attr('disabled', false);
                $('.roundTicket').attr('disabled', false);

            }
        });

        $('body').on('change', '.tripFrom', function() {
            var selectedValue = $(this).val();

            $(".tripTo option").remove();
            $(".tripFrom option").each(function() {
                if ($(this).val() != '' && $(this).val() != selectedValue) {
                    $('.tripTo').append($('<option>', {value: $(this).val(), text: $(this).text()}));
                }
            });

        });

        var date = new Date();
        date.setDate(date.getDate());

        $('#deparure').datepicker({
            startDate: date,
            autoclose:true,
        }).on('changeDate', function(e) {
            var fromDate = $(this).val();
            var fromstaton = $('.fromstaton').val();
            var tostation = $('.tostation').val();
            if (fromstaton != "" && tostation != "") {
                var postData = {fromDate: fromDate, fromstaton: fromstaton, tostation: tostation};
                ajaxcall(baseurl + 'trip-detail', postData, function(data) {
                    var output = JSON.parse(data);
                    var html = "";
                    for (var i = 0; i < output.data.length; i++) {
                        html += "<button type='button' class='btn btn-default cusClass selectTrip' data-time='" + output.data[i].departureTime + "' data-price='" + output.data[i].amount + "'>" + output.data[i].departureTime + "<span class='price'><i class='fa fa-rupee'></i>" + output.data[i].amount + "</span></button>";
                    }
                    $('.ticketOneway').html(html);
                });
            } else {
                alert('Select proper destination.');
            }
        });
        $('#return').datepicker({
            startDate: date,            
            autoclose:true,
        }).on('changeDate', function(e) {
            var fromDate = $(this).val();
            var fromstaton = $('.fromstaton').val();
            var tostation = $('.tostation').val();
            if (fromstaton != "" && tostation != "") {
                var postData = {fromDate: fromDate, fromstaton: fromstaton, tostation: tostation};

                ajaxcall(baseurl + 'trip-detail', postData, function(data) {
                    var output = JSON.parse(data);
                    var html = "";
                    for (var i = 0; i < output.data.length; i++) {
                        html += "<button type='button' class='btn btn-default cusClass selectTrip' data-time='" + output.data[i].departureTime + "' data-price='" + output.data[i].amount + "'>" + output.data[i].departureTime + "<span class='price'><i class='fa fa-rupee'></i>" + output.data[i].amount + "</span></button>";
                    }
                    $('.ticketRound').html(html);
                });
            } else {
                alert('Select proper destination.');
            }
        });

        $('body').on('click', '.selectTrip', function() {

            $(this).parents('fieldset').find('.selectTrip').removeClass('active');
            $(this).addClass('active');
            var time = $(this).attr('data-time');
            var price = $(this).attr('data-price');

            $(this).parents('fieldset').find('.tripPrice').val(price);
            $(this).parents('fieldset').find('.tripTime').val(time);
        });

        $('body').on('change', '.less2years', function() {
            if ($(".more2years").val() == '') {
                $(this).rules("add", {
                    required: true
                });
                $(".more2years").rules("remove");
            }
        })
        $('body').on('change', '.more2years', function() {
            if ($(".less2years").val() == '') {
                $(this).rules("add", {
                    required: true
                });
                $(".less2years").rules("remove");
            }
        })
    }


    return{
        init: function() {
            mainForm();
            handleGenral();
        },
    }
}();