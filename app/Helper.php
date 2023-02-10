<?php
namespace App;

use App\Models\Module;
// use App\Models\Workflow;
// use App\Models\WorkflowProcess;
// use App\Models\WorkflowHistory;
// use App\Models\Status;
// use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;
use App\Models\User;
class Helper
{
    public function isSuperAdmin($user){
        if($user->role_id==1){
            return true;
        }else{
            return false;
        }
    }
    public function isHoAdmin($user){
        if($user->role_id==5){
            return true;
        }else{
            return false;
        }
    }
    public function getModuleNameInController($className){
        return explode('Controller',$className)[0];
    }
    public function findName($array, $id){
        foreach($array as $a){
            if($a['id']==$id){
                return $a['name'];
            }
        }
        return null;
    }
    // public function notifyAndMail($approvalInfo,$id,$route,$title,$comment){
    //     if($approvalInfo['is_final']!=1){
    //         $user=Auth::user();
    //         $module=Module::find($approvalInfo['module_id']);
    //         $workflow=WorkflowProcess::where('module_id',$module->id)
    //                                 ->where('ref_id',$id)
    //                                 ->where('cur_status',$approvalInfo['post_status'])->first();
    //         $users=User::where('role_id',$workflow->role_id)->where('branch_id',$workflow->branch_id)->get();
    //         foreach($users as $u){
    //             Notification::create([
    //                 'from_user_id'=>$user->id,
    //                 'user_id'=>$u->id,
    //                 'role_id'=>$u->role_id,
    //                 'title'=>$title,
    //                 'message'=>$approvalInfo['post_status_name'].' '.$title.' Successfully',
    //                 'link'=>'/'.$route.'/'.$id.'/edit',
    //             ]);
    //             $object=[
    //                 'topic'=>$title,
    //                 'message'=>$user->name.'('.$user->branch->name.'-'.$user->role->name.') has '.$approvalInfo['post_status_name'].' '
    //                     .$title.' successfully. '
    //                     .$u->name.' please help '
    //                     .$workflow->btn_action.'. Message:'.$comment,
    //                 'link'=>env('APP_URL').'/'.$route.'/'.$id.'/edit',
    //             ];

    //             // Mail::to($u->email)->send(new NotificationMail($object));
    //             Mail::to('vanndavid.teng@wegcambodia.com')->send(new NotificationMail($object));
    //         }
    //     }
    // }
}