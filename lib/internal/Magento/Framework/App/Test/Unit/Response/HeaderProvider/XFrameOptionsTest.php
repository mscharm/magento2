<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Framework\App\Test\Unit\Response\HeaderProvider;

use \Magento\Framework\App\Response\HeaderProvider\XFrameOptions;
use \Magento\Framework\TestFramework\Unit\Helper\ObjectManager as ObjectManagerHelper;

class XFrameOptionsTest extends \PHPUnit_Framework_TestCase
{
    /** Strict-Transport-Security (HSTS) Header name */
    const HEADER_NAME = 'X-Frame-Options';

    /**
     * Strict-Transport-Security (HSTS) header value
     */
    const HEADER_VALUE = 'TEST_OPTION';

    /**
     * @var XFrameOptions
     */
    protected $object;

    protected function setUp()
    {
        $objectManager = new ObjectManagerHelper($this);
        $this->object = $objectManager->getObject(
            '\Magento\Framework\App\Response\HeaderProvider\XFrameOptions',
            ['xFrameOpt' => $this::HEADER_VALUE]
        );
    }

    public function testGetName()
    {
        $this->assertEquals($this::HEADER_NAME, $this->object->getName(), 'Wrong header name');
    }

    public function testGetValue()
    {
        $this->assertEquals($this::HEADER_VALUE, $this->object->getValue(), 'Wrong header value');
    }

    /**
     * @param bool $expected
     */
    public function testCanApply()
    {
        $this->assertTrue($this->object->canApply(), 'Incorrect canApply result');
    }
}
