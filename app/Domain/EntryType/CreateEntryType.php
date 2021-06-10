<?php

namespace App\Domain\EntryType;

class CreateEntryType
{

    private $repository;

    public function __construct(EntryTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $values)
    {
        $entrytype = new EntryType;
        $entrytype->name = $values['name'];
        return $this->repository->save($entrytype);
    }
}
