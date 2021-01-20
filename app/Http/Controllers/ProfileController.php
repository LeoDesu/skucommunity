<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(User $user){
        return view('profiles.profile', compact('user'));
    }

    public function edit(User $user){
        $this->authorize('edit', $user->profile);
        return view('profiles.edit', compact('user'));
    }
    public function update(User $user, Request $request){
        $this->authorize('edit', $user->profile);
        if($request->image || $request->about){
            if($request->image){
                $file = $request->file('image');
                $path = $file->storeAs('files/uploads', $file->getFilename().'.'.$file->getClientOriginalExtension(), 'public');
                $image = [ 'image' => $path];
            }
            if($request->about) $about = [ 'about' => $request->about];

            $user->profile->update(array_merge(
                $image ?? [],
                $about ?? []
            ));
        }

        return redirect('/profile/'.$user->id);
    }
}
