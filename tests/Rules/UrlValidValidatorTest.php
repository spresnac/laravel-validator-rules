<?php

namespace Tests\Rules;

use Illuminate\Support\Facades\Facade;
use PHPUnit\Framework\TestCase;
use spresnac\Rules\UrlValid;

class UrlValidValidatorTest extends TestCase
{
    /** @var UrlValid $validator */
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        Facade::setFacadeApplication($this);
        $this->validator = new UrlValid();
    }

    /** @test */
    public function some_weired_input_shall_not_pass(): void
    {
        $this->assertFalse($this->validator->passes('', 'foobar'));
    }

    /** @test */
    public function some_wild_integers_shall_not_pass(): void
    {
        $this->assertFalse($this->validator->passes('', 5));
    }

   /** @test */
    public function non_existing_url_fails(): void
    {
        $result = $this->validator->passes('', 'https://example.com/non_existent_url');
        $this->assertFalse($result);
    }
}
