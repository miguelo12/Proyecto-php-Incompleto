<!DOCTYPE html>
<!-- saved from url=(0043)http://www.inserthtml.com/demo/file-upload/ -->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        
        <title>File Upload!</title>
    </head>
    <body>

        <form action="" method="POST">
        <p>
          E-mail:
          <input data-validation="email" data-validation-error-msg="You did not enter a valid e-mail">
        </p>
        <p>
          Password:
          <input type="password" data-validation="required" 
                     data-validation-error-msg="You did not enter a password">
        </p>
        <p>
          <input type="submit" value="Login">
        </p>
        </form>

        <!-- jQuery -->
        <script src="../component/jquery/dist/jquery.min.js"></script>
        <script src="../js/jquery.form-validator.min.js"></script>
        <script>
          $.validate({
            validateOnBlur : false, // disable validation when input looses focus
            errorMessagePosition : 'top' // Instead of 'element' which is default
            scrollToTopOnError : false // Set this property to true if you have a long form
          });
        </script>

    </body>
</html>
