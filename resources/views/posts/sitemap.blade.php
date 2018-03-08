<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{$url}}</loc>
    </url>
    <url>
        <loc>{{$url}}/all</loc>
    </url>
    <url>
        <loc>{{$url}}info</loc>
    </url>
    <url>
        <loc>{{$url}}/register</loc>
    </url>
    <url>
        <loc>{{$url}}/login</loc>
    </url>
    <url>
        <loc>{{$url}}/settings</loc>
    </url>
    @foreach($categories as $category)
        <url>
            <loc>{{$url}}/categories/{{$category->name}}</loc>
        </url>
    @endforeach

    @foreach($posts as $post)
        <url>
            <loc>{{$url}}/posts/show/{{$post->id}}</loc>
        </url>
    @endforeach
</urlset>
