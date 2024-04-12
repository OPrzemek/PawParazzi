<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Add Pet</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/pets/save" method="post">
                @csrf
                <p>
                    <label for="user_id">Your id:</label>
                    <input id="user_id" name="user_id" value="{{ $user->id }}" readonly required>
                </p>
                <p>
                    <label for="category_id">Category:</label>
                    <select id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label for="breed">Breed:</label>
                    <input id="breed" name="breed" value="unspecified" required>
                </p>
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
