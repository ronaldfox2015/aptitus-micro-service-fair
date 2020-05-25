<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

/**
 * Class DocumentRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
interface DocumentRepository
{
    /**
     * @param Document $document
     * @return mixed
     */
    public function persist(Document $document);

    /**
     * @param CompanyFair $companyFair
     * @return mixed
     */
    public function findDocumentsByCompanyFair($companyFair);

    /**
     * @param Document $document
     * @return mixed
     */
    public function remove(Document $document);

    /**
     * @param $companyFairId
     * @return mixed
     */
    public function getDocumentCompanyFair($companyFairId);
}
