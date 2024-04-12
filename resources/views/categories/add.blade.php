<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Add Category</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/categories/save" method="post">
                @csrf
                <p>
                    <label for="name">Name:</label>
                    <input id="name" name="name" required>
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
