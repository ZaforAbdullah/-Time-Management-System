<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_entries', function (Blueprint $table) {
            $table->increments('id');

            //$table->integer('project_id')->unsigned()->nullable();
            //$table->foreign('project_id', 'fk_94_project_project_id_time_entry')
            //    ->references('id')->on('projects');
                //->onDelete('cascade')
                //->onUpdate('cascade');

            $table->string('task_name')->nullable();

            // $table->integer('work_type_id')->unsigned()->nullable();
            // $table->foreign('work_type_id', 'fk_95_worktype_work_type_id_time_entry')
            //     ->references('id')->on('work_types');
                //->onDelete('cascade')
                //->onUpdate('cascade');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_96_user_user_id_time_entry')->references('id')
                ->on('users');
                //->onDelete('cascade')
                //->onUpdate('cascade');

            $table->datetime('start_time')->nullable();
            $table->datetime('end_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['deleted_at']);
        });
    }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('time_entries');
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('time_entries', function (Blueprint $table) {
        //     $table->dropForeign(['project_id']);
        //     $table->dropForeign(['work_type_id']);
        //     $table->dropForeign(['user_id']);
        //     $table->dropColumn(['project_id','work_type_id','user_id']);
        // });
        // Schema::dropIfExists('time_entries');

        //Schema::table('time_entries', function (Blueprint $table) {
        //    $table->dropForeign('posts_user_id_foreign');
        //    $table->dropForeign('posts_user_id_foreign');
        //    $table->dropForeign('posts_user_id_foreign');
        //});

        Schema::dropIfExists('time_entries');
    } 
}
