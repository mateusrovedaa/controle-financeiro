<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\EntryType\CreateEntryType;
use App\Domain\EntryType\UpdateEntryType;
use App\Domain\EntryType\EntryTypeRepository;

class EntryTypeController extends Controller
{

    private $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntryTypeRepository $repository)
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
        $entriestypes = $this->repository->findall();
        return view('entriestypes.list-entriestypes', compact('entriestypes'));
    }

    public function create()
    {
        return view('entriestypes.create-entrytype');
    }

    public function store(Request $request, CreateEntryType $create)
    {
        $create->execute(['name' => $request->input('name')]);
        return redirect()->route('list-entriestypes');
    }

    public function edit(int $id)
    {
        $entrytype = $this->repository->find($id);
        return view('entriestypes.edit-entrytype', ['entrytype' => $entrytype->toArray()]);
    }

    public function update(Request $request, UpdateEntryType $update)
    {
        $update->execute($request->input('id'), ['name' => $request->input('name')]);
        return redirect()->route('list-entriestypes');
    }
}
