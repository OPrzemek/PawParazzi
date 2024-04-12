<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Add Photo</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/photos/save" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="pet_id" name="pet_id" value="{{ $pet->id }}" readonly required>
                <p>
                    <label for="pet">Your pet:</label>
                    <input type="text" id="pet" value="{{ $pet->name}}" readonly required>
                </p>
                <p>
                    <label for="title">Title:</label>
                    <input id="title" name="title" required>
                </p>
                <p>
                    <label for="desc">Description:</label>
                    <input id="desc" name="desc" required>
                </p>
                <p>
                    <label for="image">Image:</label>
                    <input type="file" name="image">
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
