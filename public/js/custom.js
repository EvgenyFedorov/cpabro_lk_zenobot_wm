$(document).ready(function(){

    $('#job_add_execute').click(function () {

        $.ajax({
            url: '/logs/store',
            type : 'POST',
            data : {
                _token: $('#_token').attr('content'),
                job_code: $('#job_code').val(),
                program_id: $('#program_id').val(),
                user_id: $('#user_id').val(),
                //response_type: "json"
            },
            dataType: 'json',
            success: function (return_add_job) {
                if(return_add_job.error_status === "false") {
                    alert(return_add_job.success_message)
                    setTimeout(function () {
                        location.href = location.origin + "/logs";
                    }, 5000);
                }else{
                    alert(return_add_job.error_message + return_add_job.error_code)
                }
            }

        });

    });

    $('.jobs_enable').click(function () {

        const this_status = $(this).attr('checked');

        $.ajax({
            url: '/logs/enable',
            type : 'POST',
            data : {
                _token: $('#_token').attr('content'),
                job_id: $(this).attr('id'),
                change: this_status,
                response_type: "json"
            },
            dataType: 'json',
            success: function (return_job_enable) {
                if(return_job_enable.error_status === "false") {
                    $('#tr_job_' + return_job_enable.job_id).removeClass("table-danger");
                    $('#tr_job_' + return_job_enable.job_id).removeClass("default");
                    $('#tr_job_' + return_job_enable.job_id).addClass(return_job_enable.job_class);
                }
            }

        });

    });

    $('#job_save_execute').click(function () {

        $.ajax({
            url: '/logs/update/' + $('#job_id').val(),
            type : 'POST',
            data : {
                _token: $('#_token').attr('content'),
                job_code: $('#job_code').val(),
                job_id: $('#job_id').val(),
                program_id: $('#program_id').val()
            },
            dataType: 'json',
            success: function (return_save_log) {

                if(return_save_log.error_status === "false") {
                    location.href = location.origin + "/logs";
                }
            }

        });

    });

    $('.program_job_select').click(function () {

        $('.program_job_select').prop('checked', false);
        $(this).prop('checked', true);

        $('#program_id').val($(this).attr('id'));

        const this_status = $(this).attr('checked');

    });

    $('#update_user_info').click(function () {

        const this_status = $(this).attr('checked');

        $.ajax({
            url: '/users/update/' + $('#user_id').val(),
            type : 'POST',
            data : {
                _token: $('#_token').attr('content'),
                name: $('#name').val(),
                email: $('#email').val(),
                cpabro_login: $('#cpabro_login').val(),
                user_time_zone: $('#user_time_zone').val(),
                password: $('#password').val(),
                password_confirm: $('#password-confirm').val(),
                response_type: "json"
            },
            dataType: 'json',
            success: function (return_user_update) {
                if(return_user_update.error_status === "false") {
                    location.href = location.origin + "/users";
                }else{
                    alert(return_user_update.error_message)
                }
            }

        });

    });

    $('#generic_password').click(function(){

        const length_password = 10;
        const password = generatePwd(length_password);

        $('#password').val(password);
        $('#password-confirm').val(password);

    });

    function getRandomInRange(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function generatePwd(len)
    {
        var chars=['','0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','j','k','l','m','n','o','p','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        var min = 1;
        var max = chars.length;
        var pass='';
        for(var i=0;i<len;i++){
            pass += chars[getRandomInRange(min, max)];
        }
        return pass;
    }

    $('#select_time_zone_id').change(function () {

        $('#time_zone_id').val($(this).val());

    });

});
