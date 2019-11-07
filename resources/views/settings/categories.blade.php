@extends('layouts.settings')
@section('sermonsContent')
<div class="w-full max-w-4xl mx-auto mt-24 text-gray-800">
<div class="flex justify-between  items-baseline p-6 md:p-0 md:mb-12">
 <h1 class="text-3xl font-bold text-blue-500 flex-grow">{{  __('Settings') }}</h1>   
</div>
<div class="content flex p-6 flex-wrap md:flex-no-wrap md:p-0">
<aside class="w-full pb-8 border-b mb-8  md:border-b-0 md:w-auto md:flex-shrink-0 md:border-r md:pr-8">
@include('settings.inc.nav', ['active' => 'categories'])
</aside>
<main class="flex-grow md:px-8">

	 <form action="/settings/categories" method="POST" class="max-w-lg mx-auto">
	 	@csrf 
	 	<label class="block mb-6">
		  <div class="flex items-center">
		  <input class="form-input mt-1 block w-full" placeholder="Health Needs" name="category" >
		  <button type="submit">@component('svg.add-solid') h-8 text-green-500 hover:text-green-700 ml-2 @endcomponent</button>  
		</div>
		</label>
		 @if ($errors->has('category'))
	            @component('includes.note', ['color' => 'red'])
	            <p>
	                {{ $errors->first('category') }}
	            </p>
	            @endcomponent
	      @endif
	 </form>
	 <div class="max-w-lg mx-auto">
	 @if(session('changed'))
	 @component('includes.note', ['color' => 'green'])
	 	{{ session('changed')}}
	 @endcomponent
	 @endif 
	 @if(session('removed'))
	 @component('includes.note', ['color' => 'red'])
	 	{{ session('removed')}}
	 @endcomponent
	 @endif 
	 </div>

	 @foreach($categories as $category)
		 <div class="max-w-lg flex mx-auto mb-2">
		 <form action="/settings/categories/{{$category->id}}" method="POST" class="flex items-center">
			@csrf 
			@method('PUT')
			<input class="form-input mt-1 block w-full" name="category" value="{{$category->title}}">
			<button type="submit">@component('svg.save-disk') h-6 ml-4 text-gray-500 hover:text-green-700 @endcomponent</button>
			<button type="button" onclick="removeCategory({{$category->id}})">@component('svg.close') h-6 ml-4 text-gray-500 hover:text-red-700 @endcomponent</button>
		</form>
		<form action="/settings/categories/{{$category->id}}" method="POST" id="remove{{$category->id}}">
		@csrf 
		@method('DELETE')
		</form>
		 </div>
	 @endforeach
	 @if($categories->count() > 1)
	 <div class="message max-w-lg mx-auto mt-8">
		 @component('includes.note', ['color' => 'blue'])
		 	<p>Categories will be displayed in <strong>alphabetical order</strong>, so the easiest way to reorder them is to just number them.  <em>(i.e. change "Health Needs" to "1. Health Needs")</em></p>
		 @endcomponent
	 </div>
	 @endif 
</main>
</div>	
</div>
@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
var removeCategory = (id) => {
	var form = document.querySelector(`#remove${id}`);
	swal({
		title: "Are you sure?",
		text: "You are about to delete this category and all of the requests inside of it!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
		})
		.then((willDelete) => {
		if (willDelete) {
			form.submit();
		} else {
			swal("Your category is safe!");
		}
		});
};
</script>
@endpush