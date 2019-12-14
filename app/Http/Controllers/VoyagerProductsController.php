<?php

namespace App\Http\Controllers;

use App\Product;
use App\Attribute;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class VoyagerProductsController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function show(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $isSoftDeleted = false;

        $dataTypeContent = Product::with('attributes')->findOrFail($id);

        // Replace relationships' keys for labels and create READ links if a slug is provided.
        $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'read');

        // Check permission
        $this->authorize('read', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.read';

        if (view()->exists("voyager::$slug.read")) {
            $view = "voyager::$slug.read";
        }     

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'isSoftDeleted'));
    }

    public function addAttribute(Request $request, $id) {

        $attribute = new Attribute([
            'name' => $request->name,
            'value' => $request->value,
            'product_id' => $id
        ]);
        
        $attribute->save();

        return back();
    }

    public function deleteAttribute(Request $request, $id) {

        Attribute::find($id)->delete();
        
        return back();
    }
}
