@extends('admin.layout')
@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Edit Category</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="/category">View All Category</a></li>
			<li class="breadcrumb-item active"><a href="/category/create">Create category</a></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
            @if(Session::has('category_update'))
            <div class="alert alert-primary alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Primary!</strong> {!! session('category_update') !!}
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
            {!! Form::model($category , array('route' => array('category.update', $category->id), 'method'=>'PUT')) !!}
           	{!! Form::label('name', 'Name:') !!}
           	{!! Form::text('name',null, array('class'=>'form-control')) !!}
            <br>
            {!! Form::label('description', 'Description:') !!}
           	{!! Form::text('description',null, array('class'=>'form-control')) !!}
            <br>
            {!! Form::label('other', 'Other:') !!}
           	{!! Form::text('other',null, array('class'=>'form-control')) !!}
            </br>  
           	{!! Form::submit('Update', array('class'=>'btn btn-primary')) !!}
           	{!! Form::close() !!}
            </br> 
			</div>
		</div>	
	</div>
</main>
@endsection