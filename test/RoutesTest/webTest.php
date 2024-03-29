<?php

namespace Nuazsa\Javajunction\test;

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

/**
 * Test class for testing the web routes.
 */
class webTest extends TestCase
{
    /**
     * Test the web routes.
     */
    public function testWeb()
    {
        // Include the web routes file
        $web = require_once __DIR__ . '/../../routes/web.php';

        // Assert that the included file is not empty (assuming it returns something)
        assertEquals('12', $web);

        // You can perform additional assertions here based on the actual content of $web
    }
}