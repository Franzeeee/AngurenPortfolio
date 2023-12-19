<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('admin');
            $table->string('profile_name')->default('Greg Anguren');
            $table->string('email')->unique()->default('anguren@email.com');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('admin');
            $table->string('profile_image')->default('http://127.0.0.1:8000/img/profile-pic.png');
            $table->string('about_image')->default('http://127.0.0.1:8000/img/about-pic.png');
            $table->text('about')->default("Hi there, I'm Greg Anguren, a 21-year-old IT enthusiast currently pursuing a degree in Information Technology at Leyte Normal University. My fascination with technology goes beyond the classroom, as I am consistently engaged in exploring the latest advancements in web development. As a student, I am driven by a passion for problem-solving and enjoy the logical challenges that coding presents. Looking forward, I aspire to carve a niche in the web development domain. Outside of the coding realm, I find relaxation in building and customizing computers, a hobby that seamlessly blends my technical skills with a touch of creativity. I also revel in the camaraderie of online gaming, where strategic thinking and teamwork come together in a virtual environment. A voracious reader of tech blogs and a regular attendee at IT meetups, I thrive on staying connected with the latest industry trends. While I embrace the fast-paced nature of the tech world, my pet peeve lies in unreliable Wi-Fi connections, an inconvenience that disrupts my seamless digital exploration. Balancing the intricacies of IT studies with my passion for innovation, I'm on a quest to not only excel academically but also make a meaningful impact in the realm of technology.");
            $table->string('career')->default('Student and Programmer');
            $table->string('education')->default('Bachelor of Science in Information Technology');
            $table->string('best_skill')->default('HTML, CSS, JS');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
