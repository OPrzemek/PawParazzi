<!DOCTYPE html> 
<html lang="pl"> 
    @include('partials.head') 
    <body> 
        @include('partials.navi') 
        <div id="zawartosc">
            <h2>Users List</h2>
            <table>
            <thead>
                <tr> <th>ID</th> <th>Nick</th> <th>Is Admin</th> <th>Email</th> </tr>
            </thead>
            <tbody>
                @foreach($user as $u)
                <tr> 
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->is_admin}}</td>
                    <td>{{$u->email}}</td>
                    <td><a href="<?=config('app.url'); ?>/users/show/{{ $u->id }}" class="btn-del">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </body>
</html>