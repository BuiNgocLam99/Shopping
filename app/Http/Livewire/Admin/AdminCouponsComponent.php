<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    public function deleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        session()->flash('message', 'Coupon has been deleted successfully');
    }

    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component', compact('coupons'))
            ->layout('layouts.base');
    }
}
