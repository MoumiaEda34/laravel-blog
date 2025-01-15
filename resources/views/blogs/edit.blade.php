<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="{{ route('blogs.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ $post->title }}"><br><br>
        
        <label for="article">Content:</label><br>
        <textarea id="article" name="article" rows="5" cols="40">{{ $post->article }}</textarea><br><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
