<?php

namespace App\Domain\Entry;
use App\Domain\User;

class EntryRepository
{

    public function save(Entry $entry)
    {
        $entry->save();
        return $entry;
    }

    public function find(int $id)
    {
        return Entry::find($id);
    }

    public function findall()
    {
        return Entry::where('user_id', auth()->user()->id)->orderBy('payment_date')->get();
    }
}
