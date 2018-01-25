/**
 * Created by SAYED on 16/06/2017.
 */

var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function (event) {
    event.preventDefault();

    postBodyElement = event.target.parentNode.parentNode.childNodes[8];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

// ------------------------------ Add Post ----------------------

$('#add-post').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        url : '/user/room/add-post',
        type : 'post',
        data : {'_token': $('input[name="_token"]').val(),text : $('#new-post').val()},
        success : function (data) {
            $('.rep').replaceWith(data);
            $('#new-post').val('');
        }
    });
});

// -------------------------------- Edit Post ---------------------

$('#modal-save').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/user/room/edit-post',
        data: {text: $('#post-body').val(), post_id: postId, _token: token},
        success : function (data) {
            $(postBodyElement).text(data);
            $('#edit-modal').modal('hide');
        }
    });
});

// ------------------------------ Delete Post ----------------------

$('.delete').on('click', function (event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];

    $.ajax({
        type : 'get',
        url : '/user/room/delete-post',
        data : {id : postId},
        success : function () {
            $('.'+postId+'post'+'').remove();
        }
    });
});

// ------------------------------ Comment ----------------------

var commentId = 0;
var commentBodyElement = null;

$('.comment').find('.interaction').find('.edit-com').on('click', function (event) {
    event.preventDefault();

    commentId = event.target.parentNode.parentNode.dataset['commentid'];
    commentBodyElement = event.target.parentNode.parentNode.childNodes[8];
    var commentBody = commentBodyElement.textContent;
    $('#post-body').val(commentBody);
    $('#edit-modal').modal();
});

// ------------------------- Add Comment -------------------

$('.add-comment').on('click', function (e) {
    e.preventDefault();
    postId = e.target.parentNode.dataset['postid'];

    $.ajax({
        url : '/user/room/add-comment',
        type : 'post',
        data : { _token: token, text : $('.'+postId+'sa'+'').val(), post_id : postId},
        success : function (data) {
            if (e.target.parentNode.dataset['postid'] === postId){
                $('.'+postId+'').append(data);
                $('.'+postId+'sa'+'').val('');
            }
        }
    });
});

// -------------------------------- Edit Comment ---------------------

$('#modal-save').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        type: 'post',
        url: '/user/room/edit-comment',
        data: {text: $('#post-body').val(), id: commentId, _token: token},
        success : function (data) {
            $(commentBodyElement).text(data);
            $('#edit-modal  ').modal('hide');
        }
    });
});

// ------------------------------ Delete Comment ----------------------

$('.delete-com').on('click', function (event) {
    event.preventDefault();
    commentId = event.target.parentNode.parentNode.dataset['commentid'];

    $.ajax({
        type : 'get',
        url : '/user/room/delete-comment',
        data : {id : commentId},
        success : function () {
            $('.'+commentId+'').remove();
        }
    });
});