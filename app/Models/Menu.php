<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'parent_id'];
    public static $myGlobalVar = null;

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

     /** call-3 */
    public function children()
    {
        $roleId = Menu::$myGlobalVar;
        // pre($roleId);exit;

        if($roleId==1){
            return $this->hasMany(Menu::class, 'parent_id')
            // ->leftJoin('menu_permissions', function($join) use ($roleId) {
            //     $join->on('menu_permissions.menu_id', '=', 'menus.id')
            //         ->where('menu_permissions.role_id', '=', $roleId);
    
            // })
            ->where('menus.is_active',"Y")
          //  ->where('menu_permissions.permission_id', '>', 0)    // added this condition for menu_permissions
            ->select(DB::raw('DISTINCT menus.*'))
            ->orderBy('menus.menu_srl');
        }else{
            $capexEmployee = session()->get('capexEmployee');
                      //  pre($capexEmployee['emp_type']);exit;
            return $this->hasMany(Menu::class, 'parent_id')
            // ->leftJoin('menu_permissions', function($join) use ($roleId) {
            //     $join->on('menu_permissions.menu_id', '=', 'menus.id')
            //         ->where('menu_permissions.role_id', '=', $roleId);
    
            // })
            ->where('menus.is_active',"Y")
            ->where('menus.menu_for', '=', 'Employee')  
            ->where('menus.emp_type', '=', $capexEmployee['emp_type'])    // added this condition for menu_permissions
            ->select(DB::raw('DISTINCT menus.*'))
            ->orderBy('menus.menu_srl');
        }
       

    }

    /**call-1 */
    public function scopeParents($query,$roleId)
    {
        Menu::$myGlobalVar = $roleId;
        

        if($roleId==1){
            return $query
            // ->leftJoin('menu_permissions', function($join) use ($roleId) {
            //     $join->on('menus.id', '=', 'menu_permissions.menu_id')
            //          ->where('menu_permissions.role_id', '=', $roleId);
            // })
            ->whereNull('menus.parent_id')
            ->where('menus.menu_for', '=', 'Admin') 
            //->where('menu_permissions.permission_id','>',0)
            ->where('menus.is_active','Y')
            // ->select(DB::raw('DISTINCT menus.*'))
            ->orderBy('menus.menu_srl');
        }else{
            $capexEmployee = session()->get('capexEmployee');
            return $query
            // ->leftJoin('menu_permissions', function($join) use ($roleId) {
            //     $join->on('menus.id', '=', 'menu_permissions.menu_id')
            //          ->where('menu_permissions.role_id', '=', $roleId);
            // })
            ->whereNull('menus.parent_id')
            ->where('menus.menu_for', '=', 'Employee')    // added this condition for menu_permissions
            ->where('menus.emp_type', '=', $capexEmployee['emp_type'])    // added this condition for menu_permissions
            ->where('menus.is_active','Y')
            // ->select(DB::raw('DISTINCT menus.*'))
            ->orderBy('menus.menu_srl');
        }
       


    }

     /** call-2 */
    public function childrenRecursive()
    {
        // pre(Menu::$myGlobalVar);exit;
        return $this->children()->with('childrenRecursive');
    }

    public function scopeRecursiveChildren($query, $parentIds = [])
    {
        $query->whereIn('parent_id', $parentIds);
        $childrenIds = $query->pluck('id')->toArray();

        if (!empty($childrenIds)) {
            $this->scopeRecursiveChildren($query, $childrenIds);
        }

        return $query;
    }

    public function menuPermissions()
    {
        return $this->hasMany(MenuPermission::class);
    }

    public function getUsersPermittedMenu($roleId)
    {

        $menus = DB::table('menus')
                   ->leftjoin('menu_permissions', 'menus.id', '=', 'menu_permissions.menu_id')
                   ->select('menus.id')
                   ->where('menu_permissions.role_id','=',$roleId)
                   ->whereNotNull('menus.route')
                   ->get();
        // $query = $menus->getQuery();
        // $sql = $query->toSql();
        // echo $query; exit;
        return $menus;

    }
}
