<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partnership;

class PartnershipController extends Controller {
    public function index(){ return Partnership::paginate(25); }
    public function store(Request $r){ $data = $r->validate(['titulo'=>'required','imagem'=>'nullable','area_risco'=>'nullable','contato_responsavel'=>'nullable','produto'=>'nullable']); $p = Partnership::create($data); return response()->json($p,201); }
    public function show($id){ return Partnership::findOrFail($id); }
    public function update(Request $r,$id){ $p = Partnership::findOrFail($id); $p->update($r->only(['titulo','imagem','area_risco','contato_responsavel','produto'])); return response()->json($p); }
    public function destroy($id){ Partnership::destroy($id); return response()->json(['ok'=>true]); }
}
