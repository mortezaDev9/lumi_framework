<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_it_is_true(): void
    {
        $isTrue = 1 === 1;
        
        $this->assertTrue($isTrue);
    }
}
