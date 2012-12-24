<?php

namespace Fabstei\MeteoritBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request,
    Symfony\Component\Security\Core\SecurityContextInterface,
    Symfony\Bundle\FrameworkBundle\Translation\Translator;

class Builder
{
    private   $factory;
    private   $securityContext;
    protected $isLoggedIn;
    protected $isAdmin;
    protected $user;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext)
    {
        $this->factory = $factory;

        $this->securityContext = $securityContext;
        $this->isLoggedIn = $this->securityContext->isGranted('IS_AUTHENTICATED_FULLY');
        $this->isAdmin = $this->securityContext->isGranted('ROLE_ADMIN');
        $this->user = $this->securityContext->getToken()->getUser();

    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Test', array('route' => 'fos_user_profile_show'));
        $menu->addChild('Test', array('route' => 'fos_user_profile_show'));

        return $menu;
    }
    
        public function createRightSideDropdownMenu(Request $request)
    {

        $menu = $this->factory->createItem('root');
        //  $menu->setAttribute('class', 'nav navbar-text pull-right');

        if ($this->isLoggedIn) {
            $dropdown = $menu->addChild($this->user->getUsername());
            $dropdown->addChild('Profil', array('route' => 'fos_user_profile_show'));
            $dropdown->addChild('Passwort ändern', array('route' => 'fos_user_change_password'));
            $dropdown->addChild('d1', array('attributes' => array('divider' => true)));
            $dropdown->addChild('Logout', array('route'=>'fos_user_security_logout'));

        } else {
            $menu->addChild('Login', array('route' => 'fos_user_security_login'));
        }

        return $menu;
    }

}
