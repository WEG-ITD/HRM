<?php

namespace App\Http\Controllers;

use App\Models\Sidemenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SidemenuResource;
use App\Http\Resources\SidemenuResourceCollection;
class SidemenuController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Sidemenu::class, 'sidemenu');
    }
    public function index()
    {
        return new SidemenuResourceCollection(Sidemenu::orderBy('id')->get());
    }
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name' => ['required', 'max:25'],
            'type'=>['required', 'max:2'],
            'icon'=>['required', 'max:55'],
            'ordering'=>['required'],
        ]);
        //create user`
        if($request->type==1){
            Sidemenu::create([
                'name' => $request->name,
                'module_id' => $request->module,
                'type' => $request->type,
                'icon' => $request->icon,
                'link' => $request->link,
                'ordering' => $request->ordering,
                'parentId'=>$request->parentId,
                'is_report'=>$request->is_report
            ]);
        }else{
            Sidemenu::create([
                'name' => $request->name,
                'module_id' => 0,
                'type' => $request->type,
                'icon' => $request->icon,
                'link' => '',
                'ordering' => $request->ordering,
                'parentId'=>$request->parentId,
                'is_report'=>$request->is_report
            ]);
        }
        return [
            'message'=> 'Create Side Menu successfully ',
            'snackColor'=> 'success',
            "status" => ApiResponse::STATUS_OK,
        ];
    }
    public function update(Request $request, Sidemenu $sidemenu)
    {
        $validated=$request->validate([
            'name' => ['required', 'max:25'],
            'type'=>['required', 'max:2'],
            'icon'=>['required', 'max:55'],
            'ordering'=>['required'],
        ]);
        //create user`
        if($request->type==1){
            $sidemenu->update([
                'name' => $request->name,
                'module_id' => $request->module,
                'type' => $request->type,
                'icon' => $request->icon,
                'link' => $request->link,
                'ordering' => $request->ordering,
                'parentId'=>$request->parentId,
                'is_report'=>$request->is_report
            ]);
        }else{
            $sidemenu->update([
                'name' => $request->name,
                'module_id' => 0,
                'type' => $request->type,
                'icon' => $request->icon,
                'link' => '',
                'ordering' => $request->ordering,
                'parentId'=>$request->parentId,
                'is_report'=>$request->is_report
            ]);
        }
        return [
            'message'=> 'Update Side Menu successfully ',
            'snackColor'=> 'success',
            "status" => ApiResponse::STATUS_OK,
            'auth'=>Auth::user(),
        ];
    }

    public function destroy(Sidemenu $sidemenu)
    {
        $sidemenu->delete();
        return [
            'message'=> 'Delete Side Menu successfully ',
            'snackColor'=> 'danger',
            "status" => ApiResponse::STATUS_OK,
        ];
    }
}
