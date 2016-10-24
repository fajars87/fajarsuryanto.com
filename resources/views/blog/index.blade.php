{{ Session::get('message') }}
<h1>My First Blog</h1>
@foreach ($blogs as $blog)
<h2><a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a></h2>
<p>{{ $blog->description }}</p>
<a href="/blog/{{ $blog->id }}/edit">Edit this Post</a>
<hr>
@endforeach