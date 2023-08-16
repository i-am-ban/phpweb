<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Shanmuga\LaravelEntrust\Traits\LaravelEntrustUserTrait;


class User extends Authenticatable
{
    use HasFactory, Notifiable, LaravelEntrustUserTrait;

    const GENDER = [
        1 => 'Nam',
        2 => 'Nữ',
        3 => 'Không xác định'
    ];

    const TYPES = [
        1 => 'Quản trị',
        2 => 'Cư Dân'
    ];

    const TROOPER = 2;
    const ADMIN = 1;

    const STATUS_USER = [
        1 => 'Hoạt động',
        2 => 'Đã khóa'
    ];

    const STATUS_TR00PER = [
        1 => 'Tham gia',
        2 => 'Giải ngũ'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'email',
        'password',
        'phone',
        'anh_the',
        'ma_cu_dan',
        'ten_tai_khoan',
        'ten_hien_tai',
        'ten_khai_sinh',
        'ten_khac',
        'bi_danh',
        'ngay_sinh',
        'noi_sinh',
        'que_quan',
        'tru_quan',
        'dia_chi_hien_tai',
        'dan_toc',
        'ton_giao',
        'thanh_phan_gia_dinh',
        'thanh_phan_ban_than',
        'ngay_cap_cccd',
        'noi_cap_cccd',
        'nghe_nghiep',
        'ngay_mat',
        'ket_nap_dang',
        'ngay_noi_vao_doan',
        'van_hoa_pho_thong',
        'hoc_ham_hoc_vi',
        'ngoai_ngu',
        'tieng_dan_toc',
        'cao',
        'song_mui',
        'dau_vet_dac_biet',
        'trang_thai',
        'gioi_tinh',
        'ban_than',
        'thanh_tich',
        'gia_dinh_noi',
        'gia_dinh_ngoai',
        'gia_dinh_vo',
        'ten_vo',
        'ngay_sinh_vo',
        'que_quan_vo',
        'tru_quan_vo',
        'dan_toc_vo',
        'quoc_tich_vo',
        'tu_nam_vo',
        'ton_giao_vo',
        'ngay_noi_dang_ky_ket_hon',
        'dang_vien_vo',
        'doan_vien_vo',
        'van_hoa_vo',
        'cho_o_hien_tai_vo',
        'nghe_nghiep_vo',
        'thong_tin_con',
        'type',
        'email_verified_at',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getInfoEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function userRole()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function admin ()
    {
        return $this->hasOne(self::class, 'id', 'c_parent_id')->select('id', 'ten_hien_tai');
    }

    public function families()
    {
        return $this->belongsToMany(Family::class, 'family_users');
    }
}

