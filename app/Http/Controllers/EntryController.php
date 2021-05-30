<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Entry\CreateEntry;
use App\Domain\Entry\UpdateEntry;
use App\Domain\Entry\EntryRepository;
use App\Domain\Category\Category;
use App\Domain\EntryType\EntryType;

class EntryController extends Controller
{

    private $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntryRepository $repository)
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
        $entries = $this->repository->findall();
        return view('entries.list-entries', compact('entries'));
    }

    public function create()
    {
        $entrytypes = EntryType::all();
        $categories = Category::all();

        return view('entries.create-entry', ['entrytypes' => $entrytypes, 'categories' => $categories]);
    }

    public function store(Request $request, CreateEntry $create)
    {
        $values = [
            'value' => $request->input('value'),
            'payment_date' => $request->input('payment_date'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
            'entry_type_id' => $request->input('entry_type_id'),
            'category_id' => $request->input('category_id'),
            'user_id' => $request->input('user_id'),
        ];
        
        $create->execute($values);
        return redirect()->route('list-entries');
    }

    public function edit(int $id)
    {
        $entrytypes = EntryType::all();
        $categories = Category::all();

        $entry = $this->repository->find($id);
        return view('entries.edit-entry', ['entry' => $entry, 'entrytypes' => $entrytypes, 'categories' => $categories]);
    }

    public function update(Request $request, UpdateEntry $update)
    {

        $values = [
            'value' => $request->input('value'),
            'payment_date' => $request->input('payment_date'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
            'entry_type_id' => $request->input('entry_type_id'),
            'category_id' => $request->input('category_id'),
            'user_id' => $request->input('user_id'),
        ];
        
        $update->execute($request->input('id'),$values);
        return redirect()->route('list-entries');
    }
}
