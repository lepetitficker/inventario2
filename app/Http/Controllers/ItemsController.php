<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Items;
class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $items = Items::where([
            ['name','!=', Null],[function ($query) use($request)
            {
                if(($term = $request->term))
                {
                    $query->orWhere('name','LIKE','%' . $term . '%')->get();
                }
            }]
        ])->orderBy("id","desc")->paginate(10);

        return view('items.index', compact('items'))
        ->with('i', (request()->input('page', 1) - 1) * 5);


        /*$items = Items::all();
        return view ('items.index')->with('items', $items);*/
    }
    
    public function create()
    {
        return view('items.create');
    }
  
    public function store(Request $request)
    {
        /* $input = $request->all();
        Items::create($input); */
        

        if($request->hasfile('photo'))
        {

            $item = new Items;
            $item->name = $request->input('name');
            $item->description = $request->input('description');
            $item->quantity = $request->input('quantity');


            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/items/', $filename);
            $item->photo = $filename;

            $item->save();

            return redirect('items')->with('flash_message', 'item Addedd!');  
        }
        else
            return redirect('items')->with('failed', 'Failed to save the item.');   
    }
    
    public function show($id)
    {
        $items = Items::find($id);
        return view('items.show')->with('items', $items);
    }
    
    public function edit($id)
    {
        $items = Items::find($id);
        return view('items.edit')->with('items', $items);
    }
  
    public function update(Request $request, $id)
    {
        $item = Items::find($id);

        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->quantity = $request->input('quantity');

        if($request->hasfile('photo'))
        {
            unlink('uploads/items/'.$item->photo);

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/items/', $filename);
            $item->photo = $filename;
        }

        $item->save();

        return redirect('items')->with('flash_message', 'item Updated!');

        /* $input = $request->all();
        $items->update($input); */

    }
  
    public function destroy($id)
    {
        //Items::destroy($id);

        $items = Items::find($id);
        unlink('uploads/items/'.$items->photo);
        $items::where('id', $id)->delete();

        return redirect('items')->with('flash_message', 'item deleted!');  
    }
}