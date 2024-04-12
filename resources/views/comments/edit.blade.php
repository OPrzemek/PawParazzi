<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Edit Comment</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/comments/update/{{ $comment->id }}" method="post">
                @csrf
                <p>
                    <label for="id">Id:</label>
                    <input id="id" name="id" value="{{ $comment->id }}" readonly>
                </p>
                <input type="hidden" id="user_id" name="user_id" value="{{ $comment->user_id }}" readonly>
                <p>
                    <label for="photo_id">Photo id:</label>
                    <input id="photo_id" name="photo_id" value="{{ $comment->photo_id }}" required>
                </p>
                <p>
                    <label for="desc">Description:</label>
                    <input id="desc" name="desc" value="{{ $comment->desc }}" required>
                </p>
                <p><button type="submit" class="btn btn-primary mb-2">Update</button></p>
            </form>
            <p>
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </p>
        </div>
    </body>
</html>
