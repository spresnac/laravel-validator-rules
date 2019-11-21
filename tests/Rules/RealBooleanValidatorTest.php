<?php

namespace Tests\Rules;

use PHPUnit\Framework\TestCase;
use spresnac\Rules\RealBoolean;

class RealBooleanValidatorTest extends TestCase
{
    /** @var RealBoolean $validator */
    private $validator;

    public function setUp(): void
    {
        parent::setUp();
        $this->validator = new RealBoolean();
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
    public function string_k_shall_not_pass(): void
    {
        $this->assertFalse($this->validator->passes('', 'k'));
    }

    /** @test */
    public function integer_zero_passes(): void
    {
        $this->assertTrue($this->validator->passes('', 0));
    }

    /** @test */
    public function integer_one_passes(): void
    {
        $this->assertTrue($this->validator->passes('', 1));
    }

    /** @test */
    public function string_zero_passes(): void
    {
        $this->assertTrue($this->validator->passes('', '0'));
    }

    /** @test */
    public function string_one_passes(): void
    {
        $this->assertTrue($this->validator->passes('', '1'));
    }

    /** @test */
    public function boolean_true_passes(): void
    {
        $this->assertTrue($this->validator->passes('', true));
    }

    /** @test */
    public function boolean_false_passes(): void
    {
        $this->assertTrue($this->validator->passes('', false));
    }

    /** @test */
    public function string_true_passes(): void
    {
        $this->assertTrue($this->validator->passes('', 'true'));
    }

    /** @test */
    public function string_false_passes(): void
    {
        $this->assertTrue($this->validator->passes('', 'false'));
    }

    /** @test */
    public function string_true_quoted_passes(): void
    {
        $this->assertTrue($this->validator->passes('', '"true"'));
    }

    /** @test */
    public function string_false_quoted_passes(): void
    {
        $this->assertTrue($this->validator->passes('', '"false"'));
    }

    /** @test */
    public function string_j_passes(): void
    {
        $this->assertTrue($this->validator->passes('', 'j'));
    }

    /** @test */
    public function string_n_passes(): void
    {
        $this->assertTrue($this->validator->passes('', 'n'));
    }

    /** @test */
    public function string_j_quoted_passes(): void
    {
        $this->assertTrue($this->validator->passes('', '"j"'));
    }

    /** @test */
    public function string_n_quoted_passes(): void
    {
        $this->assertTrue($this->validator->passes('', '"n"'));
    }
}
