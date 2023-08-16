<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data" class="url-location" data-url="{{ route('load.location')}}">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->first('family_code') ? 'has-error' : '' }} ">
                                <label for="inputEmail3" class="control-label default">Mã số sổ hộ khẩu <sup class="text-danger">(*)</sup></label>
                                <div>
                                    <input type="text" class="form-control"  placeholder="Mã số sổ hộ khẩu" name="family_code" value="{{ old('family_code',isset($family) ? $family->family_code : '') }}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('family_code') }}</p></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6 {{ $errors->first('city_id') ? 'has-error' : '' }}">
                                <label class="control-label default">Tỉnh thành / Thành phố <span class="text-danger">*</span></label>
                                <select name="city_id" id="" class="form-control address" data-type="district">
                                    <option value="">Chọn Tỉnh / TP</option>
                                    @if (isset($citys) && !empty($citys))
                                        @foreach($citys as $city)
                                            <option value="{{ $city->id }}" {{ old('city_id', isset($family) ? $family->city_id : '') == $city->id ?  "selected='selected'" : "" }} >{{ $city->loc_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->first('city_id'))
                                    <span class="text-danger">{{ $errors->first('city_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 {{ $errors->first('district_id') ? 'has-error' : '' }}">
                                <label>Chọn Quận / huyện <span class="text-danger">*</span></label>
                                <select name="district_id" id="" class="form-control address district" data-type="street">
                                    <option value="">Chọn Quận / Huyện </option>
                                    @if (isset($district) && !empty($district))
                                        @foreach($district as $di)
                                            <option value="{{ $di->id }}" {{ old('district_id', isset($family) ? $family->district_id : '') == $di->id ?  "selected='selected'" : "" }}>{{ $di->loc_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->first('district_id'))
                                    <span class="text-danger">{{ $errors->first('district_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6 {{ $errors->first('street_id') ? 'has-error' : '' }}">
                                <label>Chọn Xã / Phường<span class="text-danger">*</span></label>
                                <select name="street_id" id="" class="form-control address street">
                                    <option value="">Chọn Xã / Phường</option>
                                    @if (isset($street) && !empty($street))
                                        @foreach($street as $st)
                                            <option value="{{ $st->id }}" {{ old('street_id', isset($family) ? $family->street_id : '') == $st->id ?  "selected='selected'" : "" }}>{{ $st->loc_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->first('street_id'))
                                    <span class="text-danger">{{ $errors->first('street_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="inputEmail3" class="control-label default">Địa chỉ cụ thể <sup class="text-danger">(*)</sup></label>
                                <div>
                                    <input type="text" class="form-control"  placeholder="Địa chỉ" name="address" value="{{ old('address',isset($family) ? $family->address : '') }}">
                                    <span class="text-danger "><p class="mg-t-5">{{ $errors->first('address') }}</p></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="inputEmail3" class="control-label default">Thành viên trong gia đình <sup class="text-danger">(*)</sup></label>
                                <div class="family-users">
                                    @if (!isset($family))
                                        <div class="row" style="margin-bottom: 15px">
                                            <div class="col-md-5">
                                                <select name="family_users[]" class="form-control custom-select select2" id="" required>
                                                    <option value="">Chọn thành viên</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">
                                                            {{ $user->ma_cu_dan .'-'. $user->ten_hien_tai }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <select name="roles[]" id="" class="form-control" required>
                                                    <option value="1">Chủ hộ</option>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        @if (!empty($family_users))
                                            @foreach($family_users as $keyFu => $userId)
                                                <div class="row" style="margin-bottom: 15px">
                                                    <div class="col-md-5">
                                                        <select name="family_users[]" class="form-control custom-select select2" id="" required>
                                                            <option value="">Chọn thành viên</option>
                                                            @foreach($users as $user)
                                                                <option value="{{ $user->id }}" {{ $user->id == $userId ?  "selected='selected'" : "" }}>
                                                                    {{ $user->ma_cu_dan .'-'. $user->ten_hien_tai }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select name="roles[]" id="" class="form-control" required>
                                                            @foreach($roles as $key => $role)
                                                                <option value="{{ $key }}" {{ $key == $roleEdits[$keyFu] ? 'selected="selected"' : '' }}>{{ $role }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a class="btn btn-danger btn-sm btn-delete" style="margin-top: 4px;">
                                                            <i class="fas fa-trash" style="color: #FFFFFF;"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="row" style="margin-bottom: 15px">
                                                <div class="col-md-5">
                                                    <select name="family_users[]" class="form-control custom-select select2" id="" required>
                                                        <option value="">Chọn thành viên</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->ma_cu_dan .'-'. $user->ten_hien_tai }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <select name="roles[]" id="" class="form-control" required>
                                                        <option value="1">Chủ hộ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <div class="col-md-12 text-right" style="margin-top: 30px">
                                    <button type="button" class="btn btn-primary add-family-users"><i class="fa fa-fw fa-plus"></i> Thêm thành viên</button>
                                </div>
                            </div>
                        </div>


                        <div class="form-group form-group-ranks col-md-12">
                            <label for="inputName2" class="col-form-label">Mô tả về hộ gia đình</label>
                            <textarea class="form-control" id="note" name="note" placeholder="">{{old('note', isset($family->note) ? $family->note : '')}}</textarea>
                            <script>
                                ckeditor(note);
                            </script>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('note') }}</p></span>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Xuất bản</h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-set">
                            <button type="submit" name="submit" class="btn btn-info">
                                <i class="fa fa-save"></i> Lưu dữ liệu
                            </button>
                            <button type="reset" name="reset" value="reset" class="btn btn-danger">
                                <i class="fa fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Loại hộ gia đình <sup class="title-sup">(*)</sup></label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Chọn hộ gia đình</option>
                                @foreach($categories as $key => $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', isset($family) ? $family->category_id : '') == $category->id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('category_id') }}</p></span>
                        </div>

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Gia đình văn hóa <sup class="title-sup">(*)</sup></label>
                            <select name="culture" id="" class="form-control">
                                @foreach($types as $key => $type)
                                    <option value="{{ $key}}" {{ old('culture', isset($family) ? $family->culture : '') == $key ? 'selected="selected"' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('culture') }}</p></span>
                        </div>

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">GĐ chính sách có công với CM <sup class="title-sup">(*)</sup></label>
                            <select name="policy" id="" class="form-control">
                                @foreach($types as $key => $type)
                                    <option value="{{ $key}}" {{ old('policy', isset($family) ? $family->policy : '') == $key ? 'selected="selected"' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('policy') }}</p></span>
                        </div>

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Hộ kinh doanh <sup class="title-sup">(*)</sup></label>
                            <select name="business" id="" class="form-control">
                                @foreach($types as $key => $type)
                                    <option value="{{ $key}}" {{ old('business', isset($family) ? $family->business : '') == $key ? 'selected="selected"' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('business') }}</p></span>
                        </div>

                        <div class="form-group form-group-trooper">
                            <label for="inputName2" class="col-form-label">Xuất khẩu lao động <sup class="title-sup">(*)</sup></label>
                            <select name="export" id="" class="form-control">
                                @foreach($types as $key => $type)
                                    <option value="{{ $key}}" {{ old('export', isset($family) ? $family->export : '') == $key ? 'selected="selected"' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger "><p class="mg-t-5">{{ $errors->first('export') }}</p></span>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
</div>

@section('script')
    <script>
        $(function () {
            $('.add-family-users').click(function () {
                $('.address').select2();
                var html = `
                     <div class="row" style="margin-bottom: 15px">
                        <div class="col-md-5">
                            <select name="family_users[]" class="form-control custom-select select2" id="" required>
                                <option value="">Chọn thành viên</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"
                                        @if (in_array($user->id, old('family_users', isset($familyUsers) ? $familyUsers : []))) selected="selected" @endif >
                                    {{ $user->ma_cu_dan .'-'. $user->ten_hien_tai }}
                                     </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select name="roles[]" id="" class="form-control" required>
                                @foreach($roles as $key => $role)
                                    @if ($key !== 1)
                                    <option value="{{ $key}}" {{ old('culture') == $key ? 'selected="selected"' : '' }}>{{ $role }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-danger btn-sm btn-delete" style="margin-top: 4px;">
                                <i class="fas fa-trash" style="color: #FFFFFF;"></i>
                            </a>
                        </div>
                    </div>
                `;
                $('.family-users').append(html);
            });

            $(document).on('click', '.btn-delete', function (event) {
                event.preventDefault();
                $(this).parent().parent().remove();
            })
        })
    </script>
@stop