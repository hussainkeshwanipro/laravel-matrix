<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF;
use Validator;
use Auth;
use Redirect;
use App\User;
use DB;
use Illuminate\Support\Facades\Session;
use URL;
use Lang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use View;
class HomeController extends Controller {

    /**
     * Default class constructor
     */
	public function __construct(){

	}

    protected $statusCode = 400;
    /**
     * Controller function for home page
     */
    public function index(Request $request) {

      return view('home');
    }

    public function Posttable(Request $request) {
       $validator = Validator::make($request->all(), [
            'row' => 'required',
            'column' => 'required'
        ]);
    
        if ($validator->fails()) 
        {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
      //print_r($request->all());die;
      $Data = [];
      $Data['row'] = $request->row;
      $Data['column'] = $request->column;
     // print_r($Data);die;
      return view('matrix',compact('Data'));
    }
    }

    public function MatrixCalculation(Request $request){
      $validator = Validator::make($request->all(), [
            'matrix00' => 'required',
            'matrix01' => 'required',
            'matrix02' => 'required',
            'matrix10' => 'required',
            'matrix11' => 'required',
            'matrix12' => 'required',
            'matrix20' => 'required',
            'matrix21' => 'required',
            'matrix22' => 'required'
        ]);
    
        if ($validator->fails()) 
        {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else
        {
      $Calc = [];
      $matrix00 = $request->matrix00;
      $matrix01 = $request->matrix01;
      $matrix02 = $request->matrix02;
      $matrix10 = $request->matrix10;
      $matrix11 = $request->matrix11;
      $matrix12 = $request->matrix12;
      $matrix20 = $request->matrix20;
      $matrix21 = $request->matrix21;
      $matrix22 = $request->matrix22;

      $Calc['sumOfFirstRow']=$matrix00+$matrix01+$matrix02;
      $Calc['sumOfFirstColumn']=$matrix00+$matrix10+$matrix20;
      $Calc['sumOfSecondColumn']=$matrix01*$matrix11*$matrix21;
      $Calc['sumOfSecondRow']=$matrix10*$matrix11*$matrix12;
      $Calc['subOfThirdRow']=$matrix20-$matrix21-$matrix22;
      $Calc['subOfThirdColumn']=$matrix02-$matrix12-$matrix22;

       return view('calculate',compact('Calc'));
     }

    }
 
}