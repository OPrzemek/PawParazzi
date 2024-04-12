<!DOCTYPE html> 
<html lang="pl"> 
    @include('partials.head') 
    <body> 
        @include('partials.navi') 
        <div id="zawartosc">
            <h2>Message</h2>
            <h3> {{ $message }}</h3>
        </div>
    </body>
</html>