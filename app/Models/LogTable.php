<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTable extends Model
{
    use HasFactory;
    protected $table = 'log_table';

    protected $fillable = [
        'log_date',
        'row_id',
        'table_name',
        'action',
        'data_array',
        'user_browser',
        'user_platform',
        'ip_address',
        'member_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function insertLogData($table_name, $data_array, $row_id, $action)
    {

        try {
            DB::beginTransaction();
            $activity_data = [
                "row_id" => $row_id,
                "table_name" => $table_name,
                "action" => $action,
                "data_array" => json_encode($data_array),
                "user_browser" => getUserBrowserName(),
                "user_platform" => getUserPlatform(),
                "ip_address" => getUserIPAddress()
            ];

            $pptcAdmin = session()->get('pptcAdmin');
            $userId = $pptcAdmin['userId'];

            $activity_data = array_merge(
                [
                    'user_id' => $userId,
                ],
                $activity_data
            );


            $logEntry = LogTable::create($activity_data);
            $lastInsertId = $logEntry->id;
            DB::commit();
            return $lastInsertId;
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}
