<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Notifications\CompanyUpdatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404); // only used in partner-form.blade view
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //   $this->authorize('view_companies', 'App\Company');
        $company = Company::with(['category', 'products'])->find($id);
        return view('partner.company.company', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //   $this->authorize('update_companies', 'App\Company');
        $company = Company::find($id);
        $categories = Category::all();
        // $users = User::all();
        return view('partner.company.edit', compact('company', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //   $this->authorize('update_companies', 'App\Company');
        $this->validate($request, array(
            'user_id' => 'nullable',
            // 'title' => 'nullable|min:5|max:100',
            'active' => 'nullable',
            // 'slug' => 'unique:companies,title',
            'password' => 'nullable',
            'category_id' => 'nullable',
            'manager' => 'nullable',
            'telephone' => 'nullable',
            'url' => 'nullable',
            'email' => 'nullable|email',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));

        $company = Company::find($id);

        $company->user_id = Auth::user()->id;
        // $company->title = $request->input('title');
        // $company->slug = Str::slug($request->input('title'), '-');
        //  $company->meta_description = $request->input('meta_description');
        //  $company->meta_keywords = $request->input('meta_keywords');
        $company->active = $request->input('active');
        $company->category_id = $request->input('category_id');
        // $company->password = $request->input('password');
        $company->manager = $request->manager;
        $company->telephone = $request->telephone;
        $company->url = strtolower($request->url);
        $company->email = strtolower($request->email);
        // $company->image = $request->image;

        if ($request->hasFile('image')) {
            //add new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path("images/companies/" . $filename);
            $oldfile = public_path("images/companies/" . $company->image);

            if (File::exists($oldfile)) {
                File::delete($oldfile);
            }
            Image::make($image)->resize(800, 400)->save($location);
            $company->image = $filename;
        }

        $company->save();

        Artisan::call('cache:clear');

        Notification::route('mail', 'stamogiorgoufoteini@gmail.com')->notify(new CompanyUpdatedNotification($company));

        $notification = array(
            'message' => 'Company updated successfully',
            'alert-type' => 'info'
        );


        return redirect(route('companies.show', $company->id))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
