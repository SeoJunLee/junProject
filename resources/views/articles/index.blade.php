<ul>
@foreach($articles as $article)
    <li>
        {{ $article->title }}
        <small>
            {{ $article->user->name }}
        </small>
    </li>
@endforeach
</ul>