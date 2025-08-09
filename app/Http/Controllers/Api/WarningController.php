<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warning;

class WarningController extends Controller {
    public function index(){ return Warning::with('member')->paginate(25); }
    public function store(Request $r){ $data = $r->validate(['member_id'=>'required|exists:members,id','motivo'=>'required','autor_id'=>'nullable|exists:members,id']); $w = Warning::create($data); return response()->json($w,201); }
    public function show($id){ return Warning::findOrFail($id); }
    public function update(Request $r,$id){ $w = Warning::findOrFail($id); $w->update($r->only(['motivo'])); return response()->json($w); }
    public function destroy($id){ Warning::destroy($id); return response()->json(['ok'=>true]); }
}
