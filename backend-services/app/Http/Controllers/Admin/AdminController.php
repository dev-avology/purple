<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function orders() {
        return view('admin.orders');
    }

    public function abandonedCheckouts() {
        return view('admin.abandoned-checkouts');
    }

    public function collections() {
        return view('admin.collections');
    }

    public function tags() {
        return view('admin.tags');
    }

    public function customers() {
        return view('admin.customers');
    }

    public function analytics() {
        return view('admin.analytics');
    }

    public function discounts() {
        return view('admin.discounts');
    }

    public function preferences() {
        return view('admin.preferences');
    }
}
