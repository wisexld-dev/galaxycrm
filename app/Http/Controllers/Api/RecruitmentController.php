<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruitment;

class RecruitmentController extends Controller {
    public function byRecruiter(Request $r){
        $q = Recruitment::with(['recruiter','recruitedMember']);
        if($r->recruiter_id) $q->where('recruiter_id',$r->recruiter_id);
        if($r->period_start) $q->whereDate('data','>=',$r->period_start);
        if($r->period_end) $q->whereDate('data','<=',$r->period_end);
        return $q->paginate(25);
    }
}
