<aside class="widget widget_categories">
    <h3 class="widget-title">Categories</h3>
    <ul>
    @foreach($bcat as $cat)
        <li class="cat-item cat-item-6"><a href="/category/{{ $cat->id }}">{{ $cat->category }}</a></li>
    @endforeach
    </ul>
</aside>

<aside class="widget widget_recent_entries">
    <h3 class="widget-title">Recent Posts</h3>
    <ul>
    @foreach($blog as $blogs)
        <li><a href="/{{ $blogs->id }}">{{ $blogs->title }}</a></li>
    @endforeach
    </ul>
</aside>