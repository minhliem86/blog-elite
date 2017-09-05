<header id="header" class="header">
    <a href="http://m.ila.edu.vn" title="" class="logo"><img src="{!!asset('public/assets/frontend')!!}/images/logo.svg" alt=""></a>
    <nav id="main-menu-mobile">
        <ul>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
               @if(LaravelLocalization::getCurrentLocale()  !== $localeCode )
                <!--
               <li>
                   <a rel="alternate" hreflang="{{ $localeCode }}" title="{{ $properties['native'] }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                       <img src="{!!asset('public/assets/frontend/images/flag')!!}/{{$localeCode}}.png" alt="{{ $properties['native'] }}"><span>&nbsp;</span>
                   </a>
                   <a href="javascript:void(0);" title="English (UK)" onclick="javascript:set_lang('english');"></a>
               </li>
               -->
               @endif
           @endforeach
            <li><a href="http://m.ila.edu.vn/request-callback" title="Liên hệ" class="btn-contact">Liên hệ</a></li>
            <li><div class="m-icons"><i class="icon-nav"><span></span></i></div></li>
        </ul>
    </nav>
    <div class="clear"></div>
    <nav id="side-menu">
        <nav id="main-nav">
            <ul>
                <li class="active"><a href="{!!route('f.homepage')!!}/" title="ILA ELITE">ILA ELITE</a></li>
                <li><a href="http://m.ila.edu.vn/beyond-english" title="Beyond English" class="has-dropdown">Beyond English</a></li>
                <li><a href="http://m.ila.edu.vn" title="Các khoá Tiếng Anh" class="has-dropdown">Các khoá Tiếng Anh</a></li>
                <li> <a href="http://m.ila.edu.vn/centers" title="">Tất cả trung tâm</a></li>
                <li><a href="http://m.ila.edu.vn/stories" title="Chuyện hay của ILA">Chuyện hay của ILA</a></li>
            </ul>
        </nav>
    </nav>


  </header>
