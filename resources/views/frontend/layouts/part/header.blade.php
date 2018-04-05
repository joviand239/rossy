<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{!! route('home') !!}">
            <img class="logo" src="{!! url('/') !!}/assets/frontend/images/logo.png" alt="Logo {!! env('PROJECT_NAME') !!}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {!! isActiveRoute(['home']) !!}">
                    <a class="nav-link" href="{!! route('home') !!}">Home</a>
                </li>
                <li class="nav-item {!! isActiveRoute(['product']) !!}">
                    <a class="nav-link" href="{!! route('product', ['type' => 'popular']) !!}">Product</a>
                </li>
                <li class="nav-item {!! isActiveRoute(['about']) !!}">
                    <a class="nav-link" href="{!! route('about') !!}">About Us</a>
                </li>
                <li class="nav-item {!! isActiveRoute(['blog']) !!}">
                    <a class="nav-link" href="{!! route('blog') !!}">Blog</a>
                </li>
                <li class="nav-item {!! isActiveRoute(['course']) !!}">
                    <a class="nav-link" href="{!! route('course') !!}">Baking Course</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
                <a href="{!! route('contact') !!}" class="btn secondary-btn italic">CONTACT US</a>
            </form>
        </div>
    </div>
</nav>