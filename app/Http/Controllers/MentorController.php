<?php

namespace App\Http\Controllers;

use App\Models\mentor;
use Illuminate\Http\Request;
use App\Http\Requests\MentorFormRequest;

class MentorController extends Controller
{
    public function create()
    {
        return view('mentor.create');
    }
    
    public function index()
    {
        $mentor = mentor::all();
        return view('mentor.index', compact('mentor'));
    }

    public function store(MentorFormRequest $request)
    {
        $data = $request->validated();

        $mentor = mentor::create($data);
        return redirect('/mentor')->with('message', 'daftar added succesfuly');
    }

    public function edit($mentor_id)
    {
        $mentor = mentor::find($mentor_id);
        return view('mentor.edit', compact('mentor'));
    }

    public function update(MentorFormRequest $request, $mentor_id)
    {
        $data = $request->validated(); 
        $mentor = mentor::where('id', $mentor_id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
        ]);
        return redirect('/mentors')->with('message','mentor update sucesfully');
    }

    public function destroy($mentor_id)
    {
        $mentor = mentor::find($mentor_id)->delete();
        return redirect('/mentors')->with('message','mentor delete sucesfully');

    }
}
