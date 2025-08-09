<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller {
    public function index(){ return Member::paginate(20); }
    public function show($id){
        $member = Member::with(['farms','warnings','cashMovements','warehouseMovements'])->findOrFail($id);
        return $member;
    }
    public function store(Request $r){
        $data = $r->validate(['nome'=>'required','discord'=>'nullable','member_login'=>'nullable','member_password'=>'nullable']);
        $member = Member::create($data);
        return response()->json($member,201);
    }
    public function update(Request $r,$id){
        $member = Member::findOrFail($id);
        $member->update($r->only(['nome','discord','member_login','member_password']));
        return response()->json($member);
    }
    public function destroy($id){
        Member::destroy($id);
        return response()->json(['ok'=>true]);
    }
}
