<?php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function newOpportunity(Request $request){

        $request->validate([
            'customer_id'=>'required' ,
            'product_id'=>'required' ,
            'number'=>'required' ,
            'price'=>'required' ,
            'total_price'=>'required' ,
            'description'=>'nullable' ,
            'status'=>'nullable'
        ]);

        $opportunity = Opportunity::create($request->toArray());
        return response()->json($opportunity);

    }

    public function opportunitiesList(string $id = null)
    {
        if ($id){
            $opportunities = Opportunity::findOrFail($id);
        }
        else{
            $opportunities = Opportunity::all();
        }

        return response()->json($opportunities);
    }


    public function update(Request $request , $id)
    {
        $request->validate([
            'user_id'=>'sometimes' ,
            'category'=>'sometimes' ,
            'product_id'=>'sometimes' ,
            'number'=>'sometimes' ,
            'price'=>'sometimes' ,
            'total_price'=>'sometimes' ,
            'description'=>'sometimes' ,
        ]);

        $Opportunity = Opportunity::findOrFail($id);
        $Opportunity->update($request->toArray());

        return response()->json($Opportunity);


    }

    public function delete($id)
    {
        $oppo = Opportunity::findOrFail($id);
        $oppo->delete();

        return response()->json([
            'message'=>'Went To Fucking Hell!'
        ]);
    }

}
