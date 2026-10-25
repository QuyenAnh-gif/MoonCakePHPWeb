<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // Hiển thị giao diện quản lý hình ảnh trang chủ & trang giới thiệu
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    // Xử lý lưu các file và dữ liệu text được tải lên
    public function update(Request $request)
    {
        // 1. Các khóa là File (Ảnh/Video)
        $fileKeys = [
            'hero_video', 'brand_story', 'vertical_video', 'vertical_cover', 'vertical_bg', 'banner_bg', 
            'set_tu_quy', 'set_luc_bao', 'set_phu_quy', 'set_4',
            'combo_bg', 'combo_2', 'combo_4', 'combo_6', 'combo_9',
            'testimonial_1_img', 'testimonial_2_img',
            'about_img_1', 'about_img_2', 'about_img_3' // 3 Ảnh trang giới thiệu
        ];

        // 2. Các khóa là Text (Tên, Nội dung đánh giá, Giới thiệu)
        $textKeys = [
            'testimonial_1_name', 'testimonial_1_content',
            'testimonial_2_name', 'testimonial_2_content',
            'about_title_1', 'about_content_1', // Nội dung 1 trang giới thiệu
            'about_title_2', 'about_content_2', // Nội dung 2 trang giới thiệu
            'about_title_3', 'about_content_3'  // Nội dung 3 trang giới thiệu
        ];

        // Lưu File
        foreach ($fileKeys as $key) {
            if ($request->hasFile($key)) {
                $oldSetting = Setting::where('key', $key)->first();
                if ($oldSetting && $oldSetting->value) {
                    Storage::disk('public')->delete($oldSetting->value);
                }
                $path = $request->file($key)->store('settings', 'public');
                Setting::updateOrCreate(['key' => $key], ['value' => $path]);
            }
        }

        // Lưu Text
        foreach ($textKeys as $key) {
            if ($request->has($key)) {
                Setting::updateOrCreate(['key' => $key], ['value' => $request->input($key)]);
            }
        }

        return back()->with('success', 'Đã cập nhật giao diện thành công!');
    }
}