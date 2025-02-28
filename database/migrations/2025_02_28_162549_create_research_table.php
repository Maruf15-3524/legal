<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 return new class extends Migration {
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->string('research_head');
            $table->string('journal_name');
            $table->date('publication_date');
            $table->text('extra_info')->nullable();
            $table->text('uplad_head_image_lo')->nullable();
            $table->string('pdf_file')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('research');
    }
};
