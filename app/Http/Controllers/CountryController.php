<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Resources\CountryCollection;
use Illuminate\Support\Facades\Auth;

class CountryController extends Controller
{
    
    public function __construct()
    {
        $this->authorizeResource(Country::class, 'country');
    }

    public function index()
    {
        return new CountryCollection(Country::orderBy('id')->get());
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
            'nationality_en' => ['required'],
        ]);
        $country=Country::create([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
            'nationality_en' => $request->nationality_en,
            'created_by'=>Auth::user()->id,
        ]);
        return [
            'message'=> 'Create Country successfully ',
            'snackColor'=> 'success',
        ];
    }

    public function update(Request $request, Country $country)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
            'nationality_en' => ['required'],
        ]);
        $country->update([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
            'nationality_en' => $request->nationality_en,
        ]);
        return [
            'message'=> 'Update Country successfully ',
            'snackColor'=> 'success',
        ];
    }

    public function destroy(Country $country)
    {
       
        $country->update([
            'deleted_by' => Auth::user()->id,
        ]);
        $country->delete();
        return [
            'message'=> 'Delete Country successfully ',
            'snackColor'=> 'success',
        ];
    }
}
