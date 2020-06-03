<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('posts', ['posts' => Post::with('user')->get(), 'user' => $user]);
    }

    public function show(Post $post, Request $request)
    {
        $user = $request->user();

        if (!$user || $user->id !== $post->user_id) {
            return redirect('/posts');
        }

        return view('postInfo', ['post' => $post]);
    }

    public function store(CreatePostRequest $request): RedirectResponse
    {

        if (!$user = $request->user()) {
            die("user unauthorized");
        }

        $validatedData = $request->validated();

        $post = new Post();

        $post->title = Arr::get($validatedData, 'title', 'Unknown');
        $post->description = Arr::get($validatedData, 'description', 'Unknown');
        $post->user_id = $request->user()->id;
        $post->save();

        return redirect('/posts');
    }

    public function update(Post $post, UpdatePostRequest $request)
    {

        /** @var User $user */
        $user = $request->user();

        if (!$user || $user->id !== $post->user_id) {
            return redirect('/posts');
        }

        $validatedData = $request->validated();

        if (!$validatedData) {
            return redirect('/posts');
        }

        if ($newTitle = Arr::get($validatedData, 'title')) {
            $post->title = $newTitle;
        }

        if ($newDescription = Arr::get($validatedData, 'description')) {
            $post->description = $newDescription;
        }

        $post->save();

        return redirect('/posts');
    }

    /**
     * @param Post $post
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Post $post, Request $request)
    {
        $user = $request->user();

        if (!$user || $user->id !== $post->user_id) {
            return redirect('/posts');
        }

        $post->delete();

        return redirect('/posts');
    }
}