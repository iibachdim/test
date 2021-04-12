<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'nama_pembeli', 'email', 'no_hp', 'mobil_id',
    ];

    public static function countMobil()
    {
        $query = " SELECT nama_mobil, COUNT(nama_mobil) as total_jual 
            FROM penjualans
            LEFT JOIN mobils on penjualans.mobil_id = mobils.id
            WHERE penjualans.created_at = CURRENT_DATE()
            GROUP BY nama_mobil 
            ORDER BY `total_jual` DESC 
            LIMIT 1 ";

        $listData = \DB::select($query);
        return $listData;
    }

    public static function countPenjualan()
    {
        $query = " SELECT COUNT(penjualans.nama_pembeli) as total_jual 
                FROM penjualans 
                WHERE penjualans.created_at = CURRENT_DATE()
                ";

        $listData = \DB::select($query);
        return $listData;
    }

    public static function countPercent()
    {

        $query = " SELECT COUNT(penjualans.nama_pembeli)
                FROM penjualans 
                WHERE penjualans.created_at = CURRENT_DATE()
                ";    

        $listData = \DB::select($query);
        return ($listData);
    }

    public static function sumTotal()
    {
        $query = " SELECT SUM(invoices.total) as total_penjualan
                FROM penjualans
                LEFT JOIN invoices ON penjualans.id = invoices.penjualan_id 
                WHERE penjualans.created_at = CURRENT_DATE()
                ";

        $listData = \DB::select($query);
        return ($listData);
    }
}
