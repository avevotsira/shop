@extends('admin.layout')

@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Create Category</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="/category">View All Category </a></li>
			@if(Session::has('category_create'))
<div class="alert alert-success"><em>{!! session('category_create') !!}</em>
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>    
</div>
@endif
@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
	<strong>Something is Wrong</strong>
	<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{!! $error !!}</li>
		@endforeach
	</ul>
</div>
@endif
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<p class="mb-0">This page is an example of using static navigation. By removing the <code>.sb-nav-fixed</code> class from the <code>body</code>, the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.</p>
			</div>
		</div>
		<div>
			{!! Form::open(['url' => 'category']) !!}
			{!! Form::label('name', 'Name: ') !!}
			{!! Form::text('name', '',array('class'=>'form-control')) !!}
			{!! Form::label('description', 'Description: ') !!}
			{!! Form::text('description', '',array('class'=>'form-control')) !!}
			{!! Form::submit('Create',array('class'=> 'secondary-cart-btn')) !!}
            {!! Form::close() !!}
		</div>
		<div style="height: 100vh;"></div>
		<div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
	</div>
</main>
@endsection