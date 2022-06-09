<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Sales;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = sales::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $branches = Branch::all(); //sacamos todas las branches
        $sellers = Seller::all();
        $products = Product::all();

        return view('sales.create',
            [
                'branches' => $branches,  //mandamos a la vista las branches para usarlas en el select
                'sellers' => $sellers,
                'products' => $products,
                'sales' => null,
            ]);
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'seller_id' => ['required', Rule::exists('sellers', 'id')],
            'product_id' => ['required', Rule::exists('products', 'id')],
            'branch_id' => ['required', Rule::exists('branches', 'id')],
            'price' => ['required'],
            'quantity' => ['required']
        ]);

        $branch = Branch::find($data['branch_id']);
        $seller = Seller::find($data['seller_id']);
        $product = Product::find($data['product_id']);

        $branch->sales();
        $seller->sales();
        $product->sales()->create($data);

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
