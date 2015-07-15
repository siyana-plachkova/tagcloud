<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- If you delete this meta tag World War Z will become a reality -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        TagCloud
        @yield('title')
    </title>

    <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/foundation.css">

    <!-- If you are using the gem version, you need this only -->
    <link rel="stylesheet" href="/css/app.css">

    <script src="/js/vendor/modernizr.js"></script>

</head>
<body>
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="{{ URL::to('index') }}">TagCloud</a></h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
    <!-- Right Nav Section -->
        <ul class="right">
            <li><a href="{{ URL::to('photos') }}">Popular Photos</a></li>
            <li class="has-dropdown">
            <a href="#">Most Popular Tags</a>
        <ul class="dropdown">
            <li><a href="{{ URL::to('tags/last-hour') }}">Popular from last hour</a></li>
            <li><a href="{{ URL::to('tags/last-day') }}">Popular from last day</a></li>
            <li><a href="{{ URL::to('tags/last-week') }}">Popular from last week</a></li>
            <li><a href="{{ URL::to('tags/cloud') }}">Our Tag Cloud</a></li>
        </ul>
      </li>
    </ul>


        </section>
    </nav>

    <section role="main" class="scroll-container">
        <div class="row">
            @yield('body')
        </div>
    </section>

    <script src="/js/vendor/jquery.js"></script>
    <script src="/js/foundation.min.js"></script>
    <script>
    $(document).foundation();
    </script>

</body>
</html>