<?php

namespace App\Domain\EntryType;

class EntryTypeRepository
{

    public function save(EntryType $entrytype)
    {
        $entrytype->save();
        return $entrytype;
    }

    public function find(int $id)
    {
        return EntryType::find($id);
    }

    public function findall()
    {
        return EntryType::all();
    }
}
