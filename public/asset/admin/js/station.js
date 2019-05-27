var Station = function() {

    var list = function() {
        $('body').on('click', '.deleteImage', function() {
            var id = $(this).data('id');
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);
        });
        
        $('body').on('click', '.yes-sure', function() {
            
            var id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: baseurl + "deleteStation",
                data: {id: id},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
        
       var dataTable = $('#stationList').DataTable({ 
           "processing":true,  
           "serverSide":true,
           "ordering": false,  
           "ajax":{ 
                data: {'action': 'stationList'},
                url:baseurl + "station-ajaxcall",
                type:"POST"  
           },  
           "columnDefs":[  
            {  
                 
            },  
           ],  
        });
    };
    
    var addStation = function(){
         
        $('body').on('change','#route',function(){
            var id = $('#route :selected').val();
            $.ajax({
                type: "POST",
                url: baseurl + "routeTimeList",
                data: {id: id},
                success: function(output) {
                    var details = JSON.parse(output);
                    var html="<option value=''>Select Ferry Time</option>";
                    for(var i = 0; i < details.length ; i++){
                        var temp = "";
                        temp = "<option value='"+ details[i].time +"'>"+ details[i].time +"</option>";
                        html = html + temp;
                    }
                    $('.time1').html(html);
                }
            });
            
        });
        $('body').on('click','.removeBtn',function(){
            $(this).parent().parent().remove(); 
        });
        $('body').on('click','.addstation',function(){
           
                    var html='<div class"row removeDiv">'+
                    '<div class="col-lg-12">'+
                        '<div class="col-sm-3">'+
                            '<select name="stationType[]" class="form-control stationType"  >'+
                                    '<option value="">Select station type</option>'+
                                    '<option value="pickup">Pickup</option>'+
                                    '<option value="drop">Drop</option>'+
                            '</select>'+
                        '</div>'+

                        '<div class="col-sm-3">'+
                            '<input type="text" class="form-control stationName" name="stationName[]" placeholder="Enter station Name">'+
                        '</div>'+

                        '<div class="col-sm-4">'+
                            '<input type="text" class="form-control stationTime" name="stationTime[]" placeholder="Enter station time">'+
                        '</div>'+

                        '<div class="col-sm-2">'+
                            '<button class="btn btn-outline btn-warning dim addstation" type="button"><i class="fa fa-plus"></i></button>'+
                            '<button class="btn btn-outline btn-danger  dim removeBtn" type="button"><i class="fa fa-trash"></i></button>'+
                        '</div>'+
                    '</div>'+
                '</div>'; 
            $('.appendDiv').append(html);
            $('.stationTime').timepicki();
       });
        $('.stationTime').timepicki();
        var validateTrip = true;
        var submitFrom = true;
        var customValid = true;
        $('#addBusStation').validate({
            debug: true,
            rules: {
                route: {required: true},
                ferryTime:{required: true},
            },
            
            invalidHandler: function(event, validator) {
                validateTrip = false;
                customValid = customerInfoValid();
            },
            submitHandler: function(form) {
                customValid = customerInfoValid();
                if(submitFrom && customValid)
                {
                    handleAjaxFormSubmit(form,true);
//                    form.submit();
                }
            }
          });
          
          function customerInfoValid(){
           var customValid = true;
            $('.stationType').each(function(){
                if($(this).is(':visible')){
                    if($(this).val() == ''){
                        $(this).addClass('error');
                        customValid = false;
                    }else{
                         $(this).removeClass('error');
                    }
                }
            });
            
            $('.stationName').each(function(){
                if($(this).is(':visible')){
                    if($(this).val() == ''){
                        $(this).addClass('error');
                        customValid = false;
                    }else{
                        $(this).removeClass('error');
                    }
                }
            });
            
            $('.stationTime').each(function(){
                if($(this).is(':visible')){
                    if($(this).val() == ''){
                        $(this).addClass('error');
                        customValid = false;
                    }else{
                        $(this).removeClass('error');
                    }
                }
            });
            return customValid;
        }
        
    };
    
    var editStation = function(){
         $('.stationTime').timepicki();
         $('body').on('change','#route',function(){
            var id = $('#route :selected').val();
            $.ajax({
                type: "POST",
                url: baseurl + "routeTimeList",
                data: {id: id},
                success: function(output) {
                    var details = JSON.parse(output);
                    var html="<option value=''>Select Ferry Time</option>";
                    for(var i = 0; i < details.length ; i++){
                        var temp = "";
                        temp = "<option value='"+ details[i].time +"'>"+ details[i].time +"</option>";
                        html = html + temp;
                    }
                    $('.time1').html(html);
                }
            });
            
        });
        
        var form = $('#addBusRoute');
        var rules = {
            route:{required: true},
            ferryTime:{required: true},
            stationType:{required: true},
            stationName:{required: true},
            stationTime:{required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    }
    
    return{
        Init: function() {
            list();
        },
        Add : function(){
            addStation();
        },
        Edit : function(){
            editStation();
        },
       
    };
}();