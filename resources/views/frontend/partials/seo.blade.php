@php
if (isset($title)) {
    $title = 'Super Pet | ' . $title;

} else {
    $title = 'Super Pet | Best Pet Store in Egypt';
}
@endphp
<!-- Title and Description -->
<title>@yield('title', $title)</title>
<meta name="description"
    content="@yield('meta_description', 'Super Pet is a pet store that sells different types of pets, accessories, toys, and supplies. Shop online in Egypt.')">
<meta name="keywords"
    content="pet store, pet shop egypt, online pet store, pet accessories, super pet, قطط, كلاب, مستلزمات حيوانات">
<meta name="author" content="Super Pet">

<!-- Canonical URL -->
<link rel="canonical" href="{{ url()->current() }}/" />

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/website/img/logo.png">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('og_title', $title)">
<meta property="og:description"
    content="@yield('og_description', 'Find the best pets and pet supplies in Egypt at Super Pet.')">
<meta property="og:image" content="{{ url('/') }}/website/img/logo.png">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta name="twitter:title" content="@yield('twitter_title', $title)">
<meta name="twitter:description"
    content="@yield('twitter_description', 'Find the best pets and pet supplies in Egypt at Super Pet.')">
<meta name="twitter:image" content="{{ url('/') }}/website/img/logo.png">