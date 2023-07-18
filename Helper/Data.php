<?php
declare(strict_types=1);

namespace CIM\User2FADisable\Helper;

use Magento\Framework\App\DeploymentConfig;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\UrlInterface;

class Data
{

    private $usernames['thub_admin'];

    public function isAllowedBypassAPIByUsername(string $userName): bool
    {
        $allowedUsernames = $this->getAllowedBypassUsernames();
        return in_array($userName, $allowedUsernames);
    }
}