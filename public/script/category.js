/**
 * Created by pepo on 27/06/2017.
 */

// ------------------------- Search Skill ----------------

$('#cat').on('change', function (e) {
    e.preventDefault();

    if ($('#cat').val() !== 'Choose Category ..'){
        $.ajax({
            url : '/skills',
            type : 'get',
            data : {class : '', id : 'skill', cat : $('#cat').val()},
            success : function (data) {
                $('#skill').replaceWith(data);
            }
        });
    }
});

// --------------------- User Setting Category ----------------

$('#cat-update').on('change', function (e) {
    e.preventDefault();

    if ($('#cat-update').val() !== 'Choose Category ..'){
        $.ajax({
            url : '/skills',
            type : 'get',
            data : {class : 'form-control', id : 'skill-update', cat : $('#cat-update').val()},
            success : function (data) {
                $('#skill-update').replaceWith(data);
            }
        });
    }
});

// --------------------- User SignUp ----------------

$('#cat-sign').on('change', function (e) {
    e.preventDefault();

    if ($('#cat-sign').val() !== 'Choose Category ..'){
        $.ajax({
            url : '/skills',
            type : 'get',
            data : {class : 'field form-control', id : 'skill-sign', cat : $('#cat-sign').val()},
            success : function (data) {
                $('#skill-sign').replaceWith(data);
            }
        });
    }
});