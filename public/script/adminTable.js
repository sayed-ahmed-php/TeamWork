/**
 * Created by SAYED on 01/07/2017.
 */

// ------------------------- User ------------------

$('.data-table').on('change', function (e) {
    e.preventDefault();
    var id = e.target.dataset['id'];
    var value = $('.'+id).val();

    if (value === 'Portfolio'){
        setTable('view-user-port', id);

    } else if (value === 'Certification'){
        setTable('view-user-cert', id);

    } else if (value === 'Education'){
        setTable('view-user-edu', id);

    } else if (value === 'Skill'){
        setTable('view-user-skill', id);

    } else if (value === 'Test'){
        setTable('view-user-test', id);
    }
});

function setTable(url, dat) {
    $.ajax({
        url : '/dashboard/'+url,
        type : 'get',
        data : {id : dat},
        success : function (data) {
            $('.content-user').replaceWith(data);
        }
    });
}

// ------------------------ Company ---------------

$('.com-port').on('click', function (e) {
    e.preventDefault();
    var id = e.target.dataset['id'];

    $.ajax({
        url : '/dashboard/view-com-port',
        type : 'get',
        data : {id : id},
        success : function (data) {
            $('.content-com').replaceWith(data);
        }
    });
});

// ------------------------ Post ---------------

$('#get-comment').on('click', function (e) {
    e.preventDefault();
    var id = e.target.dataset['id'];

    $.ajax({
        url : '/dashboard/view-post-comment',
        type : 'get',
        data : {id : id}    ,
        success : function (data) {
            $('.content-comment').replaceWith(data);
        }
    });
});