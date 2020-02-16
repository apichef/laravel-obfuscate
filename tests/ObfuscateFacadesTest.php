<?php

namespace ApiChef\Obfuscate;

use ApiChef\Obfuscate\Support\Facades\Obfuscate as ObfuscateFacades;

class ObfuscateFacadesTest extends TestCase
{
    public function test_can_encode()
    {
        $result = ObfuscateFacades::encode(1);

        $this->assertNotEquals(1, $result);
    }

    public function test_can_encode_an_arry_of_ids()
    {
        $result = ObfuscateFacades::encode([1, 2]);

        $this->assertIsArray($result);
        $this->assertFalse(in_array(1, $result));
        $this->assertFalse(in_array(2, $result));
    }

    public function test_can_decode()
    {
        $result = ObfuscateFacades::decode('458047115');

        $this->assertEquals(1, $result);
    }

    public function test_can_decode_an_arry_of_ids()
    {
        $result = ObfuscateFacades::decode(['458047115', '2033899500']);

        $this->assertEquals([1, 2], $result);
    }
}
