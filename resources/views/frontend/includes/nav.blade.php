<header>
    <div class="header-container">
        <div class="header-img-container">
            <img src="/img/frontend/header_background.jpg" alt="">
        </div>
        <div class="header-txt-container">
            <div class="header-logo-container">
                <h1 class="Kopytova_Tetiana">Kopytova Tetiana</h1>
            </div>
            <div class="header-desciption-container">
                <h3>artist, dreamer, horselover</h3>
                <img class="header-heart" src="/img/frontend/header_heart.png" alt="">
            </div>
            <div class="header-nav-container">
                <ul class="nav-menu">
                    @foreach($portfolioCategories as $portfolioCategory)
                        <li>
                            <a href="#" class="active" title="{{ $portfolioCategory->title }}">
                                {{ $portfolioCategory->title }}
                            </a>
                        </li>
                    @endforeach
                    <li><a href="#" title="About me">About me</a></li>
                    <li><a href="#" title="Contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>