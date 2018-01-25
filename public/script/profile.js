/**
 * Created by SAYED on 14/06/2017.
 */

// ------------------------ Portfolio --------------

$('.works').find('.work-edit').find('.btn-view-work').on('click', function (e) {
    e.preventDefault();
    var pid = e.target.parentNode.dataset['id'];

    $.ajax({
        url : '/user/view-portfolio',
        type : 'get',
        data : {id : pid},
        success : function (data) {
            $('#view-project').replaceWith(data);
            $('#view-project').modal();
        }
    });
});

// ------------------------ Certification --------------

$('.certifcate-data').find('.certification-edit').find('.btn-cert-view').on('click', function (e) {
    e.preventDefault();
    var cid = e.target.parentNode.dataset['id'];

    $.ajax({
        url : '/user/view-certification',
        type : 'get',
        data : {id : cid},
        success : function (data) {
            $('#view-cert').replaceWith(data);
            $('#view-cert').modal();
        }
    });
});

// ------------------------ Education --------------

$('.btn-education-edit').on('click', function (e) {
    e.preventDefault();
    var eid = e.target.parentNode.dataset['id'];

    $.ajax({
        url : '/user/view-education',
        type : 'get',
        data : {id : eid},
        success : function (data) {
            $('#edit-education').replaceWith(data);
            $('#edit-education').modal();
        }
    });
});

// ------------------------ Skill --------------

$('.skill-d').find('.btn-skill-edit').on('click', function (e) {
    e.preventDefault();
    var sid = e.target.parentNode.dataset['id'];

    $.ajax({
        url : '/user/view-skill',
        type : 'get',
        data : {id : sid},
        success : function (data) {
            $('#edit-skill').replaceWith(data);
            $('#edit-skill').modal();
        }
    });
});

// ------------------------ Company Portfolio --------------

$('.work-com').find('.work-edit').find('.btn-view-work').on('click', function (e) {
    e.preventDefault();
    var pid = e.target.parentNode.dataset['id'];

    $.ajax({
        url : '/company/view-portfolio',
        type : 'get',
        data : {id : pid},
        success : function (data) {
            $('#view-project').replaceWith(data);
            $('#view-project').modal();
        }
    });
});