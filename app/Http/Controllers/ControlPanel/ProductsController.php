<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $draw = $request->get('draw');
            $start = $request->get("start");
            $rowperpage = $request->get("length"); // Rows display per page
            $search_arr = $request->get('search');
            $searchValue = $search_arr['value']; // Search value
            $totalRecords = Product::select('count(*) as allcount')->count();
            $totalRecordswithFilter = Product::select('count(*) as allcount')
                                                ->where('name', 'like', '%' . $searchValue . '%')
                                                ->orWhere('price', 'like', '%' . $searchValue . '%')
                                                ->count();

            $products = Product::select('products.*')
                ->where('name', 'like', '%' . $searchValue . '%')
                ->orWhere('price', 'like', '%' . $searchValue . '%')
                ->skip($start)
                ->take($rowperpage)
                ->orderBy('products.id', 'desc')
                ->get();


            $records = [];

            foreach($products as $item)
            {
                $records[] = [
                       'record_select' =>view('control-panel.products.datatable.record',[ 'item' => $item ])->render(),
                       'image' => '<img src="'. asset('storage/'.$item->image) .'" width="80">',
                       'name' => $item->name,
                       'price' => $item->price,
                       'actions' => view('control-panel.products.datatable.buttons',[ 'item' => $item ])->render() ,
                    ];
            }

            $response = [
                        "draw" => intval($draw),
                        "iTotalRecords" => $totalRecords,
                        "iTotalDisplayRecords" => $totalRecordswithFilter,
                        "aaData" => $records
                    ];

            return response()->json($response);

        }

        return view('control-panel.products.index');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:png,jpg',
            'description' => 'required|string',
            'short_description' =>'required|string',
            'price' => 'required|numeric',
        ]);

        $image = null;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image')->store('products','public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'short_description' =>$request->short_description,
            'price' => $request->price,
            'image' => $image,
        ]);

        return redirect()->route('products.index')->with('success','تم اضافة المنتج بنجاح');

    }

    public function update(Request $request, Product $product)
    {
        # code...
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|mimes:png,jpg',
            'description' => 'required|string',
            'short_description' =>'required|string',
            'price' => 'required|numeric',
        ]);

        $image = $product->image;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::disk('public')->delete($image);
            $image = $request->file('image')->store('products','public');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'short_description' =>$request->short_description,
            'price' => $request->price,
            'image' => $image,
        ]);

        return redirect()->route('products.index')->with('success','تم التعديل على المنتج بنجاح');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete($product->image);
        return redirect()->route('products.index')->with('success',__('تم حذف المنتج بنجاح'));
    }

    public function bulkDelete()
    {
        // dd(json_decode(request()->record_ids));
        if(count(json_decode(request()->record_ids)) != 0){
            foreach (json_decode(request()->record_ids) as $recordId) {
                $product = Product::FindOrFail($recordId);
                $this->delete($product);
            }//end of for each
        }else{
            return redirect()->route('products.index')->with('error',__('الرجاء التحديد قبل الحذف'));
        }

        return redirect()->route('products.index')->with('success',__('تم حذف المحددة بنجاح'));
    }// end of bulkDelete

    private function delete(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete($product->image);
    }
}
