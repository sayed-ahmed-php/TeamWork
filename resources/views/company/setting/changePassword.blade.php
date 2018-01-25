<div class="col-md-8 col-xs-12">
    <h1>Change Password</h1>
    <div class="change-pass">
        <h5>Your password must contain the following:</h5><br>
        <form method="post" action="/company/change-password">
            <h4>Old password</h4>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <input class="form-control" type="password" name="old" id="pass" required>
                    <span id='message'></span>
                </div>
            </div>
            <script type="text/javascript">
                $('#pass').on('focusout', function (e) {

                    $.ajax({
                        type : 'get',
                        url : '/company/check-pass',
                        data : {pass : $('#pass').val()},
                        success : function (data) {
                            if (data === 'true'){
                                $('#message').html('Matching').css('color', 'green');
                            }else {$('#message').html('Not Matching').css('color', 'red');}
                        }
                    });
                });
            </script>
            <h4>New password</h4>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <input class="form-control" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                           required id="password"
                           title="Must contain at least one number and one uppercase and lowercase letter and 8 characters at least.">
                </div>
            </div>
            <h4>Confirm password</h4>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <input class="form-control" type="password"  name="password_confirmation" id="confirm" required>
                    <span id='message'></span>
                </div>
            </div>
            <script type="text/javascript">
                $('#confirm').on('keyup', function () {
                    if ($('#password').val() === $('#confirm').val()) {
                        $('#message').html('Matching').css('color', 'green');
                    } else
                        $('#message').html('Not Matching').css('color', 'red');
                });
            </script>
            <div class="row">
                <div class="col-md-4 col-xs-7">
                    <input class="form-control" type="submit">
                </div>
            </div>
            {{csrf_field()}}
        </form>
    </div>
</div>
