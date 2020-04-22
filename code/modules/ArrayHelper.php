<?php

namespace modules;

class ArrayHelper
{
    public static function uniqueElements(array $elements) : array
    {
        $temp = [];
        $result = [];
        foreach ($elements as $element)
        {
            if (!isset($temp[$element]))
            {
                $result[] = $element;
                $temp[$element] = true;
            }
        }
        return $result;
    }
}