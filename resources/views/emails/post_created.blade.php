<!DOCTYPE html>
<html>
<head>
    <title>New Blog Post Created</title>
</head>
<body>
    <h1>A new blog post has been created!</h1>
    <p>Title: {{ $post->title }}</p>
    <p>Author: {{ $post->author->name }}</p> <!-- Assuming you have an author relationship defined in the Post model -->
    <p>Content: {{ $post->content }}</p>
</body>
</html>
