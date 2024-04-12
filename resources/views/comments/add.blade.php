<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Add Comment</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/comments/save" method="post">
                @csrf
                <p>
                    <label for="user_id">Your id:</label>
                    <input id="user_id" name="user_id" value="{{ $user->id }}" readonly required>
                </p>
                <p>
                    <label for="photo_id">Photo id:</label>
                    <input id="photo_id" name="photo_id" value="{{ $photo->id }}" readonly required>
                </p>
                <p>
                    <label for="desc">Description:</label>
                    <input id="desc" name="desc" required>
                </p>
                <p><button type="submit" class="btn btn-primary mb-2">Save</button></p>
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
