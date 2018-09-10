<html>

<head>
    <title> Password and Confirm Password Validation Using Jquery </title>
    <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
    <script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>
    <script>
    function validatePassword() {
        var validator = $("#loginForm").validate({
            rules: {
                password: "required",
                confirmpassword: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",

                confirmpassword: " This Password do not confirm "
            }
        });
        if (validator.form()) {
            alert('Sucess');
        }
    }
    </script>
</head>
<body>
    <form method="post" id="loginForm" name="loginForm">
        <table cellpadding="0" border="1">
            <tr>
                <td>Password</td>
                <td><input tabindex="1" size="40" type="password" name="password" id="password" /></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input tabindex="1" size="40" type="password" name="confirmpassword" id="confirmpassword" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input tabindex="3" type="button" value="Submit" onClick="validatePassword();" /></td>
            </tr>
        </table>
    </form>
</body>
</html>
