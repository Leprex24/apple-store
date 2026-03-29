<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function featured(){
        $products = Product::where('is_featured', true)->get();

        $category = (object)[
            'name' => 'Odkryj magię Apple',
            'description' => 'Najnowsze produkty Apple w jednym miejscu'
        ];

        return view('categories.show', compact('category', 'products'));
    }

    public function show(Product $product){
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();
        return view('products.show', compact('product', 'relatedProducts'));
    }

    // to juz nie aktualne bo nie dzialalo wiec usunalem
    public function reactToReview(Request $request, \App\Models\Review $review)
    {
        $request->validate([
            'reaction_type' => 'required|in:like,dislike'
        ]);

        $userId = auth()->id();
        $reactionType = $request->reaction_type;

        $existingReaction = $review->reactions()
            ->where('user_id', $userId)
            ->first();

        if ($existingReaction) {
            if ($existingReaction->reaction === $reactionType) {
                $existingReaction->delete();
                $userReaction = null;
            } else {
                $existingReaction->update(['reaction' => $reactionType]);
                $userReaction = $reactionType;
            }
        } else {
            $review->reactions()->create([
                'user_id' => $userId,
                'reaction' => $reactionType
            ]);
            $userReaction = $reactionType;
        }

        return response()->json([
            'success' => true,
            'likes_count' => $review->reactions()->where('reaction', 'like')->count(),
            'dislikes_count' => $review->reactions()->where('reaction', 'dislike')->count(),
            'user_reaction' => $userReaction
        ]);
    }





}
