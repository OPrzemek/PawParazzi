<!DOCTYPE html> 
<html lang="pl"> 
    @include('partials.head') 
    <body> 
        @include('partials.navi') 
        <div id="zawartosc">
            <h2>Photo List</h2>
            <table>
            <thead>
                <tr> <th>ID</th> <th>Pet Name</th> <th>Created at</th> <th>Title</th> <th>Desc</th> <th>Like</th> <th>Photo</th> </tr>
            </thead>
            <tbody>
                @foreach($photo as $p)
                <tr> 
                    <td>{{$p->id}}</td>
                    <td>{{$p->pet->name}}</td>
                    <td>{{$p->created_at}}</td>
                    <td>{{$p->title}}</td>
                    <td>{{$p->desc}}</td>
                    <td>{{$p->like}}</td>
                    <td><img src="{{ asset('storage/'.$p->name) }}" alt="zdjęcie xd" width="300px" height="300px"></td>
                    <td><a href="<?=config('app.url'); ?>/photos/edit/{{ $p->id }}" class="btn-edit">Edit</a></td>
                    <td><a href="<?=config('app.url'); ?>/comments/add/{{ $p->id }}" class="btn-comment">Comment</a></td>
                    <td><a href="<?=config('app.url'); ?>/photos/show/{{ $p->id }}" class="btn-del">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </body>
</html>