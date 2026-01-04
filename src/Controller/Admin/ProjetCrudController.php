<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('titre'),
            TextField::new('accroche'),
            IntegerField::new('nbJours', 'Nombre de jours'),
            TextEditorField::new('description'),
            AssociationField::new('technologies')
                ->setFormTypeOptions([
                    'by_reference' => false,
                    'multiple' => true,
                    'expanded' => true,
                ])
                ->setRequired(false),
            AssociationField::new('picture')
                ->setFormTypeOptions([
                    'by_reference' => false,
                    'multiple' => true,
                    'expanded' => true,
                ])
                ->setRequired(false),
        ];
    }
}
