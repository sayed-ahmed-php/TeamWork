
// ------------------- User Phone ---------------

$('#phone-user').click(function () {
    var text = '<div><div><input type="number" value='+$(this).html()+'><input type="button" value="Save" class="saveButton" />' +
        '<input type="button" value="Cancel" class="cancelButton" /></div>';

    var revert = $(this).html();
    $(this).after(text).remove();

    $('.saveButton').click(function(){
        var t = $(this).siblings(0).val();
        $(this).parent().after('<div id="phone-user">'+t+'</div>').remove();

        $.ajax({
            url : '/user/save-phone',
            type : 'get',
            data : {phone : t},
        });
        toastr.success('Your Phone updated successfully. 😆');
    });

    $('.cancelButton').click(function(){
        var t = revert;
        $(this).parent().parent().after('<div id="phone-user">'+t+'</div>').remove();
    });
});

// ------------------- Company Phone ---------------

$('#phone-com').click(function () {
    var text = '<div><div><input type="number" value='+$(this).html()+'><input type="button" value="Save" class="saveButton" />' +
        '<input type="button" value="Cancel" class="cancelButton" /></div>';

    var revert = $(this).html();
    $(this).after(text).remove();

    $('.saveButton').click(function(){
        var t = $(this).siblings(0).val();
        $(this).parent().after('<div id="phone-com">'+t+'</div>').remove();

        $.ajax({
            url : '/company/save-phone',
            type : 'get',
            data : {phone : t},
        });
        toastr.success('Your Phone updated successfully. 😆');
    });

    $('.cancelButton').click(function(){
        var t = revert;
        $(this).parent().parent().after('<div id="phone-com">'+t+'</div>').remove();
    });
});