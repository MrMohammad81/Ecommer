<div class="mobile-off-canvas-active">
    <a class="mobile-aside-close">
        <i class="sli sli-close"></i>
    </a>

    <div class="header-mobile-aside-wrap">
        <div class="mobile-search">
            <form class="search-form" action="#">
                <input type="text" placeholder=" ... جستجو " />
                <button class="button-search">
                    <i class="sli sli-magnifier"></i>
                </button>
            </form>
        </div>

        <div class="mobile-menu-wrap">
            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu text-right">
                        <li class="menu-item-has-children">
                            <a href="{{ route('home.index') }}"> صفحه ای اصلی </a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">فروشگاه</a>
                            <ul class="dropdown">
                                @php
                                    use App\Models\Category;$parentCategories = Category::where('parent_id' , 0)->get();
                                @endphp

                                @foreach($parentCategories as $parentCategory)
                                <li class="menu-item-has-children">
                                    <a href="{{ route('home.categories.show' , $parentCategory->slug ) }}">{{ $parentCategory->name }}</a>
                                    <ul class="dropdown">
                                        @foreach($parentCategory->children as $child)
                                            <li><a href="{{ route('home.categories.show' , $child->slug ) }}"> {{ $child->name }} </a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>

                        <li><a href="{{ route('home.contact-us') }}">تماس با ما</a></li>

                        <li><a href="{{ route('home.about-us') }}"> درباره ما</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
        </div>

        <div class="mobile-curr-lang-wrap">
            <div class="single-mobile-curr-lang">
                <ul class="text-right">
                    @auth
                        <li><a href="{{ route('home.users_profile.index') }}">پروفایل</a></li>
                    @else
                        <li><a href="{{ route('auth.index') }}">ورود</a></li>
                        <li><a href="{{ route('auth.logout') }}">خروج</a></li>
                    @endauth
                </ul>
            </div>
        </div>

        <div class="mobile-social-wrap text-center">
            <a class="facebook" href="#"><i class="sli sli-social-facebook"></i></a>
            <a class="twitter" href="#"><i class="sli sli-social-twitter"></i></a>
            <a class="pinterest" href="#"><i class="sli sli-social-pinterest"></i></a>
            <a class="instagram" href="#"><i class="sli sli-social-instagram"></i></a>
            <a class="google" href="#"><i class="sli sli-social-google"></i></a>
        </div>
    </div>
</div>
