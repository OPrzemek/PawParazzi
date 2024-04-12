<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Edit Pet</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/pets/update/{{ $pet->id }}" method="post">
                @csrf
                <input type="hidden" id="id" name="id" value="{{ $pet->id }}" readonly>
                <input type="hidden" id="user_id" name="user_id" value="{{ $pet->user_id }}" readonly required>
                <input type="hidden" id="category_id" name="category_id" value="{{ $pet->category_id }}" readonly required>
                <p>
                    <label for="breed">Breed:</label>
                    <input id="breed" name="breed" value="{{ $pet->breed }}" required>
                </p>
                <p>
                    <label for="name">Name:</label>
                    <input id="name" name="name" value="{{ $pet->name }}" required>
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
