<?php
namespace App\Enums;

abstract class EError {
	const SUCCESS = 0; // Lưu Thành Công
    const FAIL = 1; // Lưu Lỗi
    const EXIST = 2; // Đã Tồn Tại
}