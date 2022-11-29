@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm tòa nhà
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('admin/building/store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên tòa nhà</label>
                        <input class="form-control" type="text" name="name" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input class="form-control" type="text" name="phone" id="phone">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input class="form-control" type="text" name="address" id="address">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="manager">Người quản lý</label>
                        <select class="form-control" id="manager" name="manager">
                            <option value="">----Chọn----</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('manager')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Logo tòa nhà</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="active"
                                value="1" checked>
                            <label class="form-check-label" for="active">
                                Hoạt động
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="inactive"
                                value="0">
                            <label class="form-check-label" for="inactive">
                                Ngưng hoạt động
                            </label>
                        </div>
                        @error('actived')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <input type="submit" name="btn_add" value="Thêm mới" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
