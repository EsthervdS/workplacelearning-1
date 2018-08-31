<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTimeslotTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('timeslot', function (Blueprint $table): void {
            $table->integer('wplp_id')->nullable();
            $table->foreign('wplp_id', 'fk_Timeslot_Wplp1')->references('wplp_id')->on('workplacelearningperiod')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timeslot', function (Blueprint $table): void {
            $table->dropForeign('fk_Timeslot_Wplp1');
            $table->dropColumn('wplp_id');
        });
    }
}
