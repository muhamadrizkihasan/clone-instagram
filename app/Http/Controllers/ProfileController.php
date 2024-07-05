<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->orderByDesc('created_at')->simplePaginate(5);
        $data1 = [
            'photos' => [
                'fyodor.JPG',
                'gojo.jpg',
                'inumaki.jpg',
                'kaneki.jpg',
                'killua.jpg',
                'makima.jpg',
                'meliodas.jpg',
                'senku.jpg',
            ], 
            'names' => [
                'fyodor',
                'gojo',
                'inumaki',
                'kaneki',
                'killua',
                'makima',
                'meliodas',
                'senku',
            ]
        ];

        $data2 = [
            'photos' => [
                'shimazaki.jpg',
                'tanjiro.jpg',
                'yona.jpg',
                'violet.jpg',
                'yuu.jpg',
            ],
            'names' => [
                'shimazaki',
                'tanjiro',
                'yona',
                'violet',
                'yuu',
            ],
        ];

        return view('profil.index', compact('posts', 'data1', 'data2'));
    }

    public function profile($username)
    {
        $user = User::where('user_name', $username)->first();

        return view('profil.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($username)
    {
        $user = User::where('user_name', $username)->first();
        $posts = Post::where('user_id', $user->id)->orderByDesc('created_at')->get();

        return view('profil.detail', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('photo_profile')) {
            $photo_profile = $request->file('photo_profile');
            $filename = date('YmdHis') . '_' . $photo_profile->getClientOriginalName();
            $photo_profile->move(public_path('storage/photo_profiles'), $filename);
        }

        User::where('id', $id)->update([
            'email' => $request->email,
            'full_name' => $request->full_name,
            'user_name' => $request->user_name,
            'photo_profile' => $filename,
        ]);

        return redirect()->route('instagram.index')->with('success', 'Anda berhasil mengubah profil.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
