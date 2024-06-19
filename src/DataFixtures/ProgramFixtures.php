<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        [
            'title' => 'Walking Dead',
            'synopsis' => 'Des zombies envahissent la terre.',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Game of Thrones',
            'synopsis' => 'Neuf familles nobles se battent pour le contrôle des terres de Westeros.',
            'category' => 'category_Action',
        ],
        [
            'title' => '24',
            'synopsis' => 'L\'agent Jack Bauer lutte contre le terrorisme aux États-Unis.',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Arrow',
            'synopsis' => 'Un milliardaire playboy devient un justicier masqué pour sauver sa ville.',
            'category' => 'category_Action',
        ],
        [
            'title' => 'Daredevil',
            'synopsis' => 'Un avocat aveugle combat le crime la nuit en tant que super-héros Daredevil.',
            'category' => 'category_Action',
        ],
        [
            'title' => 'American Horror Story',
            'synopsis' => 'Une série d\'horreur anthologique explorant différents thèmes effrayants chaque saison.',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'Stranger Things',
            'synopsis' => 'Des enfants découvrent des événements surnaturels dans leur petite ville.',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'The Haunting of Hill House',
            'synopsis' => 'Une famille confrontée à des souvenirs effrayants de leur ancienne maison hantée.',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'Penny Dreadful',
            'synopsis' => 'Des personnages littéraires célèbres se croisent dans un Londres sombre et effrayant.',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'Bates Motel',
            'synopsis' => 'Une préquelle moderne du film "Psycho" centrée sur la jeunesse de Norman Bates.',
            'category' => 'category_Horreur',
        ],
        [
            'title' => 'The Witcher',
            'synopsis' => 'Les aventures de Geralt de Riv, un chasseur de monstres solitaire.',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'Buffy the Vampire Slayer',
            'synopsis' => 'Une adolescente dotée de pouvoirs combat les vampires et autres forces du mal.',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'Supernatural',
            'synopsis' => 'Deux frères chassent les démons et autres créatures surnaturelles.',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'His Dark Materials',
            'synopsis' => 'Une jeune fille découvre un complot sinistre et un univers parallèle.',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'Lucifer',
            'synopsis' => 'Le diable quitte l\'enfer pour ouvrir un nightclub à Los Angeles et aider la police à résoudre des crimes.',
            'category' => 'category_Fantastique',
        ],
        [
            'title' => 'Avatar: The Last Airbender',
            'synopsis' => 'Un jeune maître de l\'air doit sauver le monde en maîtrisant les quatre éléments.',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'Rick and Morty',
            'synopsis' => 'Les aventures folles d\'un scientifique alcoolique et de son petit-fils dans des dimensions parallèles.',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'Attack on Titan',
            'synopsis' => 'L\'humanité combat des géants mangeurs d\'hommes qui menacent son existence.',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'Naruto',
            'synopsis' => 'Un jeune ninja poursuit son rêve de devenir le plus grand ninja de son village.',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'BoJack Horseman',
            'synopsis' => 'Un cheval acteur déchu tente de redonner un sens à sa vie à Hollywood.',
            'category' => 'category_Animation',
        ],
        [
            'title' => 'Lost',
            'synopsis' => 'Les survivants d\'un crash aérien se retrouvent sur une île mystérieuse.',
            'category' => 'category_Aventure',
        ],
        [
            'title' => 'Doctor Who',
            'synopsis' => 'Les aventures d\'un Seigneur du Temps voyageant à travers l\'espace et le temps.',
            'category' => 'category_Aventure',
        ],
        [
            'title' => 'The Mandalorian',
            'synopsis' => 'Un chasseur de primes navigue dans les confins de la galaxie après la chute de l\'Empire.',
            'category' => 'category_Aventure',
        ],
        [
            'title' => 'The Expanse',
            'synopsis' => 'Un groupe d\'investigateurs découvre une vaste conspiration menaçant l\'humanité dans l\'espace.',
            'category' => 'category_Aventure',
        ],
        [
            'title' => 'Vikings',
            'synopsis' => 'Les exploits du légendaire Viking Ragnar Lothbrok et de ses descendants.',
            'category' => 'category_Aventure',
        ],
    ];
    
    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $programFeature) {
            $program = new Program();
            $program->setTitle($programFeature['title']);
            $program->setSynopsis($programFeature['synopsis']);
            $program->setCategory($this->getReference($programFeature['category']));
            $manager->persist($program);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
          CategoryFixtures::class,
        ];
    }
}

