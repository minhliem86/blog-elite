<nav id="main-menu">
      <ul>
        <li class="active"><a href="{!!route('f.homepage')!!}" title="{{trans('content.home')}}">ILA ELITE</a> </li>
        <li class=""><a href="http://ila.edu.vn/beyond-english" title="Beyond English" class="has-dropdown">Beyond English</a></li>
        <li class=""><a href="http://ila.edu.vn/" title="{{trans('content.english_course')}}" class="has-dropdown">{{trans('content.english_course')}}</a></li>
        <li class=""><a href="http://ila.edu.vn/centers" title="{{trans('content.center')}}">{{trans('content.center')}}</a></li>
        <li><a href="http://ila.edu.vn/stories" title="{{trans('content.center')}}">{{trans('content.center')}}</a></li>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if(LaravelLocalization::getCurrentLocale()  !== $localeCode )
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}" title="{{ $properties['native'] }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <img src="{!!asset('public/assets/frontend/images/flag')!!}/{{$localeCode}}.png" alt="{{ $properties['native'] }}"><span>&nbsp;</span>
                </a>
                <a href="javascript:void(0);" title="English (UK)" onclick="javascript:set_lang('english');"></a>
            </li>
            @endif
        @endforeach
        <li class=""><a href="http://ila.edu.vn/request-callback" title="{{trans('content.contact')}}" class="btn-contact">{{trans('content.contact')}}</a></li>
      </ul>
</nav>
