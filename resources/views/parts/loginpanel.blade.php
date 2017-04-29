@if(Auth::check())
    @if(Auth::user()->hasRole('administrator'))
        <div class="menu-item-icon">
            <a href="/../adminpanel">
                <i class="icon-user"></i>
                <span>Moje konto</span>
            </a>
            <a href="/../logout">
                <i class="icon-logout"></i>
                <span>Wyloguj</span>
            </a>
        </div>
        </a>
    @else
        <div class="menu-item-icon">
            <a href="/../userpanel/addresses">
                <i class="icon-user"></i>
                <span>Moje konto</span>
            </a>
            <a href="/../logout">
                <i class="icon-logout"></i>
                <span>Wyloguj</span>
            </a>
        </div>
    @endif
@else
    <a href="/../login">
        <div class="menu-item-icon">
            <i class="icon-user"></i>
            Zaloguj się
        </div>
    </a>
@endif