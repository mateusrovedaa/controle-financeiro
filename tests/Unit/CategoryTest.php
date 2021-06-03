<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Domain\Category\Category;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class CategoryTest extends TestCase
{
    //use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function checkIfCategoryColumnsIsCorrect()
    {
        $category = new Category();
        $expected = [ 'name'];
        $arrayCompared = array_diff($expected, $category->getFillable());
        //dd($arrayCompared);
        $this->assertEquals(0, count($arrayCompared));
    }
}