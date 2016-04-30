<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Payponse Admin Panel</title>

        <link rel="apple-touch-icon" sizes="57x57" href="public/assets/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="public/assets/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="public/assets/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="public/assets/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="public/assets/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="public/assets/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="public/assets/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="public/assets/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="public/assets/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="public/assets/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="public/assets/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="public/assets/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="public/assets/images/favicon/manifest.json">
        <meta name="msapplication-TileImage" content="public/assets/images/favicon/ms-icon-144x144.png">

        <script src="public/assets/js/ext/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script src="public/assets/js/ext/pace.min.js" type="text/javascript"></script>
        <script src="public/assets/js/ext/semantic.min.js"></script>

        <link rel="stylesheet" type="text/css" href="public/assets/css/ext/semantic.min.css">
        <link rel="stylesheet" media="screen" href="public/assets/css/style.css">
        <link rel="stylesheet" href="public/assets/css/ext/normalize.css">
        <link rel="stylesheet" href="public/assets/css/ext/pace-theme-flash.css">
        <link rel="stylesheet" href="public/assets/css/ext/reset.css">
    </head>
    <body>
        <div class="overlay"></div>        
        <div class="ui text container">
            <form class="ui form">
              <div class="field">
                <label>First Name</label>
                <input type="text" name="first-name" placeholder="First Name">
              </div>
              <div class="field">
                <label>Last Name</label>
                <input type="text" name="last-name" placeholder="Last Name">
              </div>
              <div class="field">
                <div class="ui checkbox">
                  <input type="checkbox" tabindex="0" class="hidden">
                  <label>I agree to the Terms and Conditions</label>
                </div>
              </div>
              <button class="ui button" type="submit">Submit</button>
            </form>
        </div>
        <script src="public/assets/js/script.js" type="text/javascript"></script>
    </body>
</html>
