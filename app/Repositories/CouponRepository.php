<?php

namespace App\Repositories;

use App\Models\Coupons;

class CouponRepository
{
    public function __construct()
    {

    }

    public function getCoupons(array $data)
    {
        $result = Coupons::whereIn('is_active', [0, 1]);

        if (!empty($data['textSearch'])) {
            $result = $result->where(function ($query) use ($data) {
                $query->where('title', 'like', '%'.$data['textSearch'].'%')
                                ->orwhere('code', 'like', '%'.$data['textSearch'].'%');
            });
        }

        $result = $result->latest()->paginate(20);

        return $result;
    }

    public function getActiveCoupons()
    {
        $result = Coupons::where('is_active', 1)->latest()->paginate(20);

        return $result;
    }

    public function saveCoupon($data)
    {
        $coupon = new Coupons();

        $coupon->title = $data['title'];
        $coupon->title_en = $data['title_en'];
        $coupon->code = $data['code'];
        $coupon->is_active = $data['is_active'];

        $coupon->save();
        return $coupon;
    }

    public function updateCoupon($data) {
        $table = Coupons::where('id', $data['id'])->first();
        $table->title = $data['title'];
        $table->title_en = $data['title_en'];
        $table->code = $data['code'];
        $table->is_active = $data['is_active'];
        $table->save();
        return $table;
    }

    public function deleteCoupon($id)
    {
        return Coupons::where('id', $id)->delete();
    }

    public function getCouponById($id)
    {
        return Coupons::where('id', $id)->first();
    }
}
