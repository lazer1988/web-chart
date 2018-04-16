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
     * @throws Exception\ReaderException
     */
    public function run()
    {
        $developer = 'Bob';
        $color = $_GET['color'] ?? '#C00';
        //$file = 'http://st.deviantart.net/dt/exercise/data.csv';
        $file = 'http://st.deviantart.com/dt/exercise/data';

        //$reader = ReaderFactory::getReader(AbstractReader::CSV_TYPE);
        $reader = ReaderFactory::getReader(AbstractReader::JSON_TYPE);
        $reader->setFilePath($file);

        include __DIR__.'/View/view.php';
    }
}
