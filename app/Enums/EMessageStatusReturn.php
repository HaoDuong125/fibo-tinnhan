<?php
namespace App\Enums;

abstract class EMessageStatusReturn {

	const SUCCESS_MESSAGE = 'Cập nhật thành công !!';
    const FAIL_MESSAGE = 'Có lỗi xảy ra !!';
    const EXIST_MESSAGE = 'Đã tồn tại !!';

    const SUCCESS_CODE = 'success_msg';
    const FAIL_CODE = 'fail_msg';
    const EXIST_CODE = 'existed_msg';

    const SUCCESS = 'SUCCESS';
    const FAIL = 'FAIL';
    const EXIST = 'EXIST';
}
