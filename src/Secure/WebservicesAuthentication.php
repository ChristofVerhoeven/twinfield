<?php

namespace PhpTwinfield\Secure;

use PhpTwinfield\Enums\Services;
use PhpTwinfield\Exception;
use PhpTwinfield\Services\BaseService;
use PhpTwinfield\Services\SessionService;

class WebservicesAuthentication extends AuthenticatedConnection
{
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $organization;

    /**
     * The sessionID for the successful login
     *
     * @access private
     * @var string
     */
    private $sessionID;

    /**
     * The server cluster used for future XML
     * requests with the new SoapClient
     *
     * @access private
     * @var string
     */
    private $cluster = 'https://accounting.twinfield.com';

    public function __construct(string $username, string $password, string $organization)
    {
        $this->username = $username;
        $this->password = $password;
        $this->organization = $organization;
    }

    /**
     * Login using username / password / organization combo.
     *
     * @throws Exception
     */
    protected function login()
    {
        if ($this->sessionID) {
            return;
        }

        $sessionService = new SessionService();

        list($this->sessionID, $this->cluster) = $sessionService->getSessionIdAndCluster($this->username, $this->password, $this->organization);
    }

    protected function getSoapHeaders()
    {
        return new \SoapHeader(
            'http://www.twinfield.com/',
            'Header',
            ['SessionID' => $this->sessionID]
        );
    }

    protected function getCluster()
    {
        return $this->cluster;
    }

    public function resetClient(Services $service)
    {
        $this->sessionID = NULL;

        parent::resetClient($service);
    }

    protected function resetAllClients()
    {
        $this->sessionID = NULL;

        parent::resetAllClients();
    }
}
