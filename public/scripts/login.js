// // registration
const erConts = document.querySelectorAll('#erconts');
$('.form_reg > form').submit(function (e) {
    e.preventDefault();
    let th = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: th,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (suc) {
            window.location.href = suc.redirect_url;
        },
        error: function (err) {
            if ('email' in err.responseJSON.errors) {
                $("#erconts_email").show()
                $('#erconts_email').html(err.responseJSON.errors['email'][0]);
            } else {
                $("#erconts_email").hide()
                $('#erconts_email').empty();
            }
            if ('tel' in err.responseJSON.errors) {
                $("#erconts_tel").show()
                $('#erconts_tel').html(err.responseJSON.errors['tel'][0]);
            } else {
                $("#erconts_tel").hide()
                $('#erconts_tel').empty();
            }
            if ('password' in err.responseJSON.errors) {
                $("#erconts_password").show()
                $('#erconts_password').html(err.responseJSON.errors['password'][0]);
            } else {
                $("#erconts_password").hide()
                $('#erconts_password').empty();
            }
            if ('password_confirmation' in err.responseJSON.errors) {
                $("#erconts_password_confirmation").show()
                $('#erconts_password_confirmation').html(err.responseJSON.errors['password_confirmation'][0]);
            } else {
                $("#erconts_password_confirmation").hide()
                $('#erconts_password_confirmation').empty();
            }
            if ('name' in err.responseJSON.errors) {
                $("#erconts_name").show()
                $('#erconts_name').html(err.responseJSON.errors['name'][0]);
            } else {
                $("#erconts_name").hide()
                $('#erconts_name').empty();
            }
        }
    })
});
// // end registration

// // Authorization

$(".form_autorization").submit(function (e) {
    e.preventDefault();
    let th = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: th,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (suc) {
            window.location.href = suc.redirect_url;
        },
        error: function (err) {
            if ('email' in err.responseJSON.errors) {
                $("#erconts_email").show()
                $('#erconts_email').html(err.responseJSON.errors['email'][0]);
            } else {
                $("#erconts_email").hide()
                $('#erconts_email').empty();
            }
        }
    })
});
// // end Authorization

// //переключение форм авторизации/регистрации
if (document.querySelector('.form_autorization')) {
    function show_hide() {
        const buttonLogOne = document.querySelector('#login_button_one');
        const buttonRegOne = document.querySelector('#reg_button_one');

        const buttonLogTwo = document.querySelector('#login_button_two');
        const buttonRegTwo = document.querySelector('#reg_button_two');

        const buttonFiz = document.querySelector('.login_button_fiz > button');
        const buttonYour = document.querySelector('.registration_button_yor > button');

        const login_form = document.querySelector('.login_form');
        const registration_form = document.querySelector('.registration_form');

        const form_reg_fiz = document.querySelector('.form_reg_fiz');
        const form_reg_org = document.querySelector('.form_reg_org');

        buttonLogOne.addEventListener('click', function () {
            login_form.style.display = "block";
            registration_form.style.display = "none";
        });
        buttonRegOne.addEventListener('click', function () {
            login_form.style.display = "none";
            // form_reg_org.style.display = "none";
            buttonLogTwo.style.fontWeight = "350";
            buttonLogTwo.style.boxShadow = "none";
            buttonRegTwo.style.fontWeight = "400";
            buttonRegTwo.style.boxShadow = "0px 2px 0px #4174cb";
            registration_form.style.display = "flex";
            // form_reg_org.style.display = "none";
            form_reg_fiz.style.display = "flex";
            buttonFiz.style.fontWeight = "400";
            buttonFiz.style.boxShadow = "0px 2px 0px #4174cb";
            // buttonYour.style.fontWeight = "350";
            // buttonYour.style.boxShadow = "none";
        });

        buttonLogTwo.addEventListener('click', function () {
            login_form.style.display = "block";
            registration_form.style.display = "none";
        });
        buttonRegTwo.addEventListener('click', function () {
            login_form.style.display = "none";
            registration_form.style.display = "flex";
        });

        buttonFiz.addEventListener('click', function () {
            form_reg_org.style.display = "none";
            form_reg_fiz.style.display = "flex";
            buttonYour.style.fontWeight = "350";
            buttonYour.style.boxShadow = "none";
            buttonFiz.style.fontWeight = "400";
            buttonFiz.style.boxShadow = "0px 2px 0px #4174cb";
        });
        // buttonYour.addEventListener('click', function(){
        //     form_reg_fiz.style.display = "none";
        //     buttonFiz.style.fontWeight = "350";
        //     buttonFiz.style.boxShadow = "none";
        //     buttonYour.style.fontWeight = "400";
        //     buttonYour.style.boxShadow = "0px 2px 0px #4174cb";
        //     form_reg_org.style.display = "flex";
        // });
    }
    show_hide()
}