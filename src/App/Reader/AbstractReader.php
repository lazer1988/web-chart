<?php

namespace App\Reader;

/**
 * Class AbstractReader
 *
 * @package App\Reader
 */
abstract class AbstractReader
{
    const JSON_TYPE = 'json';
    const CSV_TYPE = 'csv';

    /**
     * @var string
     */
    protected $filePath;

    /**
     * @param string $filePath
     */
    public function setFilePath(?string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     * check if file acceptable for reader
     *
     * @return bool
     */
    abstract public function isAccept(): bool;

    /**
     * read file and return data
     *
     * @return mixed
     */
    abstract public function getData();
}
