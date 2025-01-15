<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      padding: 0;
      margin: 0;
      background: #f4f4f9;
      color: #333;
    }

    .header {
      padding: 20px;
      text-align: center;
      background: #007bff;
      color: white;
      font-size: 30px;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .header a {
      text-decoration: none;
      color: white;
      font-size: 18px;
      background: #0056b3;
      padding: 10px 20px;
      border-radius: 5px;
      margin-top: 10px;
      display: inline-block;
      transition: background 0.3s;
    }

    .header a:hover {
      background: #003d82;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      margin: 20px 0;
    }

    .leftcolumn {
      flex: 3;
      padding: 20px;
    }

    .rightcolumn {
      flex: 1;
      padding: 20px;
    }

    .card {
      background: white;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card h2 {
      margin: 0 0 10px;
      font-size: 24px;
      color: #007bff;
    }

    .card h5 {
      color: #666;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .card p {
      line-height: 1.6;
      margin-bottom: 15px;
    }

    .card a {
      text-decoration: none;
      color: #007bff;
      font-size: 16px;
      margin-right: 15px;
      transition: color 0.3s;
    }

    .card a:hover {
      color: #0056b3;
    }

    .fakeimg {
      background: #ccc;
      height: 100px;
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      color: #555;
    }
    .fakeimg img {
    width: 100%;
    height: 100%;
    }
    .footer {
      text-align: center;
      background: #ddd;
      padding: 20px;
      margin-top: 20px;
      font-size: 14px;
    }

    @media (max-width: 800px) {
      .row {
        flex-direction: column;
      }

      .leftcolumn, .rightcolumn {
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<div class="header">
  <h2>Laravel Blog</h2>
  <a href="{{ route('blogs.create') }}">Create Post</a>
</div>

<div class="row">
  <div class="leftcolumn">
    @foreach($posts as $post)
      <div class="card">
        <h2>{{ $post->title }}</h2>
        <h5>Published on {{ $post->created_at->format('M d, Y') }}</h5>
        <p>{{ $post->article }}</p>
        <a href="{{ route('blogs.edit', $post->id) }}">Edit</a>
        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $post->id }}').submit();">Delete</a>

        <form id="delete-form-{{ $post->id }}" action="{{ route('blogs.destroy', $post->id) }}" method="POST" style="display: none;">
          @csrf
          @method('DELETE')
        </form>
      </div>
    @endforeach
  </div>

  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvWr4ocZL5-sVqxzWjRkHEi-1EBx1V7h72CA&s"></div>
      <p>Hi! I'm a blogger who loves to write about Laravel and web development. Stay tuned for more!</p>
    </div>
    <div class="card">
      <h3>Popular Posts</h3>
      <div class="fakeimg"><img src="https://techcrams.com/wp-content/uploads/2022/09/7-ways-a-blog-can-help-your-business-right-now-5f3c06b9eb24e.png"></div><br>
      <div class="fakeimg"><img src="https://nicholasrossis.me/wp-content/uploads/2017/04/BLOG01.jpg"></div><br>
      <div class="fakeimg"><img src="https://brands-up.ch/public/images/uploads/97bc703442fa9a38ed92e3047355fb18486c1219.png"></div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Follow me on social media for updates and tutorials!</p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
  <p>&copy; 2025 Laravel Blog. All rights reserved.</p>
</div>

</body>
</html>
