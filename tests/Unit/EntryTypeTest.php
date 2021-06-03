<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Domain\EntryType\EntryType;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class EntryTypeTest extends TestCase
{
    //use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function checkIfEntryTypeColumnsIsCorrect()
    {
        $entrytype = new EntryType();
        $expected = [ 'name'];
        $arrayCompared = array_diff($expected, $entrytype->getFillable());
        //dd($arrayCompared);
        $this->assertEquals(0, count($arrayCompared));
    }
}