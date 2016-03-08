<?php

/**
 * Project: antivir
 * User: Bagdad ( https://goo.gl/mRvZBa )
 * Date: 07.02.2016
 * Time: 16:26
 * Created by PhpStorm.
 */
require_once '../scan.php';

class ScannerTest extends PHPUnit_Framework_TestCase {

	/**
	 * Тест на наличие в файле 5 и более согласных букв
	 */
	public function testHeuristicConsonants_filename() {
		$scanner = new Scanner();

		$filename = 'xcvbpojlkj.php';

		$result = $scanner->Heuristic($filename);

		$this->assertEquals(0.5, $result);
	}

	/**
	 * Тест на наличие в файле ряда букв и чисел
	 */
	public function testHeuristicLetterAndDigits_filename() {
		$scanner = new Scanner();

		$filename = 'fuckoff05.php';

		$result = $scanner->Heuristic($filename);

		$this->assertEquals(0.5, $result);
	}

	/**
	 * Тест на наличие в файле ряда числа + 3 буквы + числа
	 */
	public function testHeuristicDigitsLettersDigits_filename() {
		$scanner = new Scanner();

		$filename = '1234fck4321.php';

		$result = $scanner->Heuristic($filename);

		$this->assertEquals(0.5, $result,"Результат: " . $result . "\r\n");
	}

	/**
	 * Тест на наличие схемы символ + 4 и более чисел
	 */
	public function testHeuristicSymbolAndFourDigits_filename() {
		$scanner = new Scanner();

		$filename = 'f32154.php';

		$result = $scanner->Heuristic($filename);

		$this->assertEquals(0.5, $result);
	}

	/**
	 * Тест на начало файла с числа
	 */
	public function testHeuristicStartWithDigits_filename() {
		$scanner = new Scanner();

		$filename = '1f32154.php';

		$result = $scanner->Heuristic($filename);

		$this->assertEquals(0.5, $result);
	}

	/**
	 * Тест на шаблон символ + 3+ числа + символ
	 */
	public function testHeuristicSymbolDigitsSymbol_filename() {
		$scanner = new Scanner();

		$filename = 'f32145g.php';

		$result = $scanner->Heuristic($filename);

		$this->assertEquals(0.5, $result);
	}
}
