<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Publisher\StorePublisherRequest;
use App\Http\Requests\Admin\Publisher\UpdatePublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index() {
        $publishers = Publisher::latest()->paginate(10);
        return view('admin.publishers.index', compact('publishers'));
    }

    public function create() {
        return view('admin.publishers.create');
    }

    public function store(StorePublisherRequest $request) {
        Publisher::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        ]);

        return redirect()->route('admin.publishers.index')
            ->with('msg_type', 'success')
            ->with('msg', 'Thêm nhà xuất bản thành công');
    }

    public function edit(Publisher $publisher) {
        return view('admin.publishers.edit', compact('publisher'));
    }

    public function update(Publisher $publisher, UpdatePublisherRequest $request) {
        $publisher->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug')
        ]);

        return back()
            ->with('msg_type', 'success')
            ->with('msg', 'Cập nhật nhà xuất bản thành công');
    }

    public function destroy(Publisher $publisher) {
        $publisher->delete();
        return redirect()->route('admin.publishers.index')
                        ->with('msg_type', 'success')
                        ->with('msg', 'Xóa danh mục thành công');
    }
}
