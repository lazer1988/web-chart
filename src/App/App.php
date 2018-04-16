<?php

namespace App;

use App\Factory\ReaderFactory;
use App\Reader\AbstractReader;

/**
 * Class App
 *
 * @package App
 */
class App
{
    /**
     * run app
     */
    public function run()
    {
        $developer = 'Bob';
        $color = $_GET['color'] ?? '#C00';
        $color = strval($color);
        $error = '';
        $file = $_GET['file'] ?? 'http://st.deviantart.net/dt/exercise/data.csv';
        $file = 'http://st.deviantart.com/dt/exercise/data';

        try {
            $reader = ReaderFactory::getReader(AbstractReader::CSV_TYPE);
            //$reader = ReaderFactory::getReader(AbstractReader::JSON_TYPE);
            $reader->setFilePath($file);
            $chartData = $reader->getData();
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $chartData = [];
        }

        include __DIR__.'/View/view.php';
    }
}
