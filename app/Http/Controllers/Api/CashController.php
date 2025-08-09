<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CashMovement;

class CashController extends Controller {
    public function index(){ return CashMovement::with('member')->orderBy('created_at','desc')->paginate(25); }
    public function store(Request $r){ $data = $r->validate(['tipo'=>'required|in:entrada,saida','valor'=>'required|numeric','descricao'=>'nullable','member_id'=>'nullable|exists:members,id']); $c = CashMovement::create($data); return response()->json($c,201); }
}
