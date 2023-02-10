<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Resources\LanguageCollection;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Language::class, 'language');
    }

    public function index()
    {
        return new LanguageCollection(Language::orderBy('id')->get());
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
        ]);
        $language=Language::create([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
            'created_by' => Auth::user()->id,
        ]);
        return [
            'message'=> 'Create Language successfully ',
            'snackColor'=> 'success',
        ];
    }

    public function update(Request $request, Language $language)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
        ]);
        $language->update([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
        ]);
        return [
            'message'=> 'Update Language successfully ',
            'snackColor'=> 'success',
        ];
    }

    public function destroy(Language $language)
    {
       
        $language->update([
            'deleted_by' => Auth::user()->id,
        ]);
        $language->delete();
        return [
            'message'=> 'Delete Language successfully ',
            'snackColor'=> 'success',
        ];
    }
}
