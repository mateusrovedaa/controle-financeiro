<?php

namespace App\Domain\EntryType;

class UpdateEntryType
{

    private $repository;

    public function __construct(EntryTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, array $values)
    {
        $entrytype = $this->repository->find($id);
        $entrytype->name = $values['name'];
        return $this->repository->save($entrytype);
    }
}
