<?php

use Illuminate\Database\Seeder;

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

//use SplFileObject as File;
use Carbon\Carbon;

class CsvImportSeeder extends Seeder
{
    //$CSV_FILENAME = Config::get('const.csv_url');

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('[Start] import data.');

        $config = new LexerConfig();
        $config->setDelimiter(",")
          ->setToCharset('UTF-8')
          ->setFromCharset('SJIS-win')
          //->setIgnoreHeaderLine(false)
          ->setFlags(SplFileObject::READ_CSV);

        $lexer = new Lexer($config);

        $interpreter = new Interpreter();
        $interpreter->addObserver(function(array $row) {

          // 登録処理
          DB::table('csvimport')->insert(
              ['large_cat_id' => $row[0],
               'middle_cat_id' => $row[1],
               'small_cat_id' => $row[2],
               'detail_cat_id' => $row[3],
               'cat_name' => $row[4],
               'ins_date' => Carbon::now(),
               'ins_id' => 'CsvImport',
               'upd_date' => NULL,
               'upd_id' => NULL,
               'del_date' => NULL,
               'del_id' => NULL
              ]
          );
        });

        $filepath = Config::get('const.csv_url');
        //$data = file_get_contents('http://www.soumu.go.jp/main_content/000420038.csv');
        //$data = fopen('http://www.soumu.go.jp/main_content/000420038.csv');
        //$data = mb_convert_encoding($data, 'UTF-8', 'SJIS-win');
        //$lines = explode("\n", $data);
        //array_pop($lines);
        //$this->command->info(array_shift($lines));
        //$data = mb_convert_variables('UTF-8','SJIS-win',$data);

        //$this->command->info('import start.');

        //$file = new File($data, 'rb');
        //$file->setFlags(File::READ_CSV);
        //$filepath = 'http://www.soumu.go.jp/main_content/000420038.csv';
        //$it = new NoRewindIterator($file);

        $this->command->info('import start.');

        $lexer->parse($filepath, $interpreter);

        $this->command->info('[End] import data.');
    }
}
