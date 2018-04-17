<?php

namespace App\FileKeeper;

use App\Exception\ReaderException;

/**
 * Class FileKeeper
 *
 * @package App\FileKeeper
 */
class FileKeeper
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @var string
     */
    private $cachePath;

    /**
     * FileKeeper constructor.
     *
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * save file to cache and return path
     *
     * @return string
     * @throws ReaderException
     */
    public function save(): string
    {
        if (file_exists($this->cachePath)) {
            return $this->cachePath;
        }

        $file = @file_get_contents($this->filePath);
        if (empty($file)) {
            throw new ReaderException("can't read file");
        }

        $this->cachePath = APP_CACHE.'/'.uniqid().'-'.basename($this->filePath);
        file_put_contents($this->cachePath, $file);

        return $this->cachePath;
    }

    /**
     * remove file
     */
    public function removeFile()
    {
        if (file_exists($this->cachePath)) {
            @unlink($this->cachePath);
        }
    }
}
