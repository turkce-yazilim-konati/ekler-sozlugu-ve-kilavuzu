<?php

namespace App\Http\Controllers\Sayfa;

use App\Http\Controllers\Controller;
use App\Models\Ekdizme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EkdizmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekler = Ekdizme::all();
        $user = User::find(Auth::id());
        
        return view('ekdizme', compact('ekler','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $add = new Ekdizme();

            $add->ek = strtolower($request->ek);
            $add->not = $request->not;
            $add->kaynak = $request->kaynak;
            $add->ekleyen = Auth::id();
            $add->aktif = 0;
            $add->save();

            return redirect()->back()->with('success', 'Başarılı');

        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $ek = Ekdizme::find($id);
        if($ek->aktif == 1){ $ek->aktif = 0; }
        else {$ek->aktif = 1;}
        $ek->onaylayan = Auth::id();
        $ek->save();
        
        return redirect()->back()->with('success', $ek->ek.' Onaylandı');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::find(Auth::id());
        $ek = Ekdizme::find($id);

        return view('edit_page.EkdizmeEdit', compact('user','ek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {  
        
        // $regex_name = "/^[a-z][a-z,' ' ]+$/i";
            $regex_name = "/^[a-z][a-z,' ]+$/i";
        if (!preg_match($regex_name, $request->ek)) {
            return redirect()->back()->with('danger', 'Please input a valid name!');

        }else{
            $update = Ekdizme::find($request->id);
            $update->ek = strtolower($request->ek);
            $update->not = $request->not;
            $update->kaynak = $request->kaynak;
            $update->save();
            return redirect('/')->with('success','Ek Güncellendi.  '.$request->ek.'');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
