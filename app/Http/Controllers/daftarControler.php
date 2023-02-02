<?php

namespace App\Http\Controllers;

use App\Models\daftar;
use Illuminate\Http\Request;
use App\Http\Requests\daftarFormRequest;

class daftarControler extends Controller
{
    public function index()
    {
        $daftars = daftar::all();
        return view('daftar.index', compact('daftars'));
    }
    public function create()
    {
        return view('daftar.create');
    }


    public function store(daftarFormRequest $request)
    {
        $data = $request->validated();

        $daftar = daftar::create($data);
        return redirect('/daftar')->with('message', 'daftar added succesfuly');
    }

    public function edit($daftar_id)
    {
        $daftar = daftar::find($daftar_id);
        return view('daftar.edit', compact('daftar'));
    }

    public function update(daftarFormRequest $request, $daftar_id)
    {
        $data = $request->validated(); 
        $daftar = daftar::where('id', $daftar_id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
        ]);
        return redirect('/daftars')->with('message','daftar update sucesfully');
    }

    public function destroy($daftar_id)
    {
        $daftar = daftar::find($daftar_id)->delete();
        return redirect('/daftars')->with('message','daftar delete sucesfully');

    }
}
