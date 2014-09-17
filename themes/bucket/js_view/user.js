var Script = function () {
    $().ready(function() {

        $.validator.addMethod("ValidUsernameRegex", function(value, element) {
            return this.optional(element) || /^[a-z0-9]+$/.test(value);
        }, "Username must contain only letters or numbers");

        $("#loginForm").validate({
            rules: {
                username: "required",
                password: "required"
                
            },
            messages: {
                username: "Please enter your Username",
                password: "Please enter your Password"
            }
        });
        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                fullname: "required",
                contact: {
                    required: false,
                    minlength: 10
                },
                username: {
                    required: true,
                    minlength: 4,
                    remote: "ValidUsername",
                    ValidUsernameRegex: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                    remote: "ValidEmail"
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                fullname: "Please enter your name",
                contact: {
                    required: "Please enter your mobile phone",
                    minlength: "Your mobile phone must consist of at least 10 digit"
                },
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 4 characters",
                    
                    remote: "This username is already taken! Try another"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: {
                    required: "Please enter a valid email address",
                    remote: "This Email is already taken! Try another"
                },
                agree: "Please accept our policy"
            }
        });
    });
}();