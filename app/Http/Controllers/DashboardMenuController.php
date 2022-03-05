<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardAdmin.menus.index', [
            "menus" => Menu::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Pegawai::all();
        return view('dashboardAdmin.menus.create', [
            'categories' => Category::all(),
            'pegawais' => Pegawai::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);

        // Cek Path images
        // return $request->file('image')->store('menu-images');

        $validatedData = $request->validate([
            'namamenu' => 'required|max:255',
            'slug' => 'required|unique:menus',
            'harga' => 'required',
            'image' => 'required|image|file|max:10000', // Cek Ukuran Image (Satuan Kilobyte)
            'pegawai_id' => 'required',
            'category_id' => 'required',
            'deskripsi' => 'required|max:100'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('menu-images');
        }

        $validatedData['ketersediaan'] = 10;

        Menu::create($validatedData);

        return redirect('/dashboard/menus')->with('success', 'New Menu Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('dashboardAdmin.menus.show', [
            'menu' => $menu
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('dashboardAdmin.menus.edit', [
            'menu' => $menu,
            'categories' => Category::all(),
            'pegawais' => Pegawai::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'namamenu' => 'required|max:255',
            'harga' => 'required',
            'image' => 'image|file|max:1000',
            'pegawai_id' => 'required',
            'category_id' => 'required',
            'deskripsi' => 'required|max:100'
        ];

        // Check Slug (Jika Baru Pakai Yang baru) Jika lama Pakai yang lama kalo ada
        if ($request->slug != $menu->slug) {
            $rules['slug'] = 'required|unique:menus';
        }


        $validatedData = $request->validate($rules);

        // Check Image (Jika Baru Pakai Yang baru) Jika lama Pakai yang lama kalo ada
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('menu-images');
        }

        $validatedData['ketersediaan'] = 10;

        Menu::where('id', $menu->id)->update($validatedData);

        return redirect('/dashboard/menus')->with('success', 'Menu Has Been Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        if ($menu->image) {
            Storage::delete($menu->image);
        }

        Menu::destroy($menu->id);

        return redirect('/dashboard/menus')->with('success', 'Menu Has Been Deleted !');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Menu::class, 'slug', $request->namamenu);
        return response()->json(['slug' => $slug]);
    }
}
