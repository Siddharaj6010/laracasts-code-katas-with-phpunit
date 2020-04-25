<?php


use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

/**
 * PrimeFactorsTest
 * @group group
 */
class PrimeFactorsTest extends TestCase
{
    /**
     * @test
     * @dataProvider factors
     *  */
    public function it_generates_prime_factors_for_given_data($number, $expected)
    {
        $factors = new PrimeFactors;

        $this->assertEquals($expected, $factors->generate($number));
    }

    public function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [8, [2, 2, 2]],
            [100, [2, 2, 5, 5]],
        ];
    }

    /** @test */
    public function it_generates_prime_factors_for_2()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([2], $factors->generate(2));
    }

    /** @test */
    public function it_generates_prime_factors_for_3()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([3], $factors->generate(3));
    }

    /** @test */
    public function it_generates_prime_factors_for_4()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([2,2], $factors->generate(4));
    }

    /** @test */
    public function it_generates_prime_factors_for_5()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([5], $factors->generate(5));
    }

    /** @test */
    public function it_generates_prime_factors_for_6()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([2,3], $factors->generate(6));
    }

    /** @test */
    public function it_generates_prime_factors_for_7()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([7], $factors->generate(7));
    }

    /** @test */
    public function it_generates_prime_factors_for_8()
    {
        $factors = new PrimeFactors;

        $this->assertEquals([2,2,2], $factors->generate(8));
    }


}
