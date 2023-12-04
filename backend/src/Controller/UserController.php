<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/users')]
class UserController extends AbstractController
{
    #[Route('/', name: 'api_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();

        // $users = $serializer->serialize($users, 'json', ["groups" => "user"]);

        // return new JsonResponse($users, 200, [], true);

        return $this->json($users, 200, [], ["groups" => "user_with_tags"]);
    }

    #[Route('/', name: 'api_user_new', methods: ['POST'])]
    public function new(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $json = $request->getContent();

        try {
            $user = $serializer->deserialize($json, User::class, 'json');

            $errors = $validator->validate($user);

            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->json($user, 201, [], ["groups" => "user_with_tags"]);

        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    #[Route('/{id}', name: 'api_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->json($user, 200, [], ["groups" => "user_with_tags"]);
    }

    #[Route('/{id}', name: 'api_user_edit', methods: ['PUT'])]
    public function edit(Request $request, SerializerInterface $serializer, User $user, EntityManagerInterface $entityManager): Response
    {
        $json = $request->getContent();

        $user = $serializer->deserialize($json, User::class, 'json');

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json($user, 200, [], ["groups" => "user_with_tags"]);
    }

    #[Route('/{id}', name: 'api_user_delete', methods: ['DELETE'])]
    public function delete(User $user, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->json([
            'status' => 204,
            'message' => 'User deleted successfully'
        ], 204);
    }

    #[Route('/{id}/similar', name: 'api_user_similar', methods: ['GET'])]
    public function similar(UserRepository $userRepository, User $user): Response
    {
        $users = $userRepository->findSimilarProfiles($user);

        return $this->json($users, 200, [], ["groups" => "user_with_tags"]);
    }

    #[Route('/{id}/posts', name: 'api_user_posts', methods: ['GET'])]
    public function posts(User $user): Response
    {
        $posts = $user->getPosts();

        return $this->json($posts, 200, [], ["groups" => ["post_with_author", "user"]]);
    }
}
