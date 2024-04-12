<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Edit Module Crew</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/categories/update/{{ $category->id }}" method="post">
                @csrf
                <p>
                    <label for="id">Id:</label>
                    <input id="id" name="id" value="{{ $category->id }}" readonly>
                </p>
                <p>
                    <label for="name">Name:</label>
                    <input id="name" name="name" value="{{ $category->name }}" size="10" required>
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
