<!DOCTYPE html> 
<html lang="pl"> 
    @include('partials.head') 
    <body> 
        @include('partials.navi') 
        <div id="zawartosc">
            <h2>Pet List</h2>
            <table>
            <thead>
                <tr> <th>ID</th> <th>Owner</th> <th>Category</th> <th>Breed</th> <th>Name</th> </tr>
            </thead>
            <tbody>
                @foreach($pet as $p)
                <tr> 
                    <td>{{$p->id}}</td>
                    <td>{{$p->user->name}}</td>
                    <td>{{$p->category->name}}</td>
                    <td>{{$p->breed}}</td>
                    <td>{{$p->name}}</td>
                    <td><a href="<?=config('app.url'); ?>/pets/edit/{{ $p->id }}" class="btn-edit">Edit</a></td>
                    <td><a href="<?=config('app.url'); ?>/pets/show/{{ $p->id }}" class="btn-del">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </body>
</html>