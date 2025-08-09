<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function register(Request $r){
        $r->validate(['name'=>'required','email'=>'required|email|unique:users','password'=>'required|min:6']);
        $user = User::create(['name'=>$r->name,'email'=>$r->email,'password'=>Hash::make($r->password)]);
        return response()->json($user,201);
    }

    public function login(Request $r){
        $r->validate(['email'=>'required','password'=>'required']);
        $user = User::where('email',$r->email)->first();
        if(!$user || !Hash::check($r->password, $user->password)){
            return response()->json(['message'=>'Credenciais inválidas'],401);
        }
        // create personal access token
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json(['user'=>$user, 'token'=>$token]);
    }

    public function logout(Request $r){
        $r->user()->currentAccessToken()->delete();
        return response()->json(['ok'=>true]);
    }
}
