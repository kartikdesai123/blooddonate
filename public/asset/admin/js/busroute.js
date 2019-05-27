var Busroute = function() {

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
                url: baseurl + "deleteRoute",
                data: {id: id},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
        
       var dataTable = $('#routeList').DataTable({ 
           "processing":true,  
           "serverSide":true,
           "ordering": false,  
           "ajax":{ 
                data: {'action': 'busRoute'},
                url:baseurl + "busRoute-ajaxcall",
                type:"POST"  
           },  
           "columnDefs":[  
            {  
                 
            },  
           ],  
        });
    };
    
    var addRoute = function(){
        $('#routeTime').timepicki();
        var form = $('#addBusRoute');
        var rules = {
            routeName:{required: true},
            routeTime:{required: true},
            status:{required: true},
        };
        handleFormValidate(form, rules, function(form) {
            handleAjaxFormSubmit(form,true);
        });
    };
    
    var editRoute = function(){
        $('#routeTime').timepicki();
        var form = $('#editBusRoute');
        var rules = {
            routeName:{required: true},
            routeTime:{required: true},
            status:{required: true},
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
            addRoute();
        },
        
        Edit : function(){
            editRoute();
        }
    };
}();