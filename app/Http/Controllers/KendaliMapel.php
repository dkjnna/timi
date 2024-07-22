<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class KendaliMapel extends Controller
{
    public function index(){
        $data=Mapel::all();
        return response()->json($data, 200);
    }
    public function store(Request $request){
        Mapel::create($request->all());
        return response()->json(200);
    }
    public function update(Request $request, $id){
        $data=Mapel::find($id);
        $data->update($request->all());
        return response()->json($data, 200);
    }
    public function destroy($id){
        $data=Mapel::find($id);
        $data->delete();
        return response()->json(null, 200);
    }
}
