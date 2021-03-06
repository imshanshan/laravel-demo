@extends('web.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/simditor/css/simditor.css') }}">
@stop

@section('scripts')
    <script src="{{ asset('vendor/simditor/js/module.js') }}"></script>
    <script src="{{ asset('vendor/simditor/js/hotkeys.js') }}"></script>
    <script src="{{ asset('vendor/simditor/js/uploader.js') }}"></script>
    <script src="{{ asset('vendor/simditor/js/simditor.js') }}"></script>
    <script>
        (function ($) {
            let editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('topics.upload') }}',
                    params: {_token: '{{ csrf_token() }}'},
                    fileKey: 'uploader',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭页面将取消上传！'
                },
                pasteImage: true
            });
        })(jQuery);
    </script>
@stop

@section('content')
    <div class="container">
        <div class="col-md-10 offset-1">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fa fa-edit"></i> 话题 /
                        @if($topic->id)
                            编辑话题
                        @else
                            新建话题
                        @endif
                    </h3>
                </div>

                <div class="card-body">
                    @php
                        $action = $topic->id ? route('topics.update', $topic->id): route('topics.store');
                    @endphp
                    <form action="{{ $action }}" method="POST" accept-charset="UTF-8">
                        @csrf
                        @if ($topic->id)
                            @method('put')
                        @endif

                        <div class="form-group">
                            <label for="title-field">标题</label>
                            <input class="form-control{{ $errors->has('title') ? ' is-invalid' : ''}}" type="text" name="title" id="title-field"
                                   value="{{ old('title', $topic->title ) }}"
                                   placeholder="请填写标题">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{$errors->first('title')}}
                                    </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="category-id-field">分类</label>
                            <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" id="category-id-field">
                                <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择分类</option>
                                @foreach ($categories as $value)
                                    @php
                                        $selected = $topic->category_id === $value->id ? 'selected' : '';
                                    @endphp
                                    <option value="{{ $value->id }}" {{ $selected }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @if( $errors->has('category_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $errors->first('category_id') }}
                                    </strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="editor">内容</label>
                            <textarea class="form-control {{ $errors->has('body') ? ' is-invalid' :'' }}" name="body" id="editor" rows="3"
                                      placeholder="请填入至少三个字符的内容">{{ old('body', $topic->body ) }}</textarea>
                        @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{$errors->first('body')}}
                                </strong>
                            </span>
                        @endif
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <a class="btn btn-outline-primary" href="{{ route('topics.index') }}">
                                    <i class="fa fa-backward"></i> 返回
                                </a>
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fa fa-save"></i> 保存
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
