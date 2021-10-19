<?php


namespace App\Controller;

use App\Entity\Department;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/departments")
 */
class DepartmentController extends AbstractController
{
    /**
     * @Route("/get-students-by-department-id/{id}/", name="get-students-by-department-id", methods={"GET"})
     * @param Department $department
     * @param StudentRepository $studentRepository
     * @param SerializerInterface $serializer
     * @return JsonResponse
     */
    public function getStudentsByDepartmentId(Department $department, StudentRepository $studentRepository, SerializerInterface $serializer) {
        $students = $studentRepository->findBy(['department' => $department]);

        $json = $serializer->serialize($students, 'json');
        return new JsonResponse($json, 200, [], true);
    }
}
