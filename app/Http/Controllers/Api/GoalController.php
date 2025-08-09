<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\RoleGoalConfig;
use App\Models\Farm;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GoalController extends Controller {
    public function status(Request $r){
        // Simplified adapter: returns configured goals and simple progress for a member.
        $goals = Goal::all();
        $member_id = $r->member_id;
        $role_id = $r->role_id;

        $response = [];
        foreach($goals as $g){
            $entry = ['goal'=>$g];
            $config = RoleGoalConfig::where('goal_id',$g->id)->where('role_id',$role_id)->first();
            $entry['config'] = $config;
            $entry['progress'] = 0;
            $entry['meta_batida'] = false;
            if($config && $member_id){
                // example: if goal slug is 'resources' sum farms.quantidade for member in last period_days
                if($g->slug === 'resources'){
                    $start = Carbon::now()->subDays($config->period_days ?? 30)->toDateString();
                    $sum = Farm::where('member_id',$member_id)->whereDate('data_recebimento','>=',$start)->sum('quantidade');
                    $entry['progress'] = $sum;
                    $entry['meta_batida'] = ($sum >= $config->quantidade);
                }
                // money goal example would aggregate cash movements (not implemented fully)
            }
            $response[] = $entry;
        }
        return response()->json($response);
    }
}
