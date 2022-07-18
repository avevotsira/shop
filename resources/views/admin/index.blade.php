@extends('admin.layout')

@section('content')
<main>
<div class="container-fluid">
		<h1 class="mt-4">Category</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.html">View All Category </a></li>
			<li class="breadcrumb-item active"><a href="category/create">Create category</a></li>
		</ol>
		<div class="card mb-4">
			<div class="card-body">
				<p class="mb-0">This page is an example of using static navigation. By removing the <code>.sb-nav-fixed</code> class from the <code>body</code>, the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.</p>
			</div>
		</div>
		<div style="height: 100vh;"></div>
		<div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
	</div>
    <div class="container-fluid">
        <h1 class="mt-4">Category list</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/Category">View All </a></li>
            <li class="breadcrumb-item active"><a href="Category/create">Create</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if (count($categories) > 0)
                <table class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>
                                {!! $category->id !!}
                            </td>
                            <td>
                                {!! $category->name !!}
                            </td>
                            <td><a class="btn btn-primary" href="{!! url('category/' . $category->id . '/edit') !!}">Edit</a></td>
                            <td>
                                {!! Form::open(array('url'=>'category/'. $category->id, 'method'=>'DELETE')) !!}
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger">Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        <div style="height: 100vh;"></div>
    </div>
</main>
@endsection