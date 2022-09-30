<?php

namespace App\Controller\Admin\Tag;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TagController extends AbstractController
{
    #[Route('/admin/tag/liste', name: 'admin.tag.index')]
    public function index(TagRepository $tagRepository): Response
    {
        return $this->render('page/admin/tag/index.html.twig', array('tags' => $tagRepository->findAll()));
    }


    #[Route('/admin/tag/creation', name: 'admin.tag.create', methods: array('GET', 'POST'))]
    public function create(Request $request, TagRepository $tagRepository): Response
    {
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);

        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid() ) 
        {
            $tagRepository->add($tag, true);
            $this->addFlash('success', "Le tag a été créé avec succès.");
            return $this->redirectToRoute('admin.tag.index');
        }
        return $this->renderForm('page/admin/tag/create.html.twig', compact('form'));
    }

    #[Route('/admin/tag/{id<\d+>}/edit', name: 'admin.tag.edit', methods: array('GET', 'POST'))]
    public function edit(Tag $tag, Request $request, TagRepository $tagRepository): Response
    {
        $form = $this->createForm(TagType::class, $tag);

        $form->handleRequest($request);

        if ( $form->isSubmitted() && $form->isValid() ) 
        {
            $tagRepository->add($tag, true);
            $this->addFlash('success', "Le tag a été modifié avec succès.");
            return $this->redirectToRoute('admin.tag.index');
        }
        return $this->renderForm('page/admin/tag/edit.html.twig', compact('form'));
    }


    #[Route('/admin/tag/{id<\d+>}/delete', name: 'admin.tag.delete', methods: array('POST'))]
    public function delete(Tag $tag, Request $request, TagRepository $tagRepository)
    {
        if ( $this->isCsrfTokenValid('delete_tag_' . $tag->getId(), $request->request->get('_token')) ) 
        {
            $tagRepository->remove($tag, true);
            $this->addFlash("success", "Ce tag a été supprimé.");
        }

        return $this->redirectToRoute('admin.tag.index');
    }

}
