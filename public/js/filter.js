$('#customerId').on('change', function() { 
    var customerId = $(this).children("option:selected").val();
        storageId  = $('#storageId').children("option:selected").val();

    var data = {
        '_token': $('meta[name="csrf-token"]').attr('content')
    };
    
    if(customerId) {
        data['customer_id'] = customerId;
    }
    if(storageId) {
        data['storage_id'] = storageId;
    }
     
    $('#content').load($('meta[name="app-url"]').attr('content')+'/dashboard/content', data);
});


$('#storageId').on('change', function() { 
    var storageId = $(this).children("option:selected").val();
        customerId  = $('#customerId').children("option:selected").val();

    var data = {'_token': $('meta[name="csrf-token"]').attr('content')};
    
    if(customerId) {
        data['customer_id'] = customerId;
    }
    if(storageId) {
        data['storage_id'] = storageId;
    }
     
    $('#content').load($('meta[name="app-url"]').attr('content')+'/dashboard/content', data);
});