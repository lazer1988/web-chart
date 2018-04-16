<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="chart.js"></script>
    <style>
        #chart {
            position: relative;
            border-bottom: 1px #000 solid;
            border-left: 1px #000 solid;
            height: 200px;
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
        }
    </style>
</head>
<body onload="init();">
    <p>Litres of coffee consumed per week by <?php echo $developer ?></p>

    <div id="chart">
        <?php
            foreach ($reader->getData() as $values) {
                echo '<div class="value" timestamp="' . $values[0] . '" value="' . $values[1] . '"></div>';
            }
        ?>
    </div>
</body>
</html>
