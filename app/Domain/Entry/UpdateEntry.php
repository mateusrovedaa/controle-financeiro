<?php

namespace App\Domain\Entry;

class UpdateEntry
{

    private $repository;

    public function __construct(EntryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, array $values)
    {
        $entry = $this->repository->find($id);
        $entry->value = $values['value'];
        $entry->payment_date = $values['payment_date'];
        $entry->status = $values['status'];
        $entry->description = $values['description'];
        $entry->entry_type_id = $values['entry_type_id'];
        $entry->category_id = $values['category_id'];
        $entry->user_id = $values['user_id'];
        return $this->repository->save($entry);
    }
}
