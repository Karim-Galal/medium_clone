@props(['user', 'size'=>'w-12 h-12'])
<div>
    {{-- {{dd($user)}} --}}
    <img
        {{-- src="{{ $user->image === null ?  $user->image : 'https://dummyimage.com/32/9af4ac/gray&text='.mb_substr(trim($user->name ), 0,1)}}" --}}
        src="{{ $user->image  ??  'https://dummyimage.com/32/9af4ac/gray&text='.mb_substr(trim($user->name ), 0,1)}}"
        {{-- src="{{ $user->profile_image}}" --}}

        {{-- src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAApCAYAAABHomvIAAABuElEQVR4AeyWUXKDMAxETe5/gp6hx+u/68dGg4wJtTCd4cO0K7RrI+0oZpLX1893fjJe6eHXNDj6Ac0JzgmOTmD0+XkG5wRHJ5BSLn/7KnkvfOShM6iyilTcMlgLW1/ckjSvuMWDNGRQZRWptWVqi+ahdUUmCYz5fWd5yCCFcj4y83fbnNgDqNKPsMFlOW6Sq54wIJHs+Cmtn8Wwwa0YbYEUbyBfnJYq1XHA4FLeTm+LwnpjvYriObsiGDCYypxy4uCXsP7nongzGXUNJNcwZDAVQ8A8eHOpXPBlIRZy8X/QoLq2Fsyy1kfiLQZbO5zPEVvbs7cYbCeY1g8/3XDdYtB8MElgXPdWkd4XbzXIJEHdulXq9XN22WA9F2uCCoxzhwPyOC4azM0Zy2tvpgVgAJEXBo08josG24a1AgMytGXikRg2qLkobo32XCu1ypee9EgMG1RxmwkWgHGtWkRlVRymLBK7DdrvwLoNDPS1tJ1Wq+epboP6St3moeJ7LtVHXhH/g4Jctfyuz3m3wbS+tzaD9L72/C1XN/YAE8mB8fN7wOB5of9anQZHJzsnOCc4OoHR5x9/Bn8BAAD//wE/6iAAAAAGSURBVAMAmnLGOx9BT3wAAAAASUVORK5CYII=" --}}
        alt="{{ $user->name }}"
        class="{{$size}} rounded-full"
      >
</div>
