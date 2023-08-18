<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductoController extends Controller
{
    //

    public function list(){
        try{
            $products = Producto::all();
            return response()
            ->json(['productos' => $products],200);
        }catch(\PDOException $e){
            return response()
            ->json([
                'Error' => $e->getMessage()
            ],500);
        }

    }

    public function create(Request $request){


        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'precio' => 'required'
         ]);
         try{
         if($validator->fails()){
            throw new ValidationException($validator);
         }
        try {
             $product = Producto::create([
                'nombre' => $request->get('nombre'),
                'descripcion' => $request->get('descripcion',''),
                'precio' => floatval($request->get('precio'))
            ]);
            return response()
            ->json([
                'id' => $product->id,
                'nombre' => $product->nombre,
                'descripcion' => $product->descripcion,
                'precio' => $product->precio,
                'link' => '/product/' . $product->id
            ],201);
        } catch (\PDOException $e) {
            return response()
            ->json([
                'Error' => $e->getMessage()
            ],500);
        }
    }catch(ValidationException $e){
        return response()
        ->json([
            'errors' => $e->errors()
        ],500);
    }
    }

    public function detailProduct($id){
        try{
            $product = Producto::findOrFail(intval($id));
            $product->link = '/products/' . $id;
            return response()
            ->json($product,200);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'error' =>  'Error el recurso al que intenta acceder no existe',
                'descripcion' => $e->getMessage()
            ]);
        }

    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'precio' => 'required'
         ]);
        try{

            if($validator->fails()){
                throw new ValidationException($validator);
             }

        try{
            $product = Producto::findOrFail(intval($id));
            $product->nombre = $request->get('nombre');
            if(!empty($request->descripcion)){
                $product->descripcion = $request->get('descripcion');
            }
            $product->precio = floatval($request->get('precio'));
            $product->save();
            $product->link = '/products/' . $id;
            return response()
            ->json($product,200);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'error' =>  'Error el recurso al que intenta acceder no existe',
                'descripcion' => $e->getMessage()
            ]);
        }
    }catch(ValidationException $e){
        return response()
        ->json([
            'errors' => $e->errors()
        ],500);
    }
    }

    public function delete($id){
        try{
            $product = Producto::findOrFail(intval($id));
            try{
                $product->delete();
                return response()
                ->json([
                    'eliminado' => 'exito',
                    'delete_id' => $id
                ],200);
            }catch(\PDOException $e){
                throw new ModelNotFoundException('Error no se elimino el producto');
            }
        }catch(ModelNotFoundException $e){
            return response()
            ->json([
                'eliminado' => 'no',
                'error' => $e->getMessage()
            ],500);
        }
    }
}
