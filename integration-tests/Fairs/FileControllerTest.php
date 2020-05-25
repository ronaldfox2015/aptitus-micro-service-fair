<?php

namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\IntegrationTests\Bootstrap\Login;
use Aptitus\IntegrationTests\Common\AptTestIntegration;

/**
 * Class FileControllerTest
 *
 * @package Aptitus\IntegrationTests\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class FileControllerTest extends AptTestIntegration
{
    private function getUrl()
    {
        return sprintf('/%s/fair/upload-file', self::API_VERSION);
    }

    private function getDocumentFile()
    {
        return file_get_contents(dirname(__FILE__) . '/../src/document.docx', true);
    }

    private function getImageFile()
    {
        return file_get_contents(dirname(__FILE__) . '/../src/image.jpg', true);
    }

    public function testFieldValidation()
    {
        $params = [
            'file' => $this->getDocumentFile(),
            'folder' => 'dfasfasfadsfasdfadsfasdasfasd'
        ];
        $this->assertEquals(count($params), 2);

    }

//    public function testUploadImageFileSuccess()
//    {
//        $response = $this->request(
//            'POST',
//            $this->getUrl() . '/image',
//            [
//                'file' => $this->getImageFile(),
//                'folder' => 'totem'
//            ]
//        );
//
//        $this->assertEquals(200, $response->statusCode());
//        $this->assertEquals('Archivo subido correctamente.', $response->body()['message']);
//    }
//
//    public function testUploadFileSuccess()
//    {
//        $response = $this->request(
//            'POST',
//            $this->getUrl() . '/document',
//            [
//                'file' => $this->getDocumentFile(),
//                'folder' => 'document'
//            ]
//        );
//
//        $this->assertEquals(200, $response->statusCode());
//        $this->assertEquals('Archivo subido correctamente.', $response->body()['message']);
//    }

    public function testUploadImageFileError()
    {
        $response = $this->request(
            'POST',
            $this->getUrl() . '/image',
            [
                'file' => 'dfasfasfadsfasdfadsfasdasfasd',
                'folder' => 'totem'
            ]
        );

        $this->assertEquals(400, $response->statusCode());
    }

    public function testUploadFileError()
    {
        $response = $this->request(
            'POST',
            $this->getUrl() . '/document',
            [
                'file' => 'dfasfasfadsfasdfadsfasdasfasd',
                'folder' => 'document'
            ]
        );

        $this->assertEquals(400, $response->statusCode());
    }
}
