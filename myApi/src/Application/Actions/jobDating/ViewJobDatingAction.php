<?php
declare(strict_types=1);

namespace App\Application\Actions\JobDating;

use Psr\Http\Message\ResponseInterface as Response;

class ViewJobDatingAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $JobDatingId = (int) $this->resolveArg('id');
        $JobDating = $this->JobDatingRepository->findJobDatingOfId($JobDatingId);

        $this->logger->info("JobDating of id `${JobDatingId}` was viewed.");

        return $this->respondWithData($JobDating);
    }
}
