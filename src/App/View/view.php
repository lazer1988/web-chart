<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="chart.js"></script>
    <style type="text/css">
        * {
            box-sizing: border-box;
        }

        html, body{
            height: 100%;
        }

        #chart {
            position: absolute;
            border-bottom: 1px #000 solid;
            border-left: 1px #000 solid;
            left: 10px;
            right: 10px;
            bottom: 10px;
            top: 50px;
        }

        #chart .value {
            background-color: #f00;
            bottom: 0;
            position: absolute;
            background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $color ?>), to(#000));
            background: -moz-linear-gradient(top,  <?php echo $color ?>,  #000);
            padding: 2px;
            color: #fff;
            cursor: pointer;
            text-align: center;
        }

        .error{
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ebccd1;
            border-radius: 4px;
            color: #a94442;
            background: #f2dede;
        }
    </style>
</head>
<body onload="init()">
    <?php
        if (!empty($error)) {
            echo '<div class="error">'.$error.'</div>';
        }
    ?>

    <header>Litres of coffee consumed per week by <?php echo $developer ?></header>

    <div id="chart">
        <?php
            foreach ($chartData as $values) {
                echo '<div class="value" timestamp="'.$values[0].'" value="'.$values[1].'"></div>';
            }
        ?>
    </div>
</body>
</html>
