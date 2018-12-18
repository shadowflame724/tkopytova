<header>
    <div class="header-container navbar navbar-dark header-bg" style="background-image: url('/img/frontend/{{$headerImg}}')">
        <div class="container d-flex justify-content-center" style="height:30%">
            <a id="title" href="{{ route('frontend.index') }}" class="navbar-brand d-flex align-items-center menu-item">
                <h1>Tetiana Kopytova</h1>
            </a>
        </div>
        <div class="container d-flex justify-content-center" id="horse_lover" style="height:10%">
            <a href="{{ route('frontend.index') }}" class="navbar-brand d-flex align-items-center menu-item">
                <span>artist, dreamer, horselover</span>
                <img class="header-heart" src="/img/frontend/header_heart.png" alt="" style="
                padding-left: 5px;
                height: 20px">
            </a>
        </div>
        <div class="container d-flex justify-content-between" style="height:30%">
            @foreach(\App\Models\PortfolioCategory::all() as $portfolioCategory)
                <a href="{{ route('frontend.index', ['slug' => $portfolioCategory->slug]) }}"
                   class="navbar-brand d-flex align-items-center menu-item
                    @if(isset($activePortfolioCategory) && $activePortfolioCategory->id == $portfolioCategory->id)
                           active
@endif">
                    <strong>{{ $portfolioCategory->title }}</strong>
                </a>
            @endforeach
            <a href="{{ route('frontend.about') }}" class="navbar-brand d-flex align-items-center menu-item
@if(isset($aboutActive) && $aboutActive)
                    active
@endif">
                <strong>About</strong>
            </a>
            <a href="{{ route('frontend.contact') }}" class="navbar-brand d-flex align-items-center menu-item
@if(isset($contactActive) && $contactActive)
                    active
@endif">
                <strong>Contact</strong>
            </a>
        </div>


    </div>
</header>
