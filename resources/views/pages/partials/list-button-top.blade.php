<div class="mt-4">
    <a href="{{ route("user.campaign.list.view") }}" type="button" class="btn btn-myfarm-out-line
        @if (in_array(Route::currentRouteName(), ["user.campaign.list.view", 'user.campaign.detail.view']))
            active
        @endif
    ">
        {{ __("layout.breadcrumb_campaign") }}
    </a>
    <a href="{{ route("user.profile.view") }}" type="button" class="btn btn-myfarm-out-line
        @if (in_array(Route::currentRouteName(), ["user.profile.view"]))
            active
        @endif
    ">
        {{ __("layout.my_infomation") }}
    </a>
    {{-- <a href="{{ route("user.address.view") }}" type="button" class="btn btn-myfarm-out-line
        @if (in_array(Route::currentRouteName(), ["user.address.view"]))
            active
        @endif
    ">
        {{ __("layout.breadcrumb_list_address") }}
    </a> --}}
    <a href="{{ route("user.product.exchange.view") }}" type="button" class="btn btn-myfarm-out-line
        @if (in_array(Route::currentRouteName(), ["user.product.exchange.view", "user.product.exchange.order"]))
            active
        @endif
    ">
        {{ __("layout.breadcrumb_my_product_exchange") }}
    </a>
    <a href="{{ route("user.voucher.view") }}" type="button" class="btn btn-myfarm-out-line
        @if (in_array(Route::currentRouteName(), ["user.voucher.view"]))
            active
        @endif
    ">
        {{ __("layout.breadcrumb_voucher") }}
    </a>
    {{-- <a href="{{ route("user.notify.view") }}" type="button" class="btn btn-myfarm-out-line
        @if (in_array(Route::currentRouteName(), ["user.notify.view"]))
            active
        @endif
    ">
        {{ __("layout.breadcrumb_notify") }}
    </a> --}}
</div>
