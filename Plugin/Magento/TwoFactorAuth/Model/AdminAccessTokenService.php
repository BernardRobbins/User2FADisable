<?php
declare(strict_types=1);

namespace CIM\User2FADisable\Plugin\Magento\TwoFactorAuth\Model;

use CIM\User2FADisable\Helper\Data;
use Closure;
use Magento\TwoFactorAuth\Model\AdminAccessTokenService as MagentoAdminAccessTokenService;
use Magento\Integration\Api\AdminTokenServiceInterface;

class AdminAccessTokenService
{

    public function __construct(
        Data $data,
        AdminTokenServiceInterface $adminTokenService
    ) {
        $this->data = $data;
        $this->adminTokenService = $adminTokenService;
    }

    public function aroundCreateAdminAccessToken(
        MagentoAdminAccessTokenService $subject,
        Closure $proceed,
        $username,
        $password
    ) {
        return $this->data->isAllowedBypassAPIByUsername($username) ?
            $this->adminTokenService->createAdminAccessToken($username, $password) :
            $proceed($username, $password);
    }
}
