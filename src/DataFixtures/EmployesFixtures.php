<?php

namespace App\DataFixtures;

use App\Entity\Employe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EmployesFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // ...
    public function load(ObjectManager $manager)
    {
        $employe = new Employe();
        $employe->setSecteur('Direction');
        $employe->setEmail('admin@delloite.com');
        $employe->setNom('admin');
        $employe->setPrenom('admin');
        $employe->setPhoto('img/myphoto.png');
        $employe->setRoles(['ROLE_ADMIN']);

        $password = $this->encoder->encodePassword($employe, 'admin123@');
        $employe->setPassword($password);

        $manager->persist($employe);
        $manager->flush();

        $employe = new Employe();
        $employe->setSecteur('Technicien');
        $employe->setEmail('technicien@delloite.com');
        $employe->setNom('technicien');
        $employe->setPrenom('technicien');
        $employe->setPhoto('img/myphoto.png');
        $employe->setRoles(['ROLE_TECHNICIEN']);

        $password = $this->encoder->encodePassword($employe, 'tech123@');
        $employe->setPassword($password);

        $manager->persist($employe);
        $manager->flush();

        $employe = new Employe();
        $employe->setSecteur('Secretaire');
        $employe->setEmail('secretaire@delloite.com');
        $employe->setNom('secretaire');
        $employe->setPrenom('secretaire');
        $employe->setPhoto('img/myphoto.png');
        $employe->setRoles(['ROLE_TECHNICIEN']);

        $password = $this->encoder->encodePassword($employe, 'secre123@');
        $employe->setPassword($password);

        $manager->persist($employe);
        $manager->flush();
    }

}

?>