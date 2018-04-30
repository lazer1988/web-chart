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
     * @var ReaderFactory
     */
    private static $instance;

    /**
     * @var AbstractReader[]
     */
    private static $readers;

    /**
     * @param string $filePath
     *
     * @return AbstractReader
     * @throws ReaderException
     */
    public static function getReader(string $filePath): AbstractReader
    {
        self::getInstance();

        foreach (self::$readers as $reader) {
            $reader->setFilePath($filePath);
            if ($reader->isAccept()) {
                return clone $reader;
            }

            $reader->setFilePath(null);
        }

        throw new ReaderException('Undefined Reader type');
    }

    /**
     * ReaderFactory constructor.
     */
    private function __construct()
    {
        self::$readers = [
            new JSONReader(),
            new CSVReader(),
        ];
    }

    /**
     * sleep
     */
    private function __sleep()
    {
        // TODO: Implement __sleep() method.
    }

    /**
     * clone
     */
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return ReaderFactory
     */
    private static function getInstance(): ReaderFactory
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}
