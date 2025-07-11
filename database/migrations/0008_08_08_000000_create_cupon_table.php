public function up()
{
    Schema::create('coupons', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique();
        $table->decimal('discount', 5, 2); // Porcentaje: 5.00 por ejemplo
        $table->date('expires_at');
        $table->timestamps();
    });
}
