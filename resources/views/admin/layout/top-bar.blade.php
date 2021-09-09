<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
             @if(Auth::user()->is_admin==1)
            <a class="navbar-brand" href="{{ route('ds.dashboard') }}">Pak Company - Admin Panel</a>
           @else
           <a class="navbar-brand" href="{{ route('ds.dashboard') }}">Pak Company - Admin Panel</a>
           @endif
        </div>
    </div>
</nav>