<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        {{-- Home --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
            
        </li>
        
        
        
    </ul>

    @if (Auth::user()->role == 'admin')
    <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('allUser') }}">
            <i class="bi bi-grid"></i>
            <span>User</span>
        </a>
    </li>`
        {{-- Category & News --}}
        <li class="nav-item">
            
            <a class="nav-link mt-2" href="{{ route('category.index') }}">
                <i class="bi bi-basket2"></i>
                <span>Category</span>
            </a>
        </li>
        <li class="nav-item">
            
            <a class="nav-link mt-2" href="{{ route('news.index') }}">
                <i class="bi bi-envelope-open-fill"></i>
                <span>news</span>
            </a>
        </li>
    </ul>
    @else
        
    @endif

</aside>