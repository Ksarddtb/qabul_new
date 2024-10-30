<?php

use App\Models\ApplicationType;
use App\Models\eduForm;
use App\Models\eduLang;
use App\Models\PaymentType;
use App\Models\Referrals;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()
                ->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('phone',14);
            $table->string('phone2',14)->nullable();
            $table->string('p_seria',2)->nullable();
            $table->string('p_number',8)->nullable();
            $table->string('p_pinfl',14)->nullable();
            $table->string('full_name',150);
            $table->string('first_name',100);
            $table->string('surname',100);
            $table->string('family_name',100)->nullable();
            $table->enum('sex',['men','woman','not selected'])->default('not selected');
            $table->unsignedTinyInteger('age')->nullable();
            $table->foreignIdFor(eduLang::class)->nullable()
                ->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->enum('edu_type',['bakalavr','magistr','ordinatura','doktorantura'])->default('bakalavr');
            $table->foreignIdFor(eduForm::class)->nullable()
                ->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignIdFor(Speciality::class)->nullable()
                ->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignIdFor(ApplicationType::class)->nullable()
                ->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignIdFor(PaymentType::class)->nullable()
                ->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignIdFor(Referrals::class)->nullable()
                ->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->unsignedDecimal('payment_amount',16,2)->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('status_test')->default(false);
            $table->unsignedInteger('study_year')->default(false);
            $table->unsignedInteger('studying_year')->default(false);
            $table->unsignedInteger('qungiroq')->default(false);
            $table->unsignedInteger('contract period')->default(10);
//            $table->('contract period')->default(10);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
