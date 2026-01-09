<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemVerificationController extends Controller
{
     public function pending()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            $items = Item::where('verification_status', 'pending')->get();
        } elseif ($user->role === 'superuser') {
            // Superuser sees only items in their department
            $items = Item::where('verification_status', 'pending')
                ->whereHas('creator', function($q) use ($user) {
                    $q->where('department_id', $user->department_id);
                })
                ->get();
        } else {
            abort(403); // Regular users cannot access
        }

        return view('admin.items.pending', compact('items'));
    }

     public function approve(Item $item)
    {
        $this->authorize('verify', $item);

        $item->update([
            'verification_status' => 'approved',
            'verified_by' => auth()->id(),
        ]);

        return back()->with('success', 'Item approved successfully.');
    }
     public function reject(Item $item)
    {
        $this->authorize('verify', $item);

        $item->update([
            'verification_status' => 'rejected',
            'verified_by' => auth()->id(),
        ]);

        return back()->with('error', 'Item rejected.');
    }
}
