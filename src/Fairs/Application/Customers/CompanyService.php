<?php

namespace Aptitus\Fairs\Application\Customers;
use Aptitus\Fairs\Domain\Model\Customers\Company;
use Aptitus\Fairs\Domain\Model\Customers\CompanyRepository;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\TypeState;
use Aptitus\Fairs\Domain\Model\Fairs\Fair;
use Aptitus\Fairs\Domain\Model\Fairs\Repository\CompanyFairRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CompanyService
 *
 * @package Aptitus\Fairs\Application\Company
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class CompanyService
{
    private $repository;
    private $companyFairRepository;

    public function __construct(CompanyRepository $repository, CompanyFairRepository $companyFairRepository)
    {
        $this->repository = $repository;
        $this->companyFairRepository = $companyFairRepository;
    }

    public function removeFromFair($fairId, $companyId, $category)
    {
        $this->validateCompanyFair($fairId, $companyId, $category);
        /** @var CompanyFair $companyFair */
        $companyFair = $this->companyFairRepository->findByCompanyId($fairId, $companyId, $category);

        if (is_null($companyFair)) {
            throw new NotFoundHttpException("No se encontró la Empresa con la categoría $category en la Feria.");
        } else {
            $companyFair->setState(TypeState::INACTIVE);
            $this->companyFairRepository->update($companyFair);
        }
    }

    private function validateCompanyFair($fairId, $companyId, $category)
    {
        $companyFair = new CompanyFair();
        $fair = new Fair();
        $company = new Company();
        $fair->setId($fairId);
        $company->setId($companyId);
        $companyFair->setCategory($category);
        $companyFair->setFair($fair);
        $companyFair->setCompany($company);
    }
}
