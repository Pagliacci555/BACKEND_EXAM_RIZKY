<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    function GetUnit(){
        $unit = DB::table('unit_rumahs')->get();
        
        return response()->json($unit, 200);
    }
    

    function CreateUnit(){

        try{
            
                        $this->validate($request,[
                            'Kavling' => 'required',
                            'Blok' => 'required',
                            'No_Rumah' => 'required',
                            'Harga_Rumah' => 'required',
                            'Luas_Tanah' => 'required',
                            'Luas_Bangunan' => 'required',
                            'customers_id' => 'required',
                            
                        
                            
            
                        ]);
    
            $unit = new UnitRumah;
            $unit->kavling =  $request->input('eal');
            $unit->blok = $request->input('Blok');
            $unit->no_rumah =$request->input('No_Rumah');
            $unit->harga_rumah= $request->input('1.000');
            $unit->luas_tanah=$request->input('100');
            $unit->luas_bangunan=$request->input('10');
            $unit->customers_id=$request->input('customers_id');
            $unit->save();
            return response()->json(['message' =>'Berhasil'], 200);
             }
        catch(\Exception $e){
            
            //return "Gagal";
            return response()->json(['message' =>'Failed to create unit, exception:' + $e], 500);
        }
        
        }

    function DeleteUnit(){
        $id = $request->input('id');
        $unit_del = DB::delete(
            'delete from unit_rumahs
            where id =?',[$id]);
        
        return response()->json($unit_del, 200);
    }

    }

