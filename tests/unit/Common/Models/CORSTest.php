<?php

/**
 * LICENSE: The MIT License (the "License")
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * https://github.com/azure/azure-storage-php/LICENSE
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP version 5
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Tests\Unit\Common\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @link      https://github.com/azure/azure-storage-php
 */

namespace MicrosoftAzure\Storage\Tests\unit\Common\Models;

use MicrosoftAzure\Storage\Common\Models\CORS;
use MicrosoftAzure\Storage\Tests\Framework\TestResources;
use MicrosoftAzure\Storage\Common\Internal\Utilities;
use MicrosoftAzure\Storage\Common\Internal\Resources;

/**
 * Unit tests for class CORS
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Tests\Unit\Common\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @link      https://github.com/azure/azure-storage-php
 */
class CORSTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::create
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::__construct
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getAllowedOrigins
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setAllowedOrigins
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setAllowedMethods
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getAllowedMethods
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setAllowedHeaders
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getAllowedHeaders
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setExposedHeaders
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getExposedHeaders
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setMaxedAgeInSeconds
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getMaxedAgeInSeconds
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::toArray
     */
    public function testCreateAndToArray()
    {
        $parsedResponse = TestResources::getCORSSingle();

        $cors = CORS::create($parsedResponse);

        $this->assertEquals($parsedResponse, $cors->toArray());
    }

    /**
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::create
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::__construct
     * @expectedException \UnexpectedValueException
     * @expectedExceptionMessage does not exist in the given array
     */
    public function testCreateNegative()
    {
        $parsedResponse = array();

        $cors = CORS::create($parsedResponse);
    }

    /**
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::__construct
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getAllowedOrigins
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setAllowedOrigins
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setAllowedMethods
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getAllowedMethods
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setAllowedHeaders
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getAllowedHeaders
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setExposedHeaders
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getExposedHeaders
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::setMaxedAgeInSeconds
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::getMaxedAgeInSeconds
     * @covers MicrosoftAzure\Storage\Common\Models\CORS::toArray
     */
    public function testToArray()
    {
        $parsedResponse = TestResources::getCORSSingle();

        $cors = new CORS(
            ['http://www.microsoft.com', 'http://www.bing.com'],
            ['GET', 'PUT'],
            ['x-ms-meta-customheader0', 'x-ms-meta-target0*'],
            ['x-ms-meta-customheader0', 'x-ms-meta-data0*'],
            500
        );

        $this->assertEquals($parsedResponse, $cors->toArray());
    }
}
