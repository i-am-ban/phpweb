@extends('admin.layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('family.index') }}">Quản lý sổ hộ khẩu</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h3 class="card-title">From tìm kiếm</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="family_code" class="form-control mg-r-15" placeholder="Mã sổ hộ khẩu">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control mg-r-15" placeholder="Tên chủ hộ">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Chọn hộ gia đình</option>
                                    @foreach($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="culture" id="" class="form-control">
                                    <option value="">Chọn gia đình văn hóa</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key}}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="policy" id="" class="form-control">
                                    <option value="">Chọn gia đình chính sách</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key}}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="business" id="" class="form-control">
                                    <option value="">Hộ kinh doanh</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key}}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <select name="export" id="" class="form-control">
                                    <option value="">Có người đi xuất khẩu</option>
                                    @foreach($types as $key => $type)
                                        <option value="{{ $key}}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="input-group-append">
                                    <button type="submit" name="search" value="true" class="btn btn-success " style="margin-right: 10px"><i class="fas fa-search"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    @if ($admin->hasPermission(['them-moi-so-ho-khau', 'toan-quyen-quan-ly']))
                                    <a href="{{ route('family.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th>Mã sổ hộ khẩu</th>
                                        <th>Tên chủ hộ</th>
                                        <th>Địa chỉ</th>
                                        <th>Loại hộ GĐ</th>
                                        <th>Gia đình văn hóa</th>
                                        <th>Gia đình chính sách</th>
                                        <th>Hộ kinh doanh</th>
                                        <th>Có thành viên đi XKLD</th>
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$families->isEmpty())
                                        @php $i = $families->firstItem(); @endphp
                                        @foreach($families as $family)
                                            <tr>
                                                <td class=" text-center" style="vertical-align: middle">{{ $i }}</td>
                                                <td style="vertical-align: middle">{{ $family->family_code }}</td>
                                                <td style="vertical-align: middle">{{ $family->name }}</td>
                                                <td style="vertical-align: middle">
                                                    <p>
                                                        {{ isset($family->city) ? $family->city->loc_name : '' }}
                                                        {{ isset($family->city) ? $family->district->loc_name : ''}}
                                                        {{ isset($family->city) ? $family->district->street : '' }}
                                                    </p>
                                                    <p>{{ $family->address }}</p>
                                                </td>
                                                <td style="vertical-align: middle">{{ isset($family->category) ? $family->category->name : '' }}</td>
                                                <td style="vertical-align: middle">{{ isset($types[$family->culture]) ? $types[$family->culture] : '' }}</td>
                                                <td style="vertical-align: middle">{{ isset($types[$family->policy]) ? $types[$family->policy] : '' }}</td>
                                                <td style="vertical-align: middle">{{ isset($types[$family->business]) ? $types[$family->business] : '' }}</td>
                                                <td style="vertical-align: middle">{{ isset($types[$family->export]) ? $types[$family->export] : '' }}</td>
                                                <td class="text-center" style="vertical-align: middle">

                                                    <a href="{{ route('family.preview', $family->id) }}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-eye"></i></a>
                                                    @if ($admin->hasPermission(['xoa-so-ho-khau', 'chinh-sua-so-ho-khau', 'toan-quyen-quan-ly']))
                                                        @if ($admin->hasPermission(['chinh-sua-so-ho-khau', 'toan-quyen-quan-ly']))
                                                        <a class="btn btn-primary btn-sm" href="{{ route('family.update', $family->id) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        @endif
                                                        @if ($admin->hasPermission(['xoa-so-ho-khau', 'toan-quyen-quan-ly']))
                                                        <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('family.delete', $family->id) }}">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if($families->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $families->appends($query = '')->links() }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
