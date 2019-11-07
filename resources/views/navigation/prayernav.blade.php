@component('navigation.sidebar')
@slot('top')
<a href="/requests" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Requests') }}</span><span class="rounded {{$active == 'requests' ? 'bg-green-500 text-gray-100' : 'text-gray-500'}} p-2">@component('svg.inbox-full') h-5 @endcomponent</span></a>
<a href="/incoming" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Incoming') }}</span><span class="rounded {{$active == 'incoming' ? 'bg-green-500 text-gray-100' : 'text-gray-500'}} p-2">@component('svg.inbox-download') h-5 @endcomponent</span></a>
<a href="/incoming" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Archive') }}</span><span class="rounded {{$active == 'archive' ? 'bg-green-500 text-gray-100' : 'text-gray-500'}} p-2">@component('svg.box') h-5 @endcomponent</span></a>

@endslot
@slot('bottom')
<a href="/settings/categories" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Settings') }}</span><span class="rounded  {{$active == 'settings' ? 'bg-green-500 text-gray-100' : 'text-gray-500'}} p-2 ">@component('svg.cog') h-5 @endcomponent</span></a>
<a href="/embeds" class="flex p-3 items-center hover:bg-gray-200"><span class="uppercase tracking-wide hidden group-hover:block mr-2 w-32 p-3">{{ __('Deploy') }}</span><span class="rounded  {{$active == 'embeds' ? 'bg-green-500 text-gray-100' : 'text-gray-500'}} p-2">@component('svg.code') h-5 @endcomponent</span></a>
@endslot

@endcomponent