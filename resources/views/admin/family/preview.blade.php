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
                        <li class="breadcrumb-item active">Hộ gia đình : </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">SỔ HỘ KHẨU</h1>
                            <h1 class="text-center">GIA ĐÌNH</h1>
                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-md-8" style="margin: auto">
                                        <div class="active tab-pane" id="activity">
                                            <!-- Post -->
                                            <h3 style="font-size: 23px; font-weight: bold;  text-decoration:underline;">Thông tin :</h3>
                                            @if ($family->users)
                                                @foreach($family->users as $key => $user)
                                                    @if ($key == 0)
                                                    <strong> Mã số sổ hộ khẩu : {{ $family->family_code }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Họ tên chủ hộ : {{ $user->ten_hien_tai }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Quan hệ với chủ hộ : {{ isset($roles[$user->pivot->role]) ? $roles[$user->pivot->role] : '' }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Mã số (CCCD) : {{ $user->ma_cu_dan }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Ngày cấp (CCCD)  : {{ $user->ngay_cap_cccd }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Nơi cấp (CCCD)  : {{ $user->noi_cap_cccd }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Địa chị hộ gia đình : {{ isset($family->city) ? $family->city->loc_name : ''  }}
                                                        {{ isset($family->district) ? $family->district->loc_name : ''  }} {{ isset($family->street) ? $family->street->loc_name : ''  }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Địa chỉ chính xác : {{ $family->address  }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Bí danh : {{ $user->bi_danh }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Ngày sinh : {{ $user->ngay_sinh }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Nơi sinh : {{ $user->noi_sinh }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Quê quán : {{ $user->que_quan }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Đăng ký thường trú : {{ $user->tru_quan }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Dân tộc : {{ $user->dan_toc }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Tôn giáo : {{ $user->ton_giao }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Loại hộ gia đình : {{ isset($family->category) ? $family->category->name : ''  }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Gia đình văn hóa	 : {{ isset($types[$family->culture]) ? $types[$family->culture] : ''  }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Gia đình chính sách	 : {{ isset($types[$family->policy]) ? $types[$family->policy] : ''  }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Hộ kinh doanh	 : {{ isset($types[$family->business]) ? $types[$family->business] : ''  }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Có thành viên đi XKLD	 : {{ isset($types[$family->export]) ? $types[$family->export] : ''  }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <div class="form-group form-group-trooper col-md-12" style="padding: 0px;margin-top: 15px;">
                                                    @else

                                                    <strong>Thành viên : {{ $user->ten_hien_tai  }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Quan hệ với chủ hộ : {{ isset($roles[$user->pivot->role]) ? $roles[$user->pivot->role] : '' }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Mã số (CCCD) : {{ $user->ma_cu_dan }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Ngày cấp (CCCD)  : {{ $user->ngay_cap_cccd }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Nơi cấp (CCCD)  : {{ $user->noi_cap_cccd }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Bí danh : {{ $user->bi_danh }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Ngày sinh : {{ $user->ngay_sinh }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Nơi sinh : {{ $user->noi_sinh }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Quê quán : {{ $user->que_quan }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Đăng ký thường trú : {{ $user->tru_quan }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Dân tộc : {{ $user->dan_toc }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    <strong> Tôn giáo : {{ $user->ton_giao }}</strong>
                                                    <hr style="margin: 10px 0px ">

                                                    @endif
                                                @endforeach
                                            @endif

                                            <h3 style="font-size: 23px; font-weight: bold;  text-decoration:underline;">Mô tả về hộ gia đình  :</h3>
                                            <div>
                                                {!! $family->note !!}
                                            </div>
                                        </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@stop