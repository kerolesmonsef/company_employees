<?php

use Illuminate\Database\Seeder;

class SeedBigData extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $data_array;
    private $chunks_NUM;
    private $table;

    public function __construct($data, $chunks_NUM, $table) {
        $this->data_array = $data;
        $this->chunks_NUM = $chunks_NUM;
        $this->table = $table;
    }

    public function run() {
        $collection = collect($this->data_array);
        $chunks = $collection->chunk($this->chunks_NUM);
        $chunks->toArray();
        foreach ($chunks as $chunk) {
            DB::table($this->table)->insert($chunk->toArray());
            // echo "*";
        }
    }

}
