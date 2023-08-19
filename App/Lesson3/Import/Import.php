<?php

namespace App\Lesson3;

class Import
{
    private Reader $reader;
    private Writer $writer;
    private $converters = [];

    public function from(Reader $reader)
    {
        $this->reader = $reader;
        return $this;
    }

    public function to(Writer $writer)
    {
        $this->writer = $writer;
        return $this;
    }

    public function with(Converter $converter)
    {
        $this->converters[] = $converter;
        return $this;
    }

    public function execute()
    {
        $data = $this->reader->read();

        foreach ($this->converters as $converter)
        {
            foreach ($data as $key => $str) {
                $data[$key] = $converter->convert($str);
            }
        }

        $this->writer->write($data);
    }

}