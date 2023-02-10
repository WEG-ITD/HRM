<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Module;
use App\Http\Resources\ModuleResource;
use App\Http\Resources\ModuleResourceCollection;


class ModuleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Module::class, 'module');
    }
    public function index()
    {
        return new ModuleResourceCollection(Module::orderBy('id')->get());
    }
 
    public function store(Request $request)
    {
        //validate
        $validated=$request->validate([
            'name' => ['required', 'max:30','unique:modules,name,NULL,id,deleted_at,NULL'],
        ]);
        Module::create([
            'name' => $request->name,
            'is_main' => $request->is_main,
            'have_workflow' => $request->have_workflow,
        ]);
        return [
            'message'=> 'Create module successfully ',
            'snackColor'=> 'success',
            "status" => ApiResponse::STATUS_OK,
        ];
    }


    public function show(Request $request)
    {
        
    }

    public function update(Request $request,Module $module)
    {
         //validate
        $validated=$request->validate([
            'name' => ['required', 'max:25','unique:modules,name,'.$module->id.',id,deleted_at,NULL'],
        ]);
        //create user`
        $module->update([
            'name' => $request->name,
            'is_main' => $request->is_main,
            'have_workflow' => $request->have_workflow,
        ]);
        //redirect back to Users
        return [
            'data'=>Module::all(),
            'message'=> 'Update module successfully ',
            'snackColor'=> 'success',
            "status" => ApiResponse::STATUS_OK,
        ];
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return [
            'message'=> 'Delete module successfully ',
            'snackColor'=> 'red',
            "status" => ApiResponse::STATUS_OK,
        ];
    }
}
