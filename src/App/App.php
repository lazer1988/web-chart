<?php

namespace App;

use App\Factory\ReaderFactory;
use App\FileKeeper\FileKeeper;

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
        $developer = 'Alex';
        $color = strval($_GET['color'] ?? '#C00');
        $error = '';
        $file = strval($_GET['file'] ?? 'http://st.deviantart.net/dt/exercise/data.csv');

        $fileKeeper = new FileKeeper($file);

        try {
            $filePath = $fileKeeper->save();

            $reader = ReaderFactory::getReader($filePath);
            $chartData = $reader->getData();
        } catch (\Exception $e) {
            $error = $e->getMessage();
            $chartData = [];
        }

        $fileKeeper->removeFile();

        include __DIR__.'/View/view.php';
    }
}
