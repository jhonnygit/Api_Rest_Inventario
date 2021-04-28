<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\categoria;

use App\producto;

class categoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        
       return $categoria=categoria::find($id)->productos;
        //print_r($categoria);
       $productos=$categoria->productos;
       if(!$productos){
            return response()->json(['mensaje'=>'No se encontro productos'],404);    
        }
        return response()->json(['datos'=>$productos],202);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $validator = Validator::make($request->all(), [
            'producto' => 'required',
            'modelo' => 'required',
            'caracteristicas' => 'required',
            'existencia' => 'required',
            'precio_compra' => 'required',
            'precio_venta' => 'required'
        ]);



        if($validator->fails()){
           return response()->json(['mensaje'=>'falta llenar datos','codigo'=>'422'],422);
        }
        //return response()->json(['datos'=>$request->all()],202);
        $cateroria=categoria::find($id);
        if(!$cateroria){
           return response()->json(['mensaje'=>'la categoria no existe','codigo'=>'404'],404);
        }

        producto::create([
            'producto' => $request->get('producto'),
            'modelo' => $request->get('modelo'),
            'caracteristicas' => $request->get('caracteristicas'),
            'existencia' => $request->get('existencia'),
            'precio_compra' =>$request->get('precio_compra'),
            'precio_venta' => $request->get('precio_venta'),
            'estado' => $request->get('estado'),
            'categoria_id'=>$id            
        ]);
        return response()->json(['mensaje'=>'el producto a sido creado'],202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idCategoria,$idProducto)
    {
        //
       $metodo=$request->method();
        $categoria=categoria::find($idCategoria);
        if(!$categoria){
           return response()->json(['mensaje'=>'la categoria no existe','codigo'=>'404'],404);
        }

        $producto=producto::find($idProducto);
        if(!$producto){
           return response()->json(['mensaje'=>'el producto no existe asociado a la categoria','codigo'=>'404'],404);
        }

        $product = $request->get('producto');
        $modelo = $request->get('modelo');
        $caracteristicas = $request->get('caracteristicas');
        $existencia = $request->get('existencia');
        $precio_compra =$request->get('precio_compra');
        $precio_venta = $request->get('precio_venta');
        $estado = $request->get('estado');

        $flag=false;

        if($metodo==="PATCH"){
          
            if($product!=null && $product!=''){
                $producto->producto=$product;
                $flag=true;
            }

            if($modelo!=null && $modelo!=''){
                $producto->modelo=$modelo;
                $flag=true;
            }
            
            if($caracteristicas!=null && $caracteristicas!=''){
                $producto->caracteristicas=$caracteristicas;
                $flag=true;
            }
            
            if($existencia!=null && $existencia!=''){
                $producto->existencia=$existencia;
                $flag=true;
            }
            if($precio_compra!=null && $precio_compra!=''){
                $producto->precio_compra=$precio_compra;
                $flag=true;
            }

            if($precio_venta!=null && $precio_venta!=''){
                $producto->precio_venta=$precio_venta;
                $flag=true;
            }
            if($estado!=null && $estado!=''){
                $producto->estado=$estado;
                $flag=true;
            }


            if($flag){
                $producto->save();
                return response()->json(['mensaje'=>'el producto a sido editado correctamente','codigo'=>202],202); 
            }

            return response()->json(['mensaje'=>'No se a guardado los cambios','codigo'=>200],200);
          
        }

        $cate=$request->get('categoria');
        $estado=$request->get('estado');

        if(!$producto || !$modelo || !$caracteristicas || !$existencia || !$precio_compra || !$precio_venta || !$estado){
            return response()->json(['mensaje'=>'datos invalidos'],404); 
        }

        $producto->producto=$product;
        $producto->modelo=$modelo;
        $producto->caracteristicas=$caracteristicas;
        $producto->existencia=$existencia;
        $producto->precio_compra=$precio_compra;
        $producto->precio_venta=$precio_venta;
        $producto->estado=$estado;
        $producto->save();
        return response()->json(['mensaje'=>'el producto a sido editado correctamente','codigo'=>202],202); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
