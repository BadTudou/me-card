<?php

namespace BadTudou\MeCard;

/**
 * MeCard
 */
class MeCard
{
    const MECARD_BEGIN_SIGN      = 'MECARD:';
    const MECARD_END_SIGN        = ';;';
    const MECARD_FIELD_SEPARATOR = ';';
    const MECARD_TAG_SEPARATOR = ':';
    const MECARD_TAGS = [
        'ADR',
        'BDAY',
        'EMAIL',
        'N',
        'NICKNAME',
        'NOTE',
        'SOUND',
        'TEL',
        'TEL-AV',
        'URL'
    ];

    protected $data = [];

    function __construct($content = null)
    {
        if ($content) {
            $this->data = Reader::read($content);
        }
    }

    public function set($tag, $value)
    {
        if ( in_array($tag, self::MECARD_TAGS) ) {
            $this->data[$tag] = $value;
            return true;
        }
        return false;
    }

    public function get($tag = NULL)
    {
        if ($tag && in_array($tag, self::MECARD_TAGS)) {
            return $this->data[$tag];
        }
        return $this->data;
    }

    public function serialize()
    {
        $content = array_reduce(array_keys($this->data), function($result, $item) {
            return $result . $item . self::MECARD_TAG_SEPARATOR . $this->data[$item] . self::MECARD_FIELD_SEPARATOR;
        });
        return self::MECARD_BEGIN_SIGN . $content . self::MECARD_FIELD_SEPARATOR;
    }
}