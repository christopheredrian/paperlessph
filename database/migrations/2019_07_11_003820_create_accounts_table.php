<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // @todo: chris - Make account id not null later on

        DB::statement(
            "

            CREATE TABLE `accounts` (
              `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
              `subdomain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
              `owner_id` bigint(11) unsigned DEFAULT NULL,
              `created_at` timestamp NULL DEFAULT NULL,
              `updated_at` timestamp NULL DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `subdomain` (`subdomain`),
              KEY `company_name` (`company_name`),
              KEY `owner_id` (`owner_id`),
              CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

            "
        );

        DB::statement("ALTER TABLE `users` ADD `account_id` BIGINT(20)  UNSIGNED  NULL  DEFAULT NULL  AFTER `id`;");
        DB::statement("ALTER TABLE `users` ADD INDEX (`account_id`);");
        DB::statement("ALTER TABLE `users` ADD FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');

        DB::statement("ALTER TABLE `users` DROP FOREIGN KEY `users_ibfk_1`;");

    }
}
