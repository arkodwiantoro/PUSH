<?php
  
namespace App\Http\Controllers;
  
use App\Models\post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class PostController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return response()
    //  */
    public function index(): View
    {
        $posts = post::latest()->paginate(5);
        
        return view('Posts\index',compact('posts'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('Posts\create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'role_user' => 'required',
            'jadwal_kerja' => 'required',
            'gaji' => 'required',
        ]);
    
        $input = $request->all();
    
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'images/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }
      
        post::create($input);
       
        return redirect()->route('post.index')
                        ->with('Success!','post Created Successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(post $post): View
    {
        return view('Posts\show',compact('post'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post): View
    {
        return view('Posts\edit',compact('post'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post): RedirectResponse
    {
        $request->validate([
            'id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'role_user' => 'required',
            'jadwal_kerja' => 'required',
            'gaji' => 'required',
        ]);
    
        $input = $request->all();
    
        // if ($image = $request->file('image')) {
        //     $destinationPath = 'images/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }else{
        //     unset($input['image']);
        // }
            
        $post->update($input);
      
        return redirect()->route('post.index')
                        ->with('Success!','post Updated Successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post): RedirectResponse
    {
        $post->delete();
         
        return redirect()->route('post.index')
                        ->with('Success!','post Deleted Successfully');
    }
}