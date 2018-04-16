<?php

namespace App\Factory;

use App\Exception\ReaderException;
use App\Reader\AbstractReader;
use App\Reader\CSVReader;
use App\Reader\JSONReader;

/**
 * Class ReaderFactory
 *
 * @package App\Factory
 */
class ReaderFactory
{
    /**
     * @param string $type
     *
     * @return AbstractReader
     * @throws ReaderException
     */
    public static function getReader(string $type): AbstractReader
    {
        switch ($type) {
            case 'csv':
                return new CSVReader();
            case 'json':
                return new JSONReader();
        }

        throw new ReaderException('Undefined Reader type');
    }
}
