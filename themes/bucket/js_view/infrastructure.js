var Script = function () {
    $().ready(function() {

        $.validator.addMethod("ValidInfrastructureNameRegex", function(value, element) {
            return this.optional(element) || /^[a-z0-9]+$/.test(value);
        }, "Infrastructure Name must contain only letters or numbers");
        // validate signup form on keyup and submit
        $("#formCreateNew").validate({
            rules: {
                infraname: {
                    required: true,
                    minlength: 4,
                    remote: "ValidName",
                    ValidInfrastructureNameRegex: true
                }
            },
            messages: {
                infraname: {
                    required: "Please enter Infrastructure Name",
                    minlength: "Your Infrastructure Name must consist of at least 4 characters",
                    remote: "This Infrastructure Name is already taken! Try another"
                }
            }
        });
    });
}();