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

    protected $filePath;

    /**
     * @param string $filePath
     */
    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     * read file and return data
     *
     * @return mixed
     */
    abstract public function getData();
}
