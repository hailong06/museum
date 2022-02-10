<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class SearchController extends Controller
{
    function index()
    {
     return view('user.home.search');
    }
    function action(Request $request){
        if($request->ajax()){
            $output = '';
            $total_row = '';
            $query = $request->get('query');
            if($query != ''){
                $data = Blog::orderBy('updated_at', 'desc')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('sumary', 'like', '%'.$query.'%')
                    ->orWhere('content', 'like', '%'.$query.'%')
                    ->limit(5)
                    ->get();
                $total_row = $data->count();
                if($total_row > 0){
                foreach($data as $blogs){
                    $output .= "
                        <tr>
                            <a href=''><td>'.$blogs->title.'</td></a>
                            <td>'.$blogs->sumary.'</td>
                            <td>'.$blogs->content.'</td>
                        </tr>
                        ";
                    }
                }else{
                    $output = '
                    <tr>
                        <td align="center" colspan="5">No Data Found</td>
                    </tr>
                    ';
                }
            }

            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );
            echo json_encode($data);
        }
    }
}
