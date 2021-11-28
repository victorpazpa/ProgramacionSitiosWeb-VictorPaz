<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['productos'] = Producto::paginate(2);
        return view('producto.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'codigo'=>'required|string|max:100',
            'nombre'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'precio_compra'=>'required',
            'cantidad_compra'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido.',
            'marca.required'=>'La marca es requerida.',
            'cantidad_compra.required'=>'La cantidad  de compra es requerida.',
        ];

        $this->validate($request,$campos,$mensaje); 
        //$datosProducto =$request->all();
        $datosProducto=request()->except('_token');
        //dd($datosProducto);
        Producto::insert($datosProducto); 
         // return response()->json($datosProducto);
        return redirect('producto')->with('mensaje','Producto registrado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto= Producto::findOrFail($id);
        return view('producto.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'codigo'=>'required|string|max:100',
            'nombre'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'precio_compra'=>'required',
            'cantidad_compra'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido.',
            'marca.required'=>'La marca es requerida.',
            'cantidad_compra.required'=>'La cantidad  de compra es requerida.',
        ];

        $this->validate($request,$campos,$mensaje); 

        $datosProducto=request()->except(['_token','_method']);
        Producto::where('id','=',$id)->update($datosProducto); 
        $producto= Producto::findOrFail($id);
        //return view('producto.edit',compact('producto'));
        return redirect('producto')->with('mensaje','Producto actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Producto::destroy($id);
        return redirect('producto')->with('mensaje','Producto eliminado con éxito.');
    }
}
