<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'skill_name' => 'required|unique:skills,skill_name',
        'status' => 'required'
    ]);

    Skill::create([
        'skill_name' => $request->skill_name,
        'status' => $request->status,
    ]);

    return redirect('/admin/skills')
            ->with('success','Skill Added Successfully');
}

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);

        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);

        $skill->update([

            'skill_name' => $request->skill_name,

            'status' => $request->status

        ]);

        return redirect('/admin/skills')
                ->with('success','Skill Updated Successfully');
    }

    public function delete($id)
    {
        Skill::findOrFail($id)->delete();

        return redirect('/admin/skills')
                ->with('success','Skill Deleted Successfully');
    }
}