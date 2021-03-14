<?php

namespace App\Domain\Category;

class CreateCategory
{

    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(array $values)
    {
        $category = new Category;
        $category->name = $values['name'];
        return $this->repository->save($category);
    }
}
