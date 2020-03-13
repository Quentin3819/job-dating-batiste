<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\JobDating;

use App\Domain\JobDating\JobDating;
use App\Domain\JobDating\JobDatingNotFoundException;
use App\Domain\JobDating\JobDatingRepository;

class InMemoryJobDatingRepository implements JobDatingRepository
{
    /**
     * @var JobDating[]
     */
    private $JobDating;

    /**
     * InMemoryJobDatingRepository constructor.
     *
     * @param array|null $JobDating
     */
    public function __construct(array $JobDating = null)
    {
        $this->JobDating = $JobDating ?? $this->_load();
    }
    private function _load() {
        return [
            1 => new JobDating(1, 'quentin', '12/01', 'Lyon'),
            2 => new JobDating(2, 'nicolas', '12/01', 'Bourg'),
            3 => new JobDating(3, 'ruben', '13/01', 'Ferney'),
            4 => new JobDating(4, 'gabriel', '14/01', 'Lyon'),
            5 => new JobDating(5, 'Sebastien', '15/01', 'Paris'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->JobDating);
    }

    /**
     * {@inheritdoc}
     */
    public function findJobDatingOfId(int $id): JobDating
    {
        if (!isset($this->JobDating[$id])) {
            throw new JobDatingNotFoundException();
        }

        return $this->JobDating[$id];
    }
}
