<!DOCTYPE html>
<html>
    <head>
        <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link href="bower_components/bootstrap-star-rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />

        <!-- optionally if you need to use a theme, then include the theme CSS file as mentioned below -->
        <link href="bower_components/bootstrap-star-rating/css/theme-krajee-svg.css" media="all" rel="stylesheet" type="text/css" />

        <!-- important mandatory libraries -->
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/bootstrap-star-rating/js/star-rating.js" type="text/javascript"></script>

        <!-- optionally if you need to use a theme, then include the theme JS file as mentioned below -->
<!--        <script src="path/to/themes/krajee-svg/theme.js"></script>-->

        <!-- optionally if you need translation for your language then include locale file as mentioned below -->
<!--        <script src="path/to/js/locales/<lang>.js"></script>-->
    </head>
    <body>
    <input id="input-id" type="text" class="rating" data-size="sm" >



    </body>

<script>
    $("#input-id").rating();

    // with plugin options (do not attach the CSS class "rating" to your input if using this approach)
//    $("#input-id").rating({'size':'lg'});
</script>
</html>