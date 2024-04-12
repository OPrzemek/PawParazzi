<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Confirmation - Delete id: {{ $photo->id }}</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/photos/delete/{{ $photo->id }}" method="post">
                @csrf
                <input type="hidden" id="id" name="id" value="{{ $photo->id }}" readonly>
                <input type="hidden" id="pet_id" name="pet_id" value="{{ $photo->pet_id }}" readonly required>
                <p>
                    <label for="title">Title:</label>
                    <input id="title" name="title" value="{{ $photo->title }}" readonly required>
                </p>
                <p>
                    <label for="desc">Description:</label>
                    <input id="desc" name="desc" value="{{ $photo->desc }}" readonly required>
                </p>
                <p><button type="submit" class="btn btn-primary mb-2">Delete</button></p>
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
