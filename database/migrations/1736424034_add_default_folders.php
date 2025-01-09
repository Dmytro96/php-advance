<?php
return new class implements \App\Commands\Contract\Migration
{
    /**
    * Run migration script
    * @return string
    */
    public function up(): string
    {
        return 'INSERT INTO folders (title) VALUES ("General"), ("Shared")';
    }
    /**
    * Rollback migration script
    * @return string
    */
    public function down(): string
    {
        return 'DELETE FROM fodlers WHERE  title IN ("General", "Shared")';
    }
};
