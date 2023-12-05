<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/projects')]
class ProjectController extends AbstractController
{
    #[Route('/', name: 'api_projects_index', methods: ['GET'])]
    public function index(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();

        return $this->json($projects, 200, [], ['groups' => ['project', 'tag', 'user']]);
    }

    #[Route('/', name: 'api_project_new', methods: ['POST'])]
    public function new(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $json = $request->getContent();

        try {
            $project = $serializer->deserialize($json, Project::class, 'json');

            $errors = $validator->validate($project);

            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }

            $entityManager->persist($project);
            $entityManager->flush();

            return $this->json($project, 201, [], ['groups' => ['project', 'tag', 'user']]);

        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    #[Route('/{id}', name: 'api_project_show', methods: ['GET'])]
    public function show(Project $project): Response
    {
        return $this->json($project, 200, [], ['groups' => ['project', 'tag', 'user']]);
    }

    #[Route('/{id}', name: 'api_project_edit', methods: ['PUT'])]
    public function edit(Request $request, SerializerInterface $serializer, Project $project, EntityManagerInterface $entityManager): Response
    {
        $json = $request->getContent();

        $project = $serializer->deserialize($json, Project::class, 'json');

        $entityManager->persist($project);
        $entityManager->flush();

        return $this->json($project, 200, [], ['groups' => ['project', 'tag', 'user']]);
    }

    #[Route('/{id}', name: 'api_project_delete', methods: ['DELETE'])]
    public function delete(Project $project, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($project);
        $entityManager->flush();

        return $this->json([
            'status' => 204,
            'message' => 'Project deleted successfully'
        ], 204);
    }
}
