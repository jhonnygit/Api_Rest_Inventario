<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\categoria;

class categoriaController extends Controller
{

     /*public function __construct(){
        $this->middleware('auth.basic');
    }*/
    public function __construct(){
        $this->middleware('auth.basic',['only'=>['store','update','destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         return response()->json(['datos'=>categoria::all()],200);
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
    public function store(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'categoria' => 'required',
            'estado' => 'required'
        ]);



        if($validator->fails()){
           return response()->json(['mensaje'=>'falta llenar datos','codigo'=>'422'],422);
        }
        
        categoria::create($request->all());
        return response()->json(['mensaje'=>'la categoria a sido creado'],202); 
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
        $categoria=categoria::find($id);
        if(!$categoria){
            return response()->json(['mensaje'=>'No se encontro categoria'],404);    
        }
        return response()->json(['datos'=>$categoria],202);
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
    public function update(Request $request, $id)
    {
        //
        $metodo=$request->method();
        $categoria=categoria::find($id);
         if(!$categoria){
           return response()->json(['mensaje'=>'la categoria no existe','codigo'=>'404'],404);
        }

        $flag=false;

        if($metodo==="PATCH"){
            $cate=$request->get('categoria');
            if($cate!=null && $cate!=''){
                $categoria->categoria=$cate;
                $flag=true;
            }

            $estado=$request->get('estado');
            if($estado!=null && $estado!=''){
                $categoria->estado=$estado;
                $flag=true;
            }

            if($flag){
                $categoria->save();
                return response()->json(['mensaje'=>'la categoria a sido editado','codigo'=>202],202);  
            }

            return response()->json(['mensaje'=>'no se han guardado los cambios,Datos nulos','codigo'=>200],200);  
             
        }

        $cate=$request->get('categoria');
        $estado=$request->get('estado');

        if(!$cate || !$estado){
            return response()->json(['mensaje'=>'datos invalidos'],404); 
        }

        $categoria->categoria=$cate;
        $categoria->estado=$estado;
        $categoria->save();
        return response()->json(['mensaje'=>'la categoria a sido editado'],202); 
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
