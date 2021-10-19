<?php

namespace App\DataFixtures;

use App\Entity\Department;
use App\Entity\Student;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user
            ->setName('admin')
            ->setEmail('admin@gmail.com')
            ->setPassword('admin');

        $manager->persist($user);

        $department = new Department();

        $department
            ->setName('Loiret')
            ->setCapacity(10);

        $manager->persist($department);

        $student = new Student();

        $student
            ->setDepartment($department)
            ->setFirstName('Student 1')
            ->setLastName('LastName')
            ->setNumEtud(10);

        $manager->persist($student);

        $student2 = new Student();

        $student2
            ->setDepartment($department)
            ->setFirstName('Student 2')
            ->setLastName('LastName')
            ->setNumEtud(10);

        $manager->persist($student2);

        $manager->flush();
    }
}
