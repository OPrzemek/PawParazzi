<!DOCTYPE html>
<html lang="pl">
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <div class="photo-list">
                @foreach($photo as $p)
                    <div class="photo-item">
                        <a href="<?=config('app.url'); ?>/photos/detailed/{{ $p->id }}">
                            <img src="{{ asset('storage/'.$p->name) }}" alt="{{ $p->title }}">
                        </a>
                        <div class="photo-details">
                            <div class="photo-top">
                                <div class="photo-title">{{ $p->title }}</div>
                                <div class="photo-username">{{ $p->pet->user->name}}</div>
                            </div>
                            <div>Created at: {{ $p->created_at }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>