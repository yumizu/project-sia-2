<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
class SupplierController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $supplier=\App\Supplier::All();
    return view('admin.supplier.supplier',['supplier'=>$supplier]);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    //
    return view('admin.supplier.input');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //
    $tambah_supplier=new \App\Supplier;
    $tambah_supplier->kd_supp = $request->addkdsupp;
    $tambah_supplier->nm_supp = $request->addnmsupp;
    $tambah_supplier->alamat = $request->addalamat;
    $tambah_supplier->telepon = $request->addtelepon;
    $tambah_supplier->save();
    Alert::success('Pesan ','Data berhasil disimpan');
    return redirect()->route('supplier.index');
    }
    public function edit($kd_supp)
    {
    //
    $supplier=\App\Supplier::findOrFail($kd_supp);
    return view('admin.editSupplier', compact('supplier'));
    }
    public function destroy($kd_supp)
    {
    //
    $supplier=\App\Supplier::findOrFail($kd_supp);
    $supplier->delete();
    Alert::success('Pesan ','Data berhasil dihapus');
    return redirect()->route('supplier.index');
    }
    public function update(Request $request, $id)
    {
        $update_supplier = \App\Supplier::findOrFail($id);
        $update_supplier->kd_supp=$request->get('addkdsupp');
        $update_supplier->nm_supp=$request->get('addnmsupp');
        $update_supplier->alamat=$request->get('addalamat');
        $update_supplier->telepon=$request->get('addtelepon');
        $update_supplier->save();
        Alert::success('update', 'Data Berhasil diupdate');
        return redirect()->route( 'supplier.index' );
    }
}



