<?php
/**
 * Copyright 2015 Klarna AB
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * File containing the Klarna_Checkout_Order unittest
 *
 * PHP version 5.3
 *
 * @category  Payment
 * @package   Klarna_Checkout
 * @author    Klarna <support@klarna.com>
 * @copyright 2015 Klarna AB
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache license v2.0
 * @link      http://developers.klarna.com/
 */

/**
 * UnitTest for the RecurringOrder class, basic functionality
 *
 * @category  Payment
 * @package   Klarna_Checkout
 * @author    Majid G. <majid.garmaroudi@klarna.com>
 * @author    David K. <david.keijser@klarna.com>
 * @author    Matthias Feist <matthias.feist@klarna.com>
 * @copyright 2015 Klarna AB
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache license v2.0
 * @link      http://developers.klarna.com/
 */
class Klarna_Checkout_RecurringOrderTest extends PHPUnit_Framework_TestCase
{
    /**
     * Order Instance
     *
     * @var Klarna_Checkout_RecurringOrder
     */
    protected $recurringOrder;

    /**
     * Recurring Token
     *
     * @var string
     */
    protected $recurringToken = "123ABC";

    /**
     * Setup function
     *
     * @return void
     */
    public function setUp()
    {
        $mock = $this->getMockBuilder('Klarna_Checkout_ConnectorInterface')
            ->getMock();
        $mock->method('getDomain')
            ->willReturn('https://checkout.klarna.com');

        $this->recurringOrder = new Klarna_Checkout_RecurringOrder(
            $mock,
            $this->recurringToken
        );
    }

    /**
     * Test that location is initialized as null
     *
     * @return void
     */
    public function testGetLocation()
    {
        $host = "https://checkout.klarna.com";
        $path = "/checkout/recurring/{$this->recurringToken}/orders";

        $this->assertEquals(
            $host . $path,
            $this->recurringOrder->getLocation()
        );
    }
}
