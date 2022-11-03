@extends('Admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="m-0">  Editing a post:</h2>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form  class="col-12" action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control col-4" name="title" placeholder="Enter name"
                                   value="{{$post->title}}">
                            @error('title')
                            <div class="text-danger">Error, filed is necessary</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="summernote" name="content">{{$post->content}}</textarea>
                            @error('content')
                            <div class="text-danger">Error, filed is necessary</div>
                            @enderror
                        </div>
                        <div class="form-group w-100">
                            <label for="exampleInputFile">Add preview</label>
                            <div class="w-25">
                                <img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label" >Choose image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">Error, filed is necessary</div>
                            @enderror
                        </div>
                        <div class="form-group w-100">
                            <label for="exampleInputFile">Add image</label>
                            <div class="w-25">
                                <img src="{{ Storage::url($post->main_image) }}" alt="main_image" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label" >Choose image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">Error, filed is necessary</div>
                            @enderror
                        </div>
                        <div class="form-group w-100">
                            <label>Select Category</label>
                            <select name="category_id"  class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select class="select2" name="tag_id[]" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
