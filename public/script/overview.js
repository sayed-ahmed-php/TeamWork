
// ------------------- User Overview ---------------

$('#overview-user').click(function () {
    var text = '<div><textarea rows="8" cols="40">'+$(this).html()+'</textarea>' +
        '<div><input type="button" value="Save" class="saveButton" />' +
        '<input type="button" value="Cancel" class="cancelButton" /></div>';

    var revert = $(this).html();
    $(this).after(text).remove();

    $('.saveButton').click(function(){
        var t = $(this).parent().siblings(0).val();
        $(this).parent().parent().after('<p id="overview-user">'+t+'</p>').remove() ;

        $.ajax({
            url : '/user/save-overview',
            type : 'get',
            data : {text : t},
        });
        toastr.success('Your Overview updated successfully. 😆');
    });

    $('.cancelButton').click(function(){
        var t = revert;
        $(this).parent().parent().after('<p id="overview-user">'+t+'</p>').remove() ;
    });
});

// ------------------- Company Overview ---------------

$('#overview-com').click(function () {
    var text = '<div><textarea rows="8" cols="40">'+$(this).html()+'</textarea>' +
        '<div><input type="button" value="Save" class="saveButton" />' +
        '<input type="button" value="Cancel" class="cancelButton" /></div>';

    var revert = $(this).html();
    $(this).after(text).remove();

    $('.saveButton').click(function(){
        var t = $(this).parent().siblings(0).val();
        $(this).parent().parent().after('<div id="overview-com">'+t+'</div>').remove() ;

        $.ajax({
            url : '/company/save-overview',
            type : 'get',
            data : {text : t},
        });
        toastr.success('Your Overview updated successfully. 😆');
    });

    $('.cancelButton').click(function(){
        var t = revert;
        $(this).parent().parent().after('<div id="overview-com">'+t+'</div>').remove() ;
    });
});