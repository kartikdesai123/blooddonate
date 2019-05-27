var PaymentInquirey = function() {
    
    var inquirey = function(){
        var validateTrip = true;
        var submitFrom = true;
        $('#paymentInquiry').validate({
            debug: true,
            rules: {
                amount: {required: true},
                PaymentID: {required: true},
                trackID: {required: true},
                transactionID: {required: true},
            },
            messages: {
                amount: {
                    required: "please enter payment amount"
                },  
                
                PaymentID: {
                    required: "please enter payment ID"
                }, 
                
                trackID: {
                    required: "please enter track ID"
                }, 
                
                transactionID: {
                    required: "please enter transaction ID"
                }, 
            },
            invalidHandler: function(event, validator) {
                validateTrip = false;
            },
            submitHandler: function(form) {
                if(submitFrom)
                {
                    form.submit();
                }
            }
        });
    }
    return{
        init: function() {
            inquirey();
        },
    }
}();