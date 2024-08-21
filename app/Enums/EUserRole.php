<?php
namespace App\Enums;

abstract class EUserRole {

    const SUPPER_ADMIN = 9;
	const ADMIN = 10;
    const USER = 11;
    const ACCOUNTANT = 12;
    const CS = 13;

	public static function valueToString($status) {
		switch ($status) {
            case EUserRole::SUPPER_ADMIN:
				return 'Supper Administrator';
			case EUserRole::ADMIN:
				return 'Administrator';
			case EUserRole::USER:
				return 'User';
            case EUserRole::ACCOUNTANT:
                return 'Account';
            case EUserRole::CS:
                return 'CS';
		}
		return null;
    }

}
