<?php
declare(strict_types=1);
namespace App\Application\Actions\JobDating;
use Psr\Http\Message\ResponseInterface as Response;
class DeleteJobDatingAction extends JobDatingAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $JobDatingId = (int) $this->resolveArg('id');
        $datas = $this->getFormData();
        /**
         * @var JobDating
         */
        $JobDating = $this->JobDatingRepository->findJobDatingOfId($JobDatingId);
        /**
         * @var bool
         */
        $response = $JobDating->delete($datas);
        $this->logger->info("JobDating of id `${JobDatingId}` deleted.");
        return $this->respondWithData(['deleted'=>$response, "JobDating"=>$JobDating]);
    }
}