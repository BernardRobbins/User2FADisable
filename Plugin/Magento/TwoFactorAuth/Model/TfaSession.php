<?php
declare(strict_types = 1);

namespace CIM\User2FADisable\Plugin\Magento\TwoFactorAuth\Model;

use Magento\Authorization\Model\UserContextInterface;

class TfaSession
{

    private $allowedUserIds = [
        10, // thub_admin
    ];

	public function __construct
	(
		UserContextInterface $userContext
	) {
		$this->userContext = $userContext;
	}

    public function afterIsGranted(
        \Magento\TwoFactorAuth\Model\TfaSession $subject,
        $result
    ) {
        return (in_array($this->userContext->getUserId(), $this->allowedUserIds)) ? true : $result;

    }//end afterAfterIsGranted()


}//end class
