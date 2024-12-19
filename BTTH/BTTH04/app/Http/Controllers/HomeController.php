<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Models\computer;
 class HomeController extends Controller
 {
 /**
 * Display a listing of the resource.
 */
 public function index()
 {
 $computers = Computer::all();
 
 return view("home", compact("computers"));
 }
}