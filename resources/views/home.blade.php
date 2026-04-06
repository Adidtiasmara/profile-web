<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
</head>
<body>

    <h1>{{ $profile->name }}</h1>
    <h3>{{ $profile->title }}</h3>

    <p>{{ $profile->bio }}</p>

    @if($profile->photo)
        <img src="{{ asset('storage/' . $profile->photo) }}" width="150">
    @endif

    <h2>GitHub Stats</h2>
    <img src="https://github-readme-stats.vercel.app/api?username={{ $profile->github_username }}">

</body>
</html>