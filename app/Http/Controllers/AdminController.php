<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequest=User::where ('is_admin',0)->get();
        $revisorRequest=User::where ('is_revisor',NULL)->get();
        $writerRequest=User::where ('is_writer',NULL)->get();
        return view('admin.dashboard',compact('adminRequest', 'revisorRequest', 'writerRequest'));
    }

    public function setAdmin(User $user){
        $user->is_admin = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message',"Hai reso $user->name admin");

    //
    }
    public function setRevisor(User $user){
        $user->is_revisor = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message',"Hai reso $user->name revisore");

    //
    }
    public function setWriter(User $user){
        $user->is_writer = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message',"Hai reso $user->name redattore ");

    //
    }
    public function editTag(Request $request, Tag $tag){
        $request->validate([
            'name'=>'required|unique:tags',
        ]);
        $tag->update([
            'name'=> strtolower($request->name),
            ]);
            return redirect()->back()->with('message','Tag aggiornato');

    }
    public function deleteTag(Tag $tag){
        foreach ($tag->articles as $article){
            $article->tags()->detach($tag);
        }
        $tag->delete();
        return redirect()->back()->with('message','Tag eliminato');
    }

    public function editCategory(Request $request, Category $category){
        $request->validate([
            'name'=>'required|unique:categories',
            ]);
        $category->update([
            'name'=>strtolower($request->name),
            ]);
        return redirect()->back()->with('message','Categpria aggiornata');
    }

    public function deleteCategory(Category $category){
        $category->delete();
        return redirect()->back()->with('message','Categoria eliminata con successo');
    }
    public function storeCategory(Request $request){
        Category::create([
            'name'=> strtolower($request->name),
            
        ]);
        return redirect()->back()->with('message','Categoria creatat con successo');
    }
}