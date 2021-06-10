<?php

namespace App\Domain\Category;

class CategoryRepository
{

    public function save(Category $category)
    {
        $category->save();
        return $category;
    }

    public function find(int $id)
    {
        return Category::find($id);
    }

    public function findall()
    {
        return Category::all();
    }

    public function delete(int $id)
	{
		return Category::destroy($id);
	}
}
