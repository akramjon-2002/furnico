<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CompanyReview;
use Illuminate\Http\Request;

class CompanyReviewController extends Controller
{


    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'string|required',
            'text' => 'string|required'
        ]);
        CompanyReview::create($data);
        return redirect()->back()->with('success', 'Sizning fikringiz muvafaqqiyatli yuborildi');
    }

}

