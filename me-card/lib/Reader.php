<?php

namespace BadTudou\MeCard;

/**
 * Reader
 */
class Reader
{
	//MECARD:N:大头;TEL:133 7266 3980;;
	public static function read($data)
    {
    	$mecard = [];
        $fieldsContent = mb_substr($data, strlen(MeCard::MECARD_BEGIN_SIGN), -2);
        $fields = explode(MeCard::MECARD_FIELD_SEPARATOR, $fieldsContent);

        foreach ($fields as $field) {
        	$tagAndValue = explode(MeCard::MECARD_TAG_SEPARATOR, $field);
        	if( count($tagAndValue) == 2 && in_array($tagAndValue[0], MeCard::MECARD_TAGS) ) {
        		$mecard[ ($tagAndValue[0]) ] = $tagAndValue[1];

        	}
        }

        return $mecard;
    }
}