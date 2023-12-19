<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $user = User::first();
        $skillsFrontend = Skill::whereIn('type', ['Frontend'])->get();
        $skillsBackend = Skill::whereIn('type', ['Backend'])->get();

        return view('index', [
            'user' => $user,
            'frontend' => $skillsFrontend,
            'backend' => $skillsBackend
        ]);
    }
    public function edit()
    {
        $user = User::first();
        $skillsFrontend = Skill::whereIn('type', ['Frontend'])->get();
        $skillsBackend = Skill::whereIn('type', ['Backend'])->get();

        return view('edit', [
            'user' => $user,
            'frontend' => $skillsFrontend,
            'backend' => $skillsBackend
        ]);
    }

    // Controller for updating the header //

    public function updateHeader(Request $request)
    {
        $filename = '';
        $user = User::first();

        if ($request->hasFile('profile_image')) {
            $filename = $request->getSchemeAndHttpHost() . '/assets/' . time() . '.' . $request->profile_image->extension();

            $request->profile_image->move(public_path('/assets/'), $filename);
            $user->profile_image = $filename;
        }

        $user->profile_name = $request->profile_name;
        $user->career = $request->career;
        $user->save();
        return redirect()
            ->route('edit')
            ->with('success', "Header Section Updated Successfully!");
    }

    public function updateAbout(Request $request)
    {
        $filename = '';
        $user = User::first();

        if ($request->hasFile('about_image')) {
            $filename = $request->getSchemeAndHttpHost() . '/assets/' . time() . '.' . $request->about_image->extension();

            $request->about_image->move(public_path('/assets/'), $filename);
            $user->about_image = $filename;
        }

        $user->best_skill = $request->best_skill;
        $user->education = $request->education;
        $user->about = $request->about;
        $user->save();
        return redirect()
            ->route('edit')
            ->with('success', "About Section Updated Successfully!");
    }

    public function addSkill(Request $request)
    {

        $validated = $request->validate([
            'skill' => 'required|string|min:1',
            'type' => 'required|string|min:1',
            'level' => 'required|string|min:1'
        ]);


        Skill::create([
            'skill' => $validated['skill'],
            'type' => $validated['type'],
            'level' => $validated['level']
        ]);

        // You can also return a response or redirect as needed
        return redirect()
            ->route('edit')
            ->with('success', "Added Skill Successfully");
    }

    public function deleteSkill($id)
    {
        $skill = Skill::findOrFail($id);

        $skill->delete();

        return redirect()
            ->route('edit')
            ->with('success', "Skill Deleted Successfully!");
    }
}
