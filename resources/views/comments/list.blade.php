<!DOCTYPE html> 
<html lang="pl"> 
    @include('partials.head') 
    <body> 
        @include('partials.navi') 
        <div id="zawartosc">
            <h2>Comment List</h2>
            <table>
            <thead>
                <tr> <th>ID</th> <th>Photo Title</th> <th>Username</th> <th>Description</th> </tr>
            </thead>
            <tbody>
                @foreach($comment as $c)
                <tr> 
                    <td>{{$c->id}}</td>
                    <td>{{$c->photo->title}}</td>
                    <td>{{$c->user->name}}</td>
                    <td>{{$c->desc}}</td>
                    <td><a href="<?=config('app.url'); ?>/comments/edit/{{ $c->id }}" class="btn-edit">Edit</a></td>
                    <td><a href="<?=config('app.url'); ?>/comments/show/{{ $c->id }}" class="btn-del">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </body>
</html>