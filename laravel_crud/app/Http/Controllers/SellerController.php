<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Seller;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
//        $sellers = Seller::where('status', '=', 'active')->get();
        $sellers = Seller::all();
        return view('sellers.index', compact('sellers'));
    }


    public function create()
    {
        $branches = Branch::all(); //sacamos todas las branches

        return view('sellers.create',
        [
            'branches' => $branches,  //mandamos a la vista las branches para usarlas en el select
            'seller' => null,
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'branch_id' => ['required', Rule::exists('branches', 'id')],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'dni' => ['required', Rule::unique('sellers')],
            'phone' => ['required'],
//            'dni' => ['required', 'size:14', Rule::unique('sellers')],
//            'phone' => ['required', 'size:8'],
            'hired_at' => ['required'],
            'carnet' => ['required', Rule::unique('sellers')],
            'status' => ['required', Rule::in(['active', 'inactive'])]
        ]);

        $branch = Branch::find($data['branch_id']);

        Arr::forget($data, 'branch_id');

        $branch->sellers()->create($data);
//        Seller::create($data);
        return redirect()->route('sellers.index');
    }

    public function show(Seller $seller)
    {
        //
    }

    public function edit(Seller $seller)
    {
        $branches = Branch::all();
        return view('sellers.edit', compact('seller', 'branches'));
    }

    public function update(Request $request, Seller $seller)
    {
        $data = $request->validate([
            'branch_id' => ['required', Rule::exists('branches', 'id')],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'dni' => ['required', Rule::unique('sellers')->ignore($seller->id)],
            'phone' => ['required'],
//            'dni' => ['required', 'size:14', Rule::unique('sellers')->ignore($seller->id)],
//            'phone' => ['required', 'size:8', Rule::unique('sellers')->ignore($seller->id)],
            'hired_at' => ['required'],
            'carnet' => ['required', Rule::unique('sellers')->ignore($seller->id)],
            'status' => ['required', Rule::in(['active', 'inactive'])]
        ]);

        $seller->branches()->sync(
            [
                $data['branch_id']
            ]
        );

        Arr::forget($data, 'branch_id');

        $seller->update($data);

        return redirect()->route('sellers.index');

        //        $seller = Seller::findOrFail($seller->id);
//        $seller = Seller::findOrFail($seller->id);
//        $seller->first_name = $request->input('first_name');
//        $seller->last_name = $request->input('last_name');
//        $seller->dni = $request->input('dni');
//        $seller->phone = $request->input('phone');
//        $seller->hired_at = $request->input('hired_at');
//        $seller->carnet = $request->input('carnet');
//        $seller->status = $request->input('status');
//
//        $seller->save();
//        return redirect()->route('sellers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
