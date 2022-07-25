@extends('admin.layout')
@section('content')
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Edit Post</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="/product">View All Posts</a></li>
			<li class="breadcrumb-item active"><a href="post/create">Create post</a></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<p class="mb-0">This page is an example of using static navigation. By removing the <code>.sb-nav-fixed</code> class from the <code>body</code>, the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.</p>
			</div>
		</div>
		<div>
		<!-- It Show the form/input error -->

                <!-- It Create the new Category -->

                
                {!! Form::model($products , array('route' => array('products.update', $products->id), 'method'=>'PUT','files'=>'true')) !!}

             
</br>
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name',null, array('class'=>'form-control')) !!}

                {!! Form::label('description', 'Description:') !!}
                {!! Form::text('description',null, array('class'=>'form-control')) !!}

                {!! Form::label('image', 'Image:') !!}
                {!! Form::file('image',null, array('class'=>'form-control')) !!}
</br>
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price',null, array('class'=>'form-control')) !!}



                {!! Form::submit('Update Post', array('class'=>'secondary-cart-btn')) !!}
                {!! Form::close() !!}
		
	</div>
</main>
@endsection
