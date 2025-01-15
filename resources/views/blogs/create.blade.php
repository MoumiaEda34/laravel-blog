<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Form</title>
<meta name="description" content="">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.0.6-development-only.js"></script>
<style>
    /* General Body Styling */
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Main container */
    #main {
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 20px;
        width: 50%;
        margin: 0 auto;
    }

    /* Header Styling */
    header {
        text-align: center;
        margin-bottom: 20px;
    }

    header h1 {
        font-size: 2em;
        font-weight: 600;
        color: #333;
    }

    header a {
        text-decoration: none;
        color: #007BFF;
        font-weight: 600;
        font-size: 1.2em;
    }

    /* Form styling */
    .submit form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: 600;
        color: #333;
    }

    input[type="text"], textarea {
        padding: 10px;
        font-size: 1em;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 12px;
        font-size: 1.1em;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Banner message styling */
    #banner-message {
        background-color: #28a745;
        color: white;
        padding: 10px;
        text-align: center;
        margin-top: 20px;
        border-radius: 4px;
        display: none;
    }

    #banner-message h4 {
        margin: 0;
        font-size: 1.2em;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        #main {
            width: 80%;
        }
    }
</style>
</head>
<body>
 <div id="main">
   <main role="main">
    <section class="submit">
      <header>
        <h1>Insert New Blog Entry</h1>
         <a href="{{ route('blogs.index') }}">Back to Home</a>
      </header>   
        <form id="formuno" method="post" action="{{ route('posts.store') }}">
        @csrf
        <p>
        <label for="title">Title: </label>
        <input name="title" accept="text/plain" placeholder="Enter title" type="text" class="wbox" id="title">
        </p>
        <p>
        <label for="article">Article: </label>
        <textarea name="article" placeholder="Enter article" cols="60" rows="8" class="wbox" id="article"></textarea>
        </p>
        <p>
        <input type="submit" name="insert" value="Insert New Entry" id="insert">
        </p>
        </form>
      </section>
   </main>
  </div>   
     <article id="banner-message">
       <h4>Blog updated</h4>
     </article>
<script>
  $(document).ready(function(){
    /* Function to show and hide main navigation contact box */
    $("#banner-message").hide();

    $('#insert').click(function() { 
        $(this).next("#banner-message").find("h4").fadeToggle(400);
        return false;
    }); 
})
</script>
</body>
</html>
