<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::latest()->get();

        return response()->json($tags,Response::HTTP_OK);
    }

    public function store(StoreTagRequest $request)
    {
        $input = $request->validated();
        $tag = Tag::create([
            'name' => $input['name']
        ]);

        return response()->json($tag,Response::HTTP_CREATED);
    }

    public function destroy(Tag $tag)
    {
        $deleted = $tag->delete();

        if (!$deleted) {
            return response()->json(['error' => 'Tag Deletion Failed']);
        }

        return response()->json(['success' => 'Tag Deleted Successfully']);
    }
}
