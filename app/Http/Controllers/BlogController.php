<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    // Show the list of posts (index)
    // Show the list of all posts
    public function index()
    {
        // Retrieve all posts from the database
        $posts = Post::all();

        // Pass the posts to the view
        return view('blogs.index', compact('posts'));
    }

    // Show the form to create a new post
    public function create()
    {
        return view('blogs.create');
    }

    // Store the new post in the database
    public function store(Request $request)
    {
        // Validate the input form
        $request->validate([
            'title' => 'required|string|max:255',
            'article' => 'required|string',
        ]);

        // Save the data to the database
        Post::create([
            'title' => $request->input('title'),
            'article' => $request->input('article'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Post created successfully');
    }
    public function destroy($id)
{
    $post = Post::findOrFail($id);
    $post->delete();

    return redirect()->route('blogs.index')->with('success', 'Post deleted successfully!');
}

    public function edit($id)
{
    $post = Post::findOrFail($id); // Fetch the post by ID
    return view('blogs.edit', compact('post')); // Pass the post to the edit view
}

    public function update(Request $request, $id)
    {
    $request->validate([
    'title' => 'required|max:255',
    'article' => 'required',
    ]);

    $post = Post::findOrFail($id);
    $post->title = $request->input('title');
    $post->article = $request->input('article');
    $post->save();

    return redirect()->route('blogs.index')->with('success', 'Post updated successfully!');
    }

}
