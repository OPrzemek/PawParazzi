<!DOCTYPE html> 
<html lang="pl"> 
    @include('partials.head') 
    <body> 
        @include('partials.navi') 
        <div id="zawartosc">
            <h2>{{ $photo->title }}</h2>
            <div><img src="{{ asset('storage/'.$photo->name) }}" alt="{{ $photo->title }}" id="photo-detailed"></div>
            <h5>{{ $photo->desc }}</h5>
            <div><a href="<?=config('app.url'); ?>/comments/add/{{ $photo->id }}" class="btn-comment">Comment</a></div>
            @foreach($photo->comments as $c)
                <div class="comment">
                    <h4 class="comment-username">{{ $c->user->name }}</h4>
                    <div class="comment-description">{{ $c->desc }}</div>
                </div>
            @endforeach
        </div>
    </body>
</html>