<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePostsAndPostTemplateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        
            CREATE TABLE `post_templates` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `template_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
              `template_json` json NOT NULL,
              `created_at` datetime DEFAULT NULL,
              `updated_at` datetime DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;      
        ");

        DB::statement("
            
             CREATE TABLE `posts` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `post_template_id` int(10) unsigned NOT NULL,
              `post_values` json NOT NULL,
              `created_at` datetime DEFAULT NULL,
              `updated_at` datetime DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `post_template_id` (`post_template_id`),
              KEY `created_at` (`created_at`),
              KEY `updated_at` (`updated_at`),
              CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_template_id`) REFERENCES `post_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_templates');
    }
}
