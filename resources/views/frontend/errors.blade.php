<div class="container mt-3">
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ( session('success') )
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ( session('danger') )
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
    @endif

    @if ( session('warning') )
        <div class="alert alert-warning" role="alert">
            {{ session('warning') }}
        </div>
    @endif
    @if ( session('error') )
        <div class="alert alert-warning" role="alert">
            {{ session('error') }}
        </div>
    @endif
</div>
