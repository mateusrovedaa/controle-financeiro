<?php

namespace App\Domain\Category;

class UpdateCategory
{

    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, array $values)
    {
        $category = $this->repository->find($id);
        $category->name = $values['name'];
        return $this->repository->save($category);
    }
}
