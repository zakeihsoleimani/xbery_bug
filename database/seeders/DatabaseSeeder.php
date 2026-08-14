<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventory;
use App\Models\Admin;
use App\Models\Stockplace;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $stockplaces = ['گالری', 'انبار مرکزی'];
        foreach($stockplaces as $title){
            $createdStockplace = Stockplace::create([
                'title' => $title
            ]);
            for ($i = 0; $i < 20; $i++) {
                $createdStockplace->sections()->create();
            }
        }
        $inventories = [
            [
                'title' => 'انبار مرکزی شهریور ماه',
                'stockplace' => 'انبار مرکزی',
                'admin' => '09129585457',
                'assignments' => ['09158652104', '09156690060', '09394990687']
            ],
            [
                'title' => 'گالری شهریور ماه',
                'stockplace' => 'گالری',
                'admin' => '09158652104',
                'assignments' => ['09129585457', '09158652104', '09156690060', '09394990687']
            ],
        ];

        foreach($inventories as $inventory){
            $findedAdmin = Admin::where('mobile', $inventory['admin'])->first();
            $findedStockplace = StocKplace::where('title', $inventory['stockplace'])->first();
            if(isset($findedAdmin) && isset($findedStockplace)){
                $createdInventory = Inventory::create([
                    'title' => $inventory['title'],
                    'admin_mobile' => $findedAdmin->mobile,
                    'stockplace_id' => $findedStockplace->id
                ]);
                foreach($inventory['assignments'] as $mobile){
                    $findedAssignmentAdmin = Admin::where('mobile', $mobile)->first();
                    if(isset($findedAssignmentAdmin)){
                        $createdInventory->assignments()->create([
                            'admin_mobile' => $mobile,
                            'section_id' => null
                        ]);
                    }
                }
            }
        }
    }
}
