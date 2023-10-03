<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        //$products = Product::select('id', 'name')->where('is_active', true)->get();
        $title = 'Liste des produits';

        return view('products.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource. = products/create
     */
    public function create()
    {
        $title = 'Créer un produit';


        return view('products.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());$
            $request->validate([
                'name' => 'required|min:3|max:255|unique:products,name',
                'description' => 'required|min:3|max:255',
                'price' => 'required|numeric|between:100,400',
            ]);
            $input = $request->all();
            $input['is_active'] = true;
            $input['stock'] = 0;    
            $product = Product::create($input);
    
            return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $title = 'Détail du produit';
       // $product = Product::select('id', 'name')->where('id', $product->id)->first();

        return view('products.show', compact('title', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $title = 'Modifier le produit';

        return view('products.edit', compact('title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required|min:3|max:255', 
            'description' => 'required|min:3',
            'price' => 'required|numeric|between:0,400000',
        ]);
       
        $product->update($request->all());

        if($product->wasChanged()){
            return redirect()->route('products.show', $product)->with('success', 'Le produit a bien été modifié');
        }else{
            return redirect()->route('products.show', $product)->with('warning', 'Aucune modification n\'a été effectuée');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Le produit a bien été supprimé');
    }
}
