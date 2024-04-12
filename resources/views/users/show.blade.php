<!DOCTYPE html>
<html>
    @include('partials.head')
    <body>
        @include('partials.navi')
        <div id="zawartosc">
            <h2>Confirmation - Delete id: {{ $user->id }}</h2>
            <form class="form-inline" action="<?=config('app.url'); ?>/users/delete/{{ $user->id }}" method="post">
                @csrf
                <p>
                    <label for="id">Id:</label>
                    <input id="id" name="id" value="{{ $user->id }}" readonly>
                </p>
                <p>
                    <label for="nick">Nick:</label>
                    <input id="nick" name="nick" value="{{ $user->name }}" readonly required>
                </p>
                <p>
                    <label for="email">Gender:</label>
                    <input id="email" name="email" value="{{ $user->email }}" readonly required>
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
