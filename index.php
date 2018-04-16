<?php
    $developer = 'Bob'; // Please replace with your name
    $color = isset($_GET['color']) ?: '#C00';
    
    abstract class Reader {
        abstract public function __construct($url);
        abstract public function getData(&$data);
    }
    
    class CSVReader extends Reader {
        public $csv_file;
        
        public function __construct($url) {
            $this->csv_file = fopen($url, 'r');
            return $this->csv_file;
        }
        
        public function getData(&$data) {
            $data = array();
            
            while ($line = fgets($this->csv_file)) {
                $data []= explode(',', str_replace("\r\n", '', $line));
            }
        }
    }
    ?>
    <html>
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
    
    <?php
    echo 'Litres of coffee consumed per week by ' . $developer . '<br><br>' . "\r\n";
    
    echo '<div id="chart">' . "\r\n";
    
    $reader = new CSVReader('http://st.deviantart.net/dt/exercise/data.csv');
    $reader->getData($data);
    
    foreach ($data as &$values) {
        echo '<div class="value" timestamp="' . $values[0] . '" value="' . $values[1] . '" title="' . $values[0] . ': ' . $values[1] . '"></div>' . "\r\n";
    }
?>
</div>
</body>
</html>
