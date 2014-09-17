var Script = function () {

    $.validator.setDefaults({
        submitHandler: function(form) { form.submit(); }
    });

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#commentForm").validate();

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
                    remote: "ValidUsername"
                    
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
                    email: true
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
                    remote: "This username is already taken! Try another."
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
                email: "Please enter a valid email address",
                agree: "Please accept our policy"
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();