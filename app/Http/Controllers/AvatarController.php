<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(AvatarUpdateRequest $request)
    {
        $path = $request->file('avatar')->store('avatars', 'public');

        if ($oldAvatar = $request->user()->avatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update([
            'avatar' => $path
        ]);

        return redirect(route('profile.edit'));
    }
}
