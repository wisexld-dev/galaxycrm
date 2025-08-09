<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WarehouseMovement;

class WarehouseController extends Controller {
    public function index(){ return WarehouseMovement::with('item','member')->orderBy('created_at','desc')->paginate(25); }
    public function store(Request $r){ $data = $r->validate(['tipo'=>'required|in:entrada,saida','item_id'=>'required|exists:items,id','quantidade'=>'required|integer','descricao'=>'nullable','member_id'=>'nullable|exists:members,id']); $w = WarehouseMovement::create($data); return response()->json($w,201); }
}
