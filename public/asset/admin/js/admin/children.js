var Children = function() {

    var list = function() {
        
        $('body').on('click', '.deleteImage', function() {
            var id = $(this).data('id');
            var image = $(this).data('image');
            
            setTimeout(function() {
                $('.yes-sure:visible').attr('data-id', id);
                $('.yes-sure:visible').attr('data-image', image);
            }, 500);
        });
        
        $('body').on('click', '.yes-sure', function() {
            
            var id = $(this).attr('data-id');
            var image = $(this).attr('data-image');
            
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "deleteChild",
                data: {id: id,image:image},
                success: function(data) {
                    handleAjaxResponse(data);
                }
            });
        });
        
        
        var dataTable = $('#childrenList').DataTable({  
            "processing":true,  
            "serverSide":true, 
            "searching": true,
            "ordering": false,  
            "ajax":{ 
                 data: {'action': 'childrenList'},
                 url:baseurl + "children-ajaxcall",
                 type:"POST"  
            },  
            "columnDefs":[  
                 {  
                      "targets":[0, 3, 4],  
                      "orderable":false,  
                 },  
            ],  
         });
    };
    
    
    var addChild = function(){
        var form = $('#addChild');
         var rules = {
             childPhoneNo: {required: true,maxlength:10,minlength:10},
             childBirthDate: {required: true},
             childGender: {required: true},
             childBloodGroup: {required: true},
             childAddress: {required: true},
             childPhoto: {required: true},
             childName: {required: true},
         };
         handleFormValidate(form, rules, function(form) {
             handleAjaxFormSubmit(form,true);
         });
    }
    
    var editChild = function(){
        var form = $('#editChild');
         var rules = {
             childPhoneNo: {required: true,maxlength:10,minlength:10},
             childBirthDate: {required: true},
             childBloodGroup: {required: true},
             childGender: {required: true},
             childAddress: {required: true},
//             childPhoto: {required: true},
             childName: {required: true},
         };
         handleFormValidate(form, rules, function(form) {
             handleAjaxFormSubmit(form,true);
         });
    }

    return{
        Init: function() {
            list();
        },
        Add:function(){
            addChild();
        },
        Edit:function(){
            editChild();
        }
    };
}();