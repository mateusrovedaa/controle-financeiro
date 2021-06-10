<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Category\CreateCategory;
use App\Domain\Category\UpdateCategory;
use App\Domain\Category\CategoryRepository;

class CategoryController extends Controller
{

    private $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = $this->repository->findall();
        return view('categories.list-categories', compact('categories'));
    }

    public function create()
    {
        return view('categories.create-category');
    }

    public function store(Request $request, CreateCategory $create)
    {
        $create->execute(['name' => $request->input('name')]);
        return redirect()->route('list-categories');
    }

    public function edit(int $id)
    {
        $category = $this->repository->find($id);
        return view('categories.edit-category', ['category' => $category->toArray()]);
    }

    public function update(Request $request, UpdateCategory $update)
    {
        $update->execute($request->input('id'), ['name' => $request->input('name')]);
        return redirect()->route('list-categories');
    }

    public function delete(int $id)
    {
        $category = $this->repository->find($id);
        try {
            $this->repository->delete($id);
            return redirect()->route('list-categories');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('list-categories')->withErrors('The category '. $category->name .' will not be deleted as it is used in some entry.');
        }
    }
}
