<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    public function create()
    {
        return view('branches.create', ['branch' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'status' => ['required', Rule::in(['active', 'inactive'])]
        ]);

        Branch::create($data);
        return redirect()->route('branches.index');
    }

    public function show(Branch $branch)
    {
        //
    }

    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $data = $request->validate([
            'name' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'status' => ['required', Rule::in(['active', 'inactive'])]
        ]);

        $branch->update($data);
        return redirect()->action([BranchController::class, 'index']);
    }


    public function destroy(Branch $branch)
    {
        //
    }
}
