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

    <?php

    require 'mysql.php';
    $sql = "SELECT COUNT(*) as users, SUM(rating) as rate,  MAX(`rating`) as maxval from rating";
    $data=mysqli_fetch_assoc($result);
    echo $data['total'];
    $result = $conn->query($sql);
    if ($conn->error == null) {
        $data=mysqli_fetch_assoc($result);
        $total = (float)$data['users'];
        $rating = (float)$data['rate'];
        $minval = (float)$data['minval'];
        $maxval = (float)$data['maxval'];
        $average = (float) $rating/$total;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $total = 0;
        $rating = 0;
        $minval = 0;
        $maxval = 0;
        $average = 0;
    }
//    var_dump($average);
//    var_dump($average*20);
//    var_dump($maxval);
//    var_dump($total);

    ?>

    <div itemscope itemtype="http://schema.org/Service" style="display: none">
        <h2 itemprop="name">Intenet Service</h2>
        <div itemprop="description">Ultra interesting. Super impressive.</div>
        <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
            <div>Book rating:
                <span itemprop="ratingValue"><?php echo ($average*20) ?></span> out of
                <span itemprop="bestRating"><?php echo $maxval ?></span> with
                <span itemprop="ratingCount"><?php echo $total ?></span> ratings
            </div>
        </div>
    </div>
    <input id="input-id" type="text" class="rating" data-size="sm" >

    </body>

<script>
    $("#input-id").rating();
    $('#input-id').on('rating.change', function(event, value, caption) {
        console.log(value);
        $.ajax({
            url: "ratingSave.php",
            method:"POST",
            data:{
                name:'username',
                rating:value
            },
            success: function(result){
            console.log(result)
        }});
    });



    // with plugin options (do not attach the CSS class "rating" to your input if using this approach)
//    $("#input-id").rating({'size':'lg'});
</script>
</html>