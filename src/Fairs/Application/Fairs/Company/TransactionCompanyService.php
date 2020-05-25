<?php

namespace Aptitus\Fairs\Application\Fairs\Company;

use Aptitus\Common\Exception\AssertException;
use Aptitus\Common\Exception\ServerException;
use Aptitus\Fairs\Application\Fairs\Company\Data\CompanyInput;
use Doctrine\ORM\EntityManager;
use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class TransactionCompanyManagementService
 *
 * @package Aptitus\Fairs\Application\Fairs\Company
 */
class TransactionCompanyService
{
    /** @var EntityManager */
    private $entityManager;
    private $companyManagementService;


    public function __construct(
        CompanyManagementService $companyManagementService,
        EntityManager $entityManager
    ) {
        $this->companyManagementService = $companyManagementService;
        $this->entityManager = $entityManager;
    }

    public function add(CompanyInput $data)
    {
        $this->entityManager->beginTransaction();

        try {
            $this->companyManagementService->add($data);
            $this->entityManager->commit();
        } catch (AssertException $exception){
            $this->entityManager->rollback();
            throw $exception;
        } catch (BadRequestHttpException $exception) {
            $this->entityManager->rollback();
            throw $exception;
        } catch (NotFoundHttpException $exception) {
            $this->entityManager->rollback();
            throw $exception;
        } catch (Exception $exception) {
            $this->entityManager->rollback();
            throw new ServerException($exception->getMessage(), 500, $exception);
        }
    }

    public function update(CompanyInput $data)
    {
        $this->entityManager->beginTransaction();

        try {
            $this->companyManagementService->update($data);
            $this->entityManager->commit();
        } catch (AssertException $exception){
            $this->entityManager->rollback();
            throw $exception;
        } catch (BadRequestHttpException $exception) {
            $this->entityManager->rollback();
            throw $exception;
        } catch (NotFoundHttpException $exception) {
            $this->entityManager->rollback();
            throw $exception;
        } catch (Exception $exception) {
            $this->entityManager->rollback();
            throw new ServerException($exception->getMessage(), 500, $exception);
        }
    }

    public function removeFromFair($fairId, $companyId, $category)
    {
        $this->entityManager->beginTransaction();

        try {
            $this->companyManagementService->removeFromFair($fairId, $companyId, $category);
            $this->entityManager->commit();
        } catch (AssertException $exception){
            $this->entityManager->rollback();
            throw $exception;
        } catch (BadRequestHttpException $exception) {
            $this->entityManager->rollback();
            throw $exception;
        } catch (NotFoundHttpException $exception) {
            $this->entityManager->rollback();
            throw $exception;
        } catch (Exception $exception) {
            $this->entityManager->rollback();
            throw new ServerException($exception->getMessage(), 500, $exception);
        }
    }
}
