@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование записи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Редактирование записи</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12 ">
                        <form class="row g-3 align-items-end" action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-3 mb-3">
                                <label for="name" class="form-label">Название</label>
                                <input type="text" name="title" class="form-control" id="name" placeholder="Название" value="{{ $post->title }}">
                                @error('title')
                                <div class="text-danger mt-3">Это поля необходимо заполнить {{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-12">
                                <div class="form-group w-75">
                                    <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                    @error('content')
                                        <div class="text-danger mt-3">Это поля необходимо заполнить {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-25">
                                    <div class="img-wrap w-50">
                                        <img src="{{ url('storage/' . $post->preview_image ) }}" alt="preview_image" class="img-fluid">
                                    </div>
                                    <label for="exampleInputFile">Выберите превью</label>
                                    <div class="input-group">

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="preview_image">
                                            <label class="custom-file-label" >Выбрать изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <div class="text-danger mt-3">Это поля необходимо заполнить {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-25 mb-4">
                                    <div class="img-wrap w-50">
                                        <img src="{{ url('storage/' . $post->main_image ) }}" alt="main_image" class="img-fluid">
                                    </div>
                                    <label for="exampleInputFile">Выберите главное изображение</label>
                                    <div class="input-group">


                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image">
                                            <label class="custom-file-label" >Выбрать изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger mt-3">Это поля необходимо заполнить {{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group w-25 mr-3">
                                <label>Выбрать категорию</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            {{$category->id ? ' selected ' : ''}}
                                            value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-25">
                                <label>Тэги</label>
                                <select class="form-control select2" multiple="multiple" name="tag_ids[]" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected ' : ''}}
                                            value="{{ $tag->id }}"
                                        >
                                            {{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="w-25 btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
