<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/posts')]
class PostController extends AbstractController
{
    #[Route('/', name: 'api_post_index', methods: ['GET'])]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->json($posts, 200, [], ['groups' => ['post', 'user']]);
    }

    #[Route('/', name: 'api_post_new', methods: ['POST'])]
    public function new(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $json = $request->getContent();

        try {
            $post = $serializer->deserialize($json, Post::class, 'json');

            $errors = $validator->validate($post);

            if (count($errors) > 0) {
                return $this->json($errors, 400);
            }

            $entityManager->persist($post);
            $entityManager->flush();

            return $this->json($post, 201, [], ['groups' => ['post', 'user']]);

        } catch (NotEncodableValueException $e) {
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    #[Route('/{id}', name: 'api_post_show', methods: ['GET'])]
    public function show(Post $post): Response
    {
        return $this->json($post, 200, [], ['groups' => ['post', 'user']]);
    }

    #[Route('/{id}', name: 'api_post_edit', methods: ['PUT'])]
    public function edit(Request $request, SerializerInterface $serializer, Post $post, EntityManagerInterface $entityManager): Response
    {
        $json = $request->getContent();

        $post = $serializer->deserialize($json, Post::class, 'json');

        $entityManager->persist($post);
        $entityManager->flush();

        return $this->json($post, 200, [], ['groups' => ['post', 'user']]);
    }

    #[Route('/{id}', name: 'api_post_delete', methods: ['DELETE'])]
    public function delete(Post $post, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($post);
        $entityManager->flush();

        return $this->json([
            'status' => 204,
            'message' => 'Post deleted successfully'
        ], 204);
    }
}
