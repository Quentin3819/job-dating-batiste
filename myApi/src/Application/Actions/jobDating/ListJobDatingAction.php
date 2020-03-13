<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use Psr\Http\Message\ResponseInterface as Response;

class ListJobDatingAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $JobDating = $this->JobDatingRepository->findAll();

        $this->logger->info("JobDating list was viewed.");

        return $this->respondWithData($JobDating);
    }
}
