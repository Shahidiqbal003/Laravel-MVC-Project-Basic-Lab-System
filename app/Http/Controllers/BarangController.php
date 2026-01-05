<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::orderBy('name', 'asc')->get();

        return view('barang.barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.barang-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|max:100|unique:barangs,name',
            'category' => 'required',
            'supplier' => 'required',
            'stock'    => 'required|numeric|min:1',
            'price'    => 'required|numeric|min:0',
            'note'     => 'nullable|max:1000',
        ]);

        Barang::create($validated);

        Alert::success('Success', 'Barang has been saved!');
        return redirect()->route('barang.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);

        return view('barang.barang-edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_barang)
    {
        $validated = $request->validate([
            'name'     => 'required|max:100|unique:barangs,name,' . $id_barang . ',id_barang',
            'category' => 'required',
            'supplier' => 'required',
            'stock'    => 'required|numeric|min:1',
            'price'    => 'required|numeric|min:0',
            'note'     => 'nullable|max:1000',
        ]);

        $barang = Barang::findOrFail($id_barang);
        $barang->update($validated);

        Alert::info('Success', 'Barang has been updated!');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_barang)
    {
        try {
            $barang = Barang::findOrFail($id_barang);
            $barang->delete();

            Alert::success('Success', 'Barang has been deleted!');
            return redirect()->route('barang.index');

        } catch (Exception $e) {

            Alert::warning('Error', 'Cannot delete, Barang already used!');
            return redirect()->route('barang.index');
        }
    }
}
