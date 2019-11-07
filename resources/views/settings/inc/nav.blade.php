<ul class="navigation leading-loose">
	<li class="text-lg {{ $active == 'categories' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/categories">@component('svg.list') h-4 mr-2 @endcomponent {{ __("Categories") }}</a></li>
	<li class="text-lg {{ $active == 'church' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings">@component('svg.location') h-4 mr-2 @endcomponent {{ __("Church Info") }}</a></li>
	<li class="text-lg {{ $active == 'user' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/user">@component('svg.user-solid-square') h-4 mr-2 @endcomponent {{ __("User Info") }}</a></li>
	@if($user->isAdmin())
	<li class="text-lg {{ $active == 'users' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/users">@component('svg.user-add') h-4 mr-2 @endcomponent {{ __("Users") }}</a></li>
	@endif
	{{-- <li class="text-lg {{ $active == 'notifications' ? 'font-bold text-green-500' : '' }}"><a class="inline-flex items-center hover:underline" href="/settings/notifications">@component('svg.notifications') h-4 mr-2 @endcomponent {{ __("Notifications") }}</a></li> --}}
</ul>