<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Farm;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FarmController extends Controller {
    public function index(Request $r){
        $q = Farm::with(['member','gerente']);
        if($r->member_id) $q->where('member_id',$r->member_id);
        if($r->period_start) $q->whereDate('data_recebimento','>=',$r->period_start);
        if($r->period_end) $q->whereDate('data_recebimento','<=',$r->period_end);
        $data = $q->orderBy('data_recebimento','desc')->paginate(25);

        // compute simple meta_batida flag per row (backend will compute member's sum and compare with role config)
        // NOTE: real implementation should aggregate per role goal config; this is a simplified example.
        $rows = $data->through(function($row){
            $row->meta_batida = false;
            return $row;
        });

        return $data;
    }

    public function store(Request $r){
        $data = $r->validate([
            'member_id'=>'required|exists:members,id',
            'item'=>'required|string',
            'quantidade'=>'required|integer',
            'gerente_id'=>'nullable|exists:members,id',
            'data_recebimento'=>'required|date'
        ]);
        $farm = Farm::create($data);
        return response()->json($farm,201);
    }

    public function show($id){ return Farm::with(['member','gerente'])->findOrFail($id); }
    public function update(Request $r,$id){
        $farm = Farm::findOrFail($id);
        $farm->update($r->only(['item','quantidade','gerente_id','data_recebimento']));
        return response()->json($farm);
    }
    public function destroy($id){ Farm::destroy($id); return response()->json(['ok'=>true]); }
}
