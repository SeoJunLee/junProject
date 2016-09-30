<h1>{{ $post->title }}</h1>
<p>{{ $post->title }}</p>
{{--<p>{{ $post->user->name }}</p>--}}
<p>{{ $post->created_at->timezone('Aisa/Seoul') }}</p>