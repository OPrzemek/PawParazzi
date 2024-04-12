<nav>
    <div>
        <div class="navi">
            <a href="<?=config('app.url'); ?>/"><img src="{{ asset('storage/paw.png') }}" alt=""></a>
            @if (Auth::check())
                <a href="<?=config('app.url'); ?>/users/menu">{{ Auth::user()->name}}</a>
            @endif
            @can('admin_area')
                <a href="<?=config('app.url'); ?>/users/list"><p>Users List</p></a>
                <a href="<?=config('app.url'); ?>/categories/list">Categories List</a>
                <a href="<?=config('app.url'); ?>/pets/list">Pets List</a>
                <a href="<?=config('app.url'); ?>/photos/list">Photos List</a>
                <a href="<?=config('app.url'); ?>/comments/list">Comments List</a>
                <a href="<?=config('app.url'); ?>/categories/add">Add Category</a>  
            @endcan
            <form class="Searchbar-form" action="<?=config('app.url'); ?>/search" method="get">
                <input placeholder="Search for: images, #tags, @users" type="text" class="Searchbar-textInput" name="q" value="" style="height: 36px;">
                <button type="submit" class="Searchbar-submitInput"><img class="search" src="https://s.imgur.com/desktop-assets/desktop-assets/icon-search.3bca12abe700ae5ca910.svg"></button>
            </form>
            @if(Auth::check())
                <a href="<?=config('app.url'); ?>/wyloguj" class="btn-login">Log out</a>
            @else
                <a href="<?=config('app.url'); ?>/loguj" class="btn-login">Login</a>
            @endif
        </div>
    </div>
</nav>