<?php

use PHPUnit\Framework\TestCase;
/**
 * Reader
 */
final class MeCardTest extends TestCase
{
	public function testReader()
	{
		$data = 'MECARD:N:大头;TEL:133 7266 3980;;';
		$mecard = BadTudou\MeCard\Reader::read($data);
		$this->assertCount(2, $mecard);
	}

    public function testSerialize()
    {
        $data = 'MECARD:N:大头;TEL:133 7266 3980;;';
        $mecard = new BadTudou\MeCard\MeCard($data);
        $this->assertEquals($data, $mecard->serialize());
    }
}