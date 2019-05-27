var Home = function() {
    var mainForm = function() {

        var validateTrip = true;
        var submitFrom = false;
        $('#bookticket').validate({
            debug: true,
            rules: {
                trip_type: {required: true},
                fromstaton: {required: true},
                tostation: {required: true},
                vehical: {required: true},
                depature: {required: true},
                selectClass: {required: true},
            },
            messages: {
                selectClass: {
                    required: "Please select trip class"
                },
                trip_type: {
                    required: "Please select trip type"
                },
                fromstaton: {
                    required: "please select from station"
                },
                tostation: {
                    required: "please select to station"
                },
                vehical: {
                    required: "please select to vehical"
                },
                depature: {
                    required: "Please select trip date"
                },
            },
            invalidHandler: function(event, validator) {
                validateTrip = false;
            },
            submitHandler: function(form) {
                validateTrip = checkCustom();
                if(submitFrom)
                {
                     form.submit();
                }
            }
        });

        var date = new Date();
        // date.setDate(date.getDate());
        $('#deparure').datepicker({
            startDate: date,
            autoclose:true,
            dateFormat: 'dd/mm/yy',
        });

         $('body').on('click', '.nextbtn', function(form) {
            var nextForm = $(this).attr('data-next-form');
            
            if (nextForm == 2)
            {
                $('#bookticket').submit();
                var trip_type = $("input[name='trip_type']:checked").val();
                $('.TRIPTYPE').text(trip_type);

                if (validateTrip)
                {

                    $('.submit-form').addClass('hidden');
                    $('.form' + nextForm).removeClass('hidden');
                }
            }


            if (nextForm == 3)
            {
                $('#bookticket').submit();
                var trip_type = $("input[name='trip_type']:checked").val();
                var fromstaton = $('.fromstaton option:selected').text();
                var tostation = $('.tostation option:selected').text();
                var triproute  = fromstaton + ' - ' + tostation ;


                $('.TRIPTYPE').text(trip_type);
                $('.ROUTE').text(triproute);


                if (validateTrip)
                {
                    if(trip_type == "WITHOUT CARGO FERRY" || trip_type == "without cargo ferry" ){
                        nextForm++;
                        $('.ROUTE').text(triproute);
                        $('.submit-form').addClass('hidden'); 
                        $('.form' + nextForm).removeClass('hidden');
                    }else{
                        $('.ROUTE').text(triproute);
                        $('.submit-form').addClass('hidden'); 
                        $('.form' + nextForm).removeClass('hidden');
                    }
                }
            }

            if (nextForm == 4)
            {

                $('#bookticket').submit();
                

                var trip_type = $("input[name='trip_type']:checked").val();
                var fromstaton = $('.fromstaton option:selected').text();
                var tostation = $('.tostation option:selected').text();
                var triproute  = fromstaton + ' - ' + tostation ;

                $('.TRIPTYPE').text(trip_type);
                $('.ROUTE').text(triproute);
                if(trip_type == "WITHOUT CARGO FERRY" || trip_type == "without cargo ferry" ){
                  $('.VEHICAL').html('<label for="from">Vehical  : No Vehical</label>'); 
                }else{
                    var vehical = $('.vehical option:selected').text();
                    var vehicalId = $('.vehical').val();
                    var vehicleCategoryID = $('.vehical').attr('data-vehicleCategoryID');
                    var passanger = $('.vehical').attr('data-passanger');
                     $('.VEHICAL').html('<label for="from">Vehical  :&nbsp;'+vehical+'</label>'); 
                }
                

                if (validateTrip)
                {
                        $('.submit-form').addClass('hidden'); 
                        $('.form' + nextForm).removeClass('hidden');
                }
            }

            if (nextForm == 5)
            {
                $('#bookticket').submit();
                var tripdate = $("#deparure").val();
                var trip_type = $("input[name='trip_type']:checked").val();

                var fromId = $('.fromstaton').val();
                var toId = $('.tostation').val();

                var fromstaton = $('.fromstaton option:selected').text();
                var tostation = $('.tostation option:selected').text();
                var triproute  = fromstaton + ' - ' + tostation ;
                $('.TRIPTYPE').text(trip_type);
                $('.ROUTE').text(triproute);
                $('.TRIPDATE').text(tripdate);
                if(trip_type == "WITHOUT CARGO FERRY" || trip_type == "without cargo ferry" ){
                  $('.VEHICAL').html('<label for="from">Vehical  : No Vehical</label>'); 
                }else{
                    var vehical = $('.vehical option:selected').text();
                    var vehicalId = $('.vehical').val();
                    var vehicleCategoryID = $('.vehical option:selected').attr('data-vehicleCategoryID');
                    
                    var passanger = $('.vehical option:selected').attr('data-passanger');
                     $('.VEHICAL').html('<label for="from">Vehical  :&nbsp;'+vehical+'</label>'); 
                }

                if (validateTrip)
                {   
                    var postData = {sourceID: fromId, destinationID: toId, vehicleTypeID: vehicalId ,vehicleCategoryID:vehicleCategoryID,departureDate:tripdate };
                    ajaxcall(baseurl + 'get-cargo-trips', postData, function(data) {
                            var output = JSON.parse(data);
                            $(".TRIPID").text(output['data'][0].tripID);
                            $(".TRIP_DATE").text(output['data'][0].tripDate);
                            $(".FERRYID").text(output['data'][0].ferryID);                            
                            $(".FERRYNAME").text(output['data'][0].ferryName);

                            $(".DEPARTURETIME").text(output['data'][0].arrivalTime);
                            $(".ARRIVALTIME").text(output['data'][0].departureTime);
                            $(".FROMSTATION").text(output['data'][0].fromStationName);
                            $(".TOSTATION").text(output['data'][0].toStationName);

                            $('.submit-form').addClass('hidden'); 
                            $('.form' + nextForm).removeClass('hidden');
                    });
   
                }
            }   
                if (nextForm == 6)
                {
                    var tripId= $("#TRIPID").text();
                    var postData = {tripId: tripId};
                    ajaxcall(baseurl + 'get-class', postData, function(data) {
                         var output = JSON.parse(data);
                         var markup='<option value="">Select Class</option>';
                         //console.log((output.data)[0].classID);
                         for(var i =0; i < (output.data).length ; i++){
                                var temp="";
                                temp='<option value="'+(output.data)[i].classID+'">'+(output.data)[i].className+'</option>';

                                markup=markup+temp;
                         }
                            $(".selectClassdiv").html(markup);
                            $('#bookticket').submit();
                            $('.submit-form').addClass('hidden'); 
                            $('.form' + nextForm).removeClass('hidden');
                    });
                    
                }

                if (nextForm == 7)
                {
                            $('#bookticket').submit();
                            if (validateTrip)
                            {
                                $('.submit-form').addClass('hidden'); 
                                $('.form' + nextForm).removeClass('hidden');
                            }  
                            
                    
                }
         });



        $('body').on('click', '.prevbtn', function() {
            var nextForm = $(this).attr('data-prev-form');
            if(nextForm == 3){
                var trip_type = $("input[name='trip_type']:checked").val();
                if(trip_type == "WITHOUT CARGO FERRY" || trip_type == "without cargo ferry" ){
                        nextForm--;
                        $('.submit-form').addClass('hidden');
                        $('.form' + nextForm).removeClass('hidden'); 
                    }else{
                        $('.submit-form').addClass('hidden');
                        $('.form' + nextForm).removeClass('hidden'); 
                    }

            }else{
                $('.submit-form').addClass('hidden');
                $('.form' + nextForm).removeClass('hidden'); 
            }
            
        });





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

                if (errorCount == 0) {
                    return true;
                } else {
                    return false;
                }
            }
        }



        $('body').on('change', '.tripFrom', function() {
            var selectedValue = $(this).val();

            $(".tripTo option").remove();
            $(".tripFrom option").each(function() {
                if ($(this).val() != '' && $(this).val() != selectedValue) {
                    $('.tripTo').append($('<option>', {value: $(this).val(), text: $(this).text()}));
                }
            });

        });



    }   
    


    return{
        init: function() {
            mainForm();
        },
    }
}();