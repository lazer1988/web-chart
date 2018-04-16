<?php

namespace App\Reader;

use App\Exception\ReaderException;

/**
 * Class JSONReader
 *
 * @package App\Reader
 */
class JSONReader extends AbstractReader
{
    /**
     * @var string
     */
    private $fileContent;

    /**
     * {@inheritdoc}
     */
    public function isAccept(): bool
    {
        $this->ensureFileContent();

        json_decode($this->fileContent);

        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $this->ensureFileContent();

        $json = json_decode($this->fileContent, true);

        return $json;
    }

    /**
     * @throws ReaderException
     */
    private function ensureFileContent()
    {
        if ($this->fileContent) {
            return;
        }

        $this->fileContent = @file_get_contents($this->filePath);

        if (empty($this->fileContent)) {
            throw new ReaderException("can't read file");
        }
    }
}
