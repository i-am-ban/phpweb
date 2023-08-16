<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    protected $table = 'families';

    protected $fillable = [
       'name', 'family_code', 'category_id', 'culture', 'policy', 'business', 'export', 'status', 'note', 'city_id', 'district_id', 'street_id', 'address', 'created_at','updated_at'
    ];

    const TYPES = [
        0 => 'Không',
        1 => 'Có',
    ];

    const ROLES = [
        1 => 'Chủ hộ',
        2 => 'Vợ',
        3 => 'Chồng',
        4 => 'Con',
        5 => 'Bố',
        6 => 'Mẹ',
        7 => 'Cô',
        8 => 'Dì',
        9 => 'Chú',
        10 => 'Bác',
        11 => 'Đã chuyển đi',
        11 => 'Đã qua đời',
    ];

    public function createOrUpdate($request , $id ='')
    {
        $params = $request->except(['_token', 'image', 'family_users', 'roles']);

        $family_users = $request->family_users;
        $roles = $request->roles;

        if ($id) {
            $family = $this->find($id);
            $family->fill($params)->save();
            \DB::table('family_users')->where('family_id', $id)->delete();
        } else {
            $family = new Family();
            $family->fill($params)->save();
        }

        if ($family) {

            if (!empty($family_users)){

                    foreach ($family_users as $key => $user) {
                        $data = [
                            'family_id' => $family->id,
                            'user_id' => $user,
                            'role' => isset($roles[$key]) ? $roles[$key] : ''
                        ];

                        if (isset($roles[$key]) && $roles[$key] == 1) {
                            $userData = User::find($user);

                            if ($userData) {
                                $family->name = $userData->ten_khai_sinh;
                                $family->save();
                            }
                        }

                        FamilyUser::insert($data);
                    }
            }
        }
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'family_users')->withPivot('family_id', 'user_id', 'role')->orderBy('role')->select('users.id', 'users.ten_hien_tai', 'users.ma_cu_dan');
    }

    public function city()
    {
        return $this->belongsTo(Locations::class,'city_id')->select('loc_name','id');
    }

    public function district()
    {
        return $this->belongsTo(Locations::class,'district_id')->select('loc_name','id');
    }

    public function street()
    {
        return $this->belongsTo(Locations::class,'street_id')->select('loc_name','id');
    }
}
