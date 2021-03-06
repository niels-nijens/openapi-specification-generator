<?php

namespace ConnectHolland\OpenAPISpecificationGenerator\Test\Info;

use ConnectHolland\OpenAPISpecificationGenerator\Info\License;
use PHPUnit_Framework_TestCase;

/**
 * LicenseTest.
 *
 * @author Niels Nijens <niels@connectholland.nl>
 */
class LicenseTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests if constructing a new License instance sets the instance properties.
     */
    public function testConstruct()
    {
        $license = new License('MIT', 'http://example.com/license/');

        $this->assertAttributeSame('MIT', 'name', $license);
        $this->assertAttributeSame('http://example.com/license/', 'url', $license);
    }

    /**
     * Tests if License::jsonSerialize returns the expected result.
     */
    public function testJsonSerialize()
    {
        $license = new License('MIT', 'http://example.com/license/');

        $expectedResult = array(
            'name' => 'MIT',
            'url' => 'http://example.com/license/',
        );

        $this->assertSame($expectedResult, $license->jsonSerialize());
    }

    /**
     * Tests if License::jsonSerialize returns the expected JSON encoded result through the json_encode function.
     */
    public function testJsonSerializeThroughJsonEncode()
    {
        $license = new License('MIT', 'http://example.com/license/');

        $expectedResult = '{"name":"MIT","url":"http:\/\/example.com\/license\/"}';

        $this->assertJsonStringEqualsJsonString($expectedResult, json_encode($license));
    }

    /**
     * Tests if License::create returns a new License instance and sets the instance properties.
     */
    public function testCreate()
    {
        $license = License::create('MIT', 'http://example.com/license/');

        $this->assertInstanceOf('ConnectHolland\OpenAPISpecificationGenerator\Info\License', $license);
        $this->assertAttributeSame('MIT', 'name', $license);
        $this->assertAttributeSame('http://example.com/license/', 'url', $license);
    }
}
