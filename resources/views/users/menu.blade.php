<!DOCTYPE html> 
<html lang="pl"> 
    @include('partials.head') 
    <body> 
        @include('partials.navi') 
        <div id="zawartosc">
            <h2>Your pet List <a href="<?=config('app.url'); ?>/pets/add" class="btn-comment">Add your pet</a></h2>
            <table>
            <thead>
                <tr> <th>Category</th> <th>Breed</th> <th>Name</th> </tr>
            </thead>
            <tbody>
                @foreach($pets as $p)
                <tr> 
                    <td>{{$p->category->name}}</td>
                    <td>{{$p->breed}}</td>
                    <td>{{$p->name}}</td>
                    <td><a href="<?=config('app.url'); ?>/pets/edit/{{ $p->id }}" class="btn-edit">Edit</a></td>
                    <td><a href="<?=config('app.url'); ?>/pets/show/{{ $p->id }}" class="btn-del">Delete</a></td>
                    <td><a href="<?=config('app.url'); ?>/users/photos/{{ $p->id }}" class="btn-edit">Photos</a></td>
                    <td><a href="<?=config('app.url'); ?>/photos/add/{{ $p->id }}" class="btn-comment">Add photo</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </body>
</html>