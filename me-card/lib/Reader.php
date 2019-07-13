<?php

namespace BadTudou\MeCard;

/**
 * Reader
 */
class Reader
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

	//MECARD:N:大头;TEL:133 7266 3980;;
	public static function read($data)
    {
    	$mecard = [];
        $fieldsContent = mb_substr($data, strlen(self::MECARD_BEGIN_SIGN), -2);
        $fields = explode(self::MECARD_FIELD_SEPARATOR, $fieldsContent);

        foreach ($fields as $field) {
        	$tagAndValue = explode(self::MECARD_TAG_SEPARATOR, $field);
        	if( count($tagAndValue) == 2 && in_array($tagAndValue[0], self::MECARD_TAGS) ) {
        		$mecard[ ($tagAndValue[0]) ] = $tagAndValue[1];

        	}
        }

        return $mecard;
    }
}