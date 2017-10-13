<?php

namespace App\Http\Controllers;

use App\UnitRumah;
use DB;
use Illuminate\Http\Request;

class UnitRumahController extends Controller
{
    //
/*
    function Get(){

        $pList = DB::table('unit_rumahs as p')
        //          ->join('product_images as pi', 'pi.product_id', "=", 'p.id')
        //          ->where('name', 'product 1') //Query Builder
                    ->select('p->id'.'p->kavling'.'p->blok'.'p->no_rumah'.'p->harga_tanah'.'p->luas_tanah'.'p->luas_bangunan')
                    ->get();
        return response()->json($pList, 200);
    }
*/
    function CreateUnit(){

        DB::beginTransaction();
         $product = new UnitRumah;

         $product->kavling = 1234;
         $product->blok = 1;
         $product->no_rumah = 1;
         $product->harga_tanah = 1;
         $product->luas_tanah = 1;
         $product->luas_bangunan = 1;

         $product->save();

         echo "create success";
        DB::commit();
    }
    
    function DeleteUnit(Request $req){
        
        $id = $req->id;
        
        DB::DELETE('delete from unit_rumah where id = ?', [$id]);
        
        echo "delete success";
        }
}
