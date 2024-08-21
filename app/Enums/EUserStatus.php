<?php
namespace App\Enums;

abstract class EUserStatus {

	const ACTIVE = 10;
    const CANCEL = 11;

	public static function valueToString($status) {
		switch ($status) {
			case self::ACTIVE:
				return 'Kích Hoạt';
			case self::CANCEL:
				return 'Ngừng Kích Hoạt';
		}
		return null;
    }
    
}