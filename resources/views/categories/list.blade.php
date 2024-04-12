<!DOCTYPE html> 
<html lang="pl"> 
    @include('partials.head') 
    <body> 
        @include('partials.navi') 
        <div id="zawartosc">
            <h2>Categories List</h2>
            <table>
            <thead>
                <tr> <th>ID</th> <th>Name</th> </tr>
            </thead>
            <tbody>
                @foreach($category as $c)
                <tr> 
                    <td>{{$c->id}}</td>
                    <td>{{$c->name}}</td>
                    <td><a href="<?=config('app.url'); ?>/categories/edit/{{ $c->id }}" class="btn-edit">Edit</a></td>
                    <td><a href="<?=config('app.url'); ?>/categories/show/{{ $c->id }}" class="btn-del">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </body>
</html>