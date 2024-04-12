<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Edit Photo</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/photos/update/{{ $photo->id }}" method="post">
                @csrf
                <input type="hidden" id="id" name="id" value="{{ $photo->id }}" readonly required>
                <input type="hidden" id="pet_id" name="pet_id" value="{{ $photo->pet_id }}" readonly required>
                <p>
                    <label for="pet_id">Pet:</label>
                    <input id="pet_id" name="pet_id" value="{{ $photo->pet->name }}" readonly required>
                </p>
                <p>
                    <label for="title">Title:</label>
                    <input id="title" name="title" value="{{ $photo->title }}" required>
                </p>
                <p>
                    <label for="desc">Description:</label>
                    <input id="desc" name="desc" value="{{ $photo->desc }}" required>
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
