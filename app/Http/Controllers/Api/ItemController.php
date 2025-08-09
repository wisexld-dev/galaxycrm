<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller {
    public function index(){ return Item::paginate(25); }
    public function store(Request $r){ $data = $r->validate(['nome'=>'required','valor'=>'nullable|numeric']); $item = Item::create($data); return response()->json($item,201); }
    public function show($id){ return Item::findOrFail($id); }
    public function update(Request $r,$id){ $item = Item::findOrFail($id); $item->update($r->only(['nome','valor'])); return response()->json($item); }
    public function destroy($id){ Item::destroy($id); return response()->json(['ok'=>true]); }
}
