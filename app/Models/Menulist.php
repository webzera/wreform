<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Page;

class Menulist extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'user_id',
        'menu_name',
        'menu_type',
        'menu_weight',
        'parent_id',
        'menu_level'
    ];

    static public function getParentname($parentid)
    {
    	return Menulist::where('page_id', $parentid)->first()['menu_name'];
    }
    static public function isthisparentmenu($pageid)
    {
    	$ifhave=Menulist::where('parent_id', $pageid)->count();
    	if($ifhave)
    	return 1;
    	else
    	return 0;
    }
    static public function getpageslug($pageid)
    {
    	return Page::where('id', $pageid)->first()['slug'];
    }
}
