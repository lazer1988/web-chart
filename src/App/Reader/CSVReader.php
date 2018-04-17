<?php

namespace App\Reader;

use App\Exception\ReaderException;
use App\FileKeeper\FileKeeper;

/**
 * Class CSVReader
 *
 * @package App\Reader
 */
class CSVReader extends AbstractReader
{
    /**
     * {@inheritdoc}
     */
    public function isAccept(): bool
    {
        // check somehow if it's csv
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        if (empty($this->filePath)) {
            throw new ReaderException('Undefined file path');
        }

        $file = fopen($this->filePath, 'r');
        if (!$file) {
            throw new ReaderException('can\'t read file');
        }

        $data = [];

        while (($line = fgetcsv($file)) !== false) {
            $data[] = $line;
        }

        return $data;
    }
}
