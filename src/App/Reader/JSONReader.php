<?php

namespace App\Reader;

/**
 * Class JSONReader
 *
 * @package App\Reader
 */
class JSONReader extends AbstractReader
{
    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $data = file_get_contents($this->filePath);

        return json_decode($data);
    }
}
