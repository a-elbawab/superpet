@if ($paginator->hasPages())
    <div class="pagination-bar">
        {{-- ====== الباجينيشن الأصلي (لم يتغيّر) ====== --}}
        <ul class="pagination custom-pagination mb-0 flex-wrap">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            @php
                $total = $paginator->lastPage();
                $current = $paginator->currentPage();
            @endphp

            {{-- Page 1 --}}
            @if ($current == 1)
                <li class="page-item active"><span class="page-link">1</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
            @endif

            {{-- Dots before current --}}
            @if ($current > 3)
                <li class="page-item disabled"><span class="page-link">…</span></li>
            @endif

            {{-- Current page (if not 1 or last) --}}
            @if ($current != 1 && $current != $total)
                <li class="page-item active"><span class="page-link">{{ $current }}</span></li>
            @endif

            {{-- Dots after current --}}
            @if ($current < $total - 2)
                <li class="page-item disabled"><span class="page-link">…</span></li>
            @endif

            {{-- Last page --}}
            @if ($total > 1)
                @if ($current == $total)
                    <li class="page-item active"><span class="page-link">{{ $total }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($total) }}">{{ $total }}</a></li>
                @endif
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>

        {{-- ====== اذهب إلى صفحة (جديد، متجاوب) ====== --}}
        @php
            $pageName = $paginator->getPageName();
            $lastPage = $paginator->lastPage();
            $current = $paginator->currentPage();
        @endphp

        <div class="pagination-jump">
            <div class="input-group input-group-sm">
                <span class="input-group-text d-none d-md-inline">page</span>
                <input type="number" id="go-to-page-input" class="form-control form-control-sm text-center" min="1"
                    max="{{ $lastPage }}" value="{{ $current }}" placeholder="go ..." {{ $lastPage <= 1 ? 'disabled' : '' }}>
                <button type="button" id="go-to-page-btn" class="btn btn-sm btn-success" {{ $lastPage <= 1 ? 'disabled' : '' }}>
                    <i class="fa fa-arrow-right"></i>
                </button>
            </div>
            <small class="text-muted d-none d-md-inline ms-2"> 1 - {{ $lastPage }}</small>
        </div>
    </div>

    <script>
        (function () {
            var input = document.getElementById('go-to-page-input');
            var button = document.getElementById('go-to-page-btn');
            var pageMax = {{ $lastPage }};
            var pageKey = @json($pageName);

            function goToPage(n) {
                if (!n) return;
                n = Math.max(1, Math.min(pageMax, parseInt(n, 10) || 1));
                var url = new URL(window.location.href);
                url.searchParams.set(pageKey, n);
                window.location.href = url.toString();
            }

            button && button.addEventListener('click', function () { goToPage(input && input.value); });
            input && input.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') { e.preventDefault(); goToPage(input.value); }
            });
        })();
    </script>

    <style>
        /* كونتينر يستجيب للمقاس: صف على الديسكتوب، عمود على الموبايل */
        .pagination-bar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: .5rem .75rem;
            margin-top: .5rem;
        }

        .pagination-bar .pagination {
            margin: 0 !important;
        }

        .pagination-jump {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .pagination-jump .form-control {
            width: 90px;
        }

        @media (max-width: 576px) {
            .pagination-bar {
                flex-direction: column;
                gap: .5rem;
            }

            .pagination-jump {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endif