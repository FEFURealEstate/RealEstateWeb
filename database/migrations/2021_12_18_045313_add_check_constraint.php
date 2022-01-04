<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddCheckConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(/** @lang PostgreSQL */ <<<CLIENTS
            ALTER TABLE person_set__clients
                ADD CONSTRAINT chk_contact_data CHECK (
                    email IS NOT NULL OR phone IS NOT NULL
                );
            CLIENTS
        );

        DB::unprepared(/** @lang PostgreSQL */ <<<AGENTS
            CREATE OR REPLACE FUNCTION check_full_name__agents()
            RETURNS trigger AS $$
                DECLARE
                    user_data record;
                BEGIN
                    SELECT first_name, middle_name, last_name
                        INTO user_data
                        FROM person_sets
                        WHERE person_sets.id = NEW.id;
                    IF user_data.first_name IS NULL OR
                       user_data.middle_name IS NULL OR
                       user_data.last_name IS NULL THEN
                           RAISE EXCEPTION 'full name must be not null';
                    END IF;
                RETURN NEW;
                END
            $$ LANGUAGE plpgsql;

            CREATE TRIGGER check_full_name__agents
                BEFORE INSERT OR UPDATE
                ON person_set__agents
                FOR EACH ROW
                EXECUTE FUNCTION check_full_name__agents();

            ALTER TABLE person_set__agents
                ADD CONSTRAINT chk_deal_share_between CHECK (
                    deal_share BETWEEN 0 AND 100
                );
            AGENTS
        );

        DB::unprepared(/** @lang PostgreSQL */ <<<REAL_ESTATE
            ALTER TABLE real_estate_sets
                ADD CONSTRAINT chk_real_estate_set_coordinate CHECK (
                    coordinate_latitude BETWEEN -90 AND 90
                    AND
                    coordinate_longitude BETWEEN 0 AND 180
                );
            REAL_ESTATE
        );

        DB::unprepared(/** @lang PostgreSQL */ <<<SUPPLY
            ALTER TABLE supply_sets
                ADD CONSTRAINT chk_supply_price CHECK (
                    price >= 0
                );
            SUPPLY
        );

        DB::unprepared(/** @lang PostgreSQL */ <<<DEMAND
            ALTER TABLE demand_sets
                ADD CONSTRAINT chk_demand_min_price CHECK (
                    min_price >= 0
                ),
                ADD CONSTRAINT chk_demand_max_price CHECK (
                    max_price >= 0
                );
            DEMAND
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared(/** @lang PostgreSQL */ <<<CLIENTS
            ALTER TABLE person_set__clients
                DROP CONSTRAINT chk_contact_data;
            CLIENTS
        );
        DB::unprepared(/** @lang PostgreSQL */ <<<AGENTS
            DROP TRIGGER check_full_name__agents
                ON person_set__agents;

            DROP FUNCTION check_full_name__agents;

            ALTER TABLE person_set__agents
                DROP CONSTRAINT chk_deal_share_between;
            AGENTS
        );
        DB::unprepared(/** @lang PostgreSQL */ <<<REAL_ESTATE
            ALTER TABLE real_estate_sets
                DROP CONSTRAINT chk_real_estate_set_coordinate;
            REAL_ESTATE
        );
        DB::unprepared(/** @lang PostgreSQL */ <<<SUPPLY
            ALTER TABLE supply_sets
                DROP CONSTRAINT chk_supply_price;
            SUPPLY
        );
        DB::unprepared(/** @lang PostgreSQL */ <<<DEMAND
            ALTER TABLE demand_sets
                DROP CONSTRAINT chk_demand_min_price,
                DROP CONSTRAINT chk_demand_max_price;
            DEMAND
        );
    }
}
