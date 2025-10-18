@if(isset($can['ability'], $can['model'])
    && Gate::allows($can['ability'], $can['model'])
    || ! isset($can))
    <li @class([
        'nav-item',
        'active' => isset($active) && $active && !(isset($tree) && is_array($tree) && count($tree)) ?  ' active' : '',
        'has-sub' => isset($tree) && is_array($tree) && count($tree),
    ])>
        <a href="{{ $url ?? '#' }}" class="d-flex align-items-center">
            @isset($icon)
                @if (strpos($icon, "f") === 0 && strpos($icon, "a") === 1)
                    <i class="{{ $icon }}"></i>
                @endif
                <i data-feather="{{ $icon }}"></i>
            @endisset

            <span class="menu-title text-truncate">{{ $name }}</span>

            @isset($badge)
                <span class="ml-1 badge badge-{{ $badgeLevel ?? 'danger' }}">{{ $badge }}</span>
            @endisset
        </a>

        @if(isset($tree) && is_array($tree) && count($tree))
            <ul>
                @foreach($tree as $item)
                    @if(isset($item['can']['ability'], $item['can']['model'])
                        && Gate::allows($item['can']['ability'], $item['can']['model'])
                        || ! isset($item['can']))
                        <li @class([
                            'active' => isset($item['active']) && $item['active'],
                        ])>
                            <a href="{{ $item['url'] ?? '#' }}">
                                <i data-feather="circle"></i>

                                <span class="menu-title text-truncate">{{ $item['name'] }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </li>
@endif
