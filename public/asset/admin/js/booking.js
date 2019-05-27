var Booking = function() {

    var list = function() {
        
        
       var dataTable = $('#passengerList').DataTable({ 
           "processing":true,  
           "serverSide":true,
           "ordering": false,  
           "ajax":{
                data: {'action': 'bookingList'},
                url:baseurl + "booking-ajaxcall",
                type:"POST"  
           },  
           "columnDefs":[  
            {  
                 
            },  
           ],  
        });
    };
    
   
    return{
        Init: function() {
            list();
        },
    };
}();