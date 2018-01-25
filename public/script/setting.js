/**
 * Created by pepo on 29/06/2017.
 */

// ------------------ User Category Setting -------------

$('#save-category').on('click', function (e) {
   e.preventDefault();

   if ($('#cat-update').val() !== 'Choose Category ..'){
       $.ajax({
           url : '/user/category',
           type : 'get',
           data : {category : $('#cat-update').val(), skill : $('#skill-update').val()},
           success : function (data) {
               $('#cat-skill').replaceWith('<h5 id="cat-skill">'+data+'</h5>');
               toastr.success('Your Data updated successfully. 😆');
           }
       });
   }
});

// ------------------ User Profile Setting -------------

$('#save-setting').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url : '/user/save-setting',
        type : 'get',
        data : {show : $('#show').val(), state : $('#state').val()},
    });
    toastr.success('Your Data updated successfully. 😆');
});

// ------------------ Company Category Setting -------------

$('#com-save-up').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url : '/company/category',
        type : 'get',
        data : {category : $('#cat-update').val()},
        success : function (data) {
            $('#field').replaceWith('<h5 id="field">'+data+'</h5>');
            toastr.success('Your Data updated successfully. 😆');
        }
    });
});


// ------------------ Company Profile Setting -------------

$('#save-com-show').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url : '/company/save-setting',
        type : 'get',
        data : {show : $('#com-show').val()},
    });
    toastr.success('Your Data updated successfully. 😆');
});