<?php
namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\Fairs\Domain\Model\Fairs\Enum\StandType;

class CompanyInputValidation
{
    const API_VERSION = 'v1';
    const FAIR_EXPOAPTITUS_ID = 1;
    const COMPANY_APTITUS_ID = 1;

    private static $uniqueDocumentNumber = '20000000000';
    private static  $url = '/fairs/1/companies';

    public static function getNextDocumentNumber()
    {
        $uniqueDocumentNumber = (int)self::$uniqueDocumentNumber;
        $uniqueDocumentNumber++;
        self::$uniqueDocumentNumber = "{$uniqueDocumentNumber}";
        return self::$uniqueDocumentNumber;
    }

    public static function getCurrentDocumentNumber()
    {
        return self::$uniqueDocumentNumber;
    }

    private static function getUrl()
    {
        return sprintf('/%s/fair', self::API_VERSION);
    }

    private static function getUrlUpdateCompanyFair()
    {
        return sprintf(
            '%s/fairs/%s/companies',
            self::getUrl(),
            self::FAIR_EXPOAPTITUS_ID
        );
    }

    public static function getParamsGold()
    {
        return [
            'document_number' => '12345678971',
            'trade_name' => 'ATENTOS DEL PERU',
            'business_name' => 'TELEATENTOS DEL PERU S.A.C',
            'slug' => 'atento-peru',
            'logo' => 'RTIUR546RT546REEyutsdds42DQA.jpg',
            'category' => 'Empleo',
            'industry_id' => 1,
            'industry_name' => 'Call Center',
            'stand' => [
                'type_id' => StandType::GOLD_ID,
                'model_id' => 4,
                'amphitryon' => 3,
                'colors' => [
                    'color_1' => '#2abf2a',
                    'color_2' => '#0027ea'
                ],
                'images' => [
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_monitor'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_totem'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_banderole_1'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_banderole_2'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_top'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_counter'
                    ]
                ],
                'video' => 'https://www.youtube.com/watch?v=5o_nExedezw'
            ],
            'profile' => [
                [
                    'title' => 'Misión',
                    'description' => 'Misión de nuestra empresa en llevar a cabo...'
                ],
                [
                    'title' => 'Nuestros Productos',
                    'description' => 'Nuestros productos respetan los estándares más altos de calidad ISO 9000...'
                ]
            ],
            'social_media' => [
                [
                    'link' => 'https://www.facebook.com/zuck',
                    'name' => 'Facebook'
                ],
                [
                    'link' => 'https://www.youtube.com/watch?v=5o_nExedezw',
                    'name' => 'Youtube'
                ]
            ],
            'image_gallery' => [
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ],
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ]
            ],
            'document' => [
                [
                    'title' => 'Brochure 2017',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx'
                ],
                [
                    'title' => 'Perfil Institucional',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls'
                ]
            ]
        ];
    }

    public static function getParamsBronze()
    {
        return [
            'document_number' => '12345678972',
            'trade_name' => 'ATENTOSS22 DEL PERU',
            'business_name' => 'TELEATENTO22 DEL PERU S.A.C',
            'logo' => 'RTIUR546RT546REEyutsdds42DQA.jpg',
            'category' => 'Empleo',
            'industry_id' => 1,
            'industry_name' => 'Call Center',
            'stand' => [
                'type_id' => StandType::BRONZE_ID,
                'model_id' => 4,
                'amphitryon' => 3,
                'colors' => [
                    'color_1' => '#2abf2a',
                    'color_2' => '#0027ea'
                ],
                'images' => [
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_monitor'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_banderole_1'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_poster_1'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_top'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_counter'
                    ]
                ],
                'video' => 'https://www.youtube.com/watch?v=5o_nExedezw'
            ],
            'profile' => [
                [
                    'title' => 'Misión',
                    'description' => 'Misión de nuestra empresa en llevar a cabo...'
                ],
                [
                    'title' => 'Nuestros Productos',
                    'description' => 'Nuestros productos respetan los estándares más altos de calidad ISO 9000...'
                ]
            ],
            'social_media' => [
                [
                    'link' => 'https://www.facebook.com/zuck',
                    'name' => 'Facebook'
                ],
                [
                    'link' => 'https://www.youtube.com/watch?v=5o_nExedezw',
                    'name' => 'Youtube'
                ]
            ],
            'image_gallery' => [
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ],
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ]
            ],
            'document' => [
                [
                    'title' => 'Brochure 2017',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx'
                ],
                [
                    'title' => 'Perfil Institucional',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls'
                ]
            ]
        ];
    }

    public static function getParamsSilver()
    {
        return [
            'document_number' => '12345678973',
            'trade_name' => 'ATENTO33 DEL PERU',
            'business_name' => 'TELEATENTO33 DEL PERU S.A.C',
            'logo' => 'RTIUR546RT546REEyutsdds42DQA.jpg',
            'category' => 'Empleo',
            'industry_id' => 1,
            'industry_name' => 'Call Center',
            'stand' => [
                'type_id' => StandType::SILVER_ID,
                'model_id' => 4,
                'amphitryon' => 3,
                'colors' => [
                    'color_1' => '#2abf2a',
                    'color_2' => '#0027ea'
                ],
                'images' => [
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_monitor'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_totem'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_poster_1'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_poster_2'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_top'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_counter'
                    ]
                ],
                'video' => 'https://www.youtube.com/watch?v=5o_nExedezw'
            ],
            'profile' => [
                [
                    'title' => 'Misión',
                    'description' => 'Misión de nuestra empresa en llevar a cabo...'
                ],
                [
                    'title' => 'Nuestros Productos',
                    'description' => 'Nuestros productos respetan los estándares más altos de calidad ISO 9000...'
                ]
            ],
            'social_media' => [
                [
                    'link' => 'https://www.facebook.com/zuck',
                    'name' => 'Facebook'
                ],
                [
                    'link' => 'https://www.youtube.com/watch?v=5o_nExedezw',
                    'name' => 'Youtube'
                ]
            ],
            'image_gallery' => [
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ],
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ]
            ],
            'document' => [
                [
                    'title' => 'Brochure 2017',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx'
                ],
                [
                    'title' => 'Perfil Institucional',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls'
                ]
            ]
        ];
    }

    public static function testStandRequiredError($data)
    {
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['stand']);
        return [
            'url' => self::getUrlUpdateCompanyFair(),
            'data' => $data,
            'message' => 'los datos de stand son requeridos.',
            'code' => 404
        ];
    }

    static function testDocumentExistError($data)
    {
        $data['document_number'] = '20520603892';
        return [
            'url' => self::getUrlUpdateCompanyFair(),
            'data' => $data,
            'message' => 'La empresa ya ha sido agregada a la feria con la categoría Empleo',
            'code' => 400
        ];
    }

    static function testDocumentRequiredError($data)
    {
        unset($data['document_number']);
        return [
            'url' => self::getUrlUpdateCompanyFair(),
            'data' => $data,
            'message' => 'El campo número de documento es requerido',
            'code' => 400
        ];
    }

    static function testDocumentMaxLengthError($data)
    {
        $data['document_number'] = '1596365485685';
        return [
            'url' => self::getUrlUpdateCompanyFair(),
            'data' => $data,
            'message' => 'Ruc debe ser de 11 dígitos',
            'code' => 400
        ];
    }

    static function testCategoryRequiredError($data)
    {
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['category']);
        return [
            'url' => self::getUrlUpdateCompanyFair(),
            'data' => $data,
            'message' => 'El campo categoria es requerido',
            'code' => 400
        ];
    }

    static function testCategoryValuesError($data)
    {
        $data['document_number'] = self::getNextDocumentNumber();
        $data['category'] = 'Ninguna';
        return [
            'url' => self::getUrlUpdateCompanyFair(),
            'data' => $data,
            'message' => 'La categoria solo puedes ser Empleo o Educacion.',
            'code' => 400
        ];
    }

    static function testTradeNameRequiredError($data)
    {
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['trade_name']);
        return [
            'url' => self::getUrlUpdateCompanyFair(),
            'data' => $data,
            'message' => 'El campo nombre comercial es requerido',
            'code' => 400
        ];
    }

    static function testTradeNameMinLengthError($data)
    {
        $data['document_number'] = self::getNextDocumentNumber();
        $data['trade_name'] = 'Negocio';
        return [
            'url' => "/fairs/1/companies",
            'data' => $data,
            'message' => 'La Empresa no puede tener menos de 10 caracteres.',
            'code' => 400
        ];
    }

    static function testTradeNameMaxLengthError($data)
    {
        $data['document_number'] = self::getNextDocumentNumber();
        $data['trade_name'] = 'Empresa productora de alimentos de consumo masivo dedicada la siembra, cosecha y distribucion de todo tipo de alimentos S.A.C.';
        return [
            'url' => "/fairs/1/companies",
            'data' => $data,
            'message' => 'La Empresa no puede tener más de 100 caracteres.',
            'code' => 404
        ];
    }

    static function testLogoRequiredError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['logo']);
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El logo es requerido.',
            'code' => 404
        ];
    }

    static function testBusinessNameRequiredError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['business_name']);
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'La Razon Social es requerida.',
            'code' => 404
        ];
    }

    static function testBusinessNameMinLengthError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['business_name'] = 'Negocio';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'La Razon Social no puede tener menos de 10 caracteres.',
            'code' => 404
        ];
    }

    static function testBusinessNameMaxLengthError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['business_name'] = 'Empresa productora de alimentos de consumo masivo dedicada la siembra, cosecha y distribucion de todo tipo de alimentos.';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'La Razon Social no puede tener más de 100 caracteres.',
            'code' => 404
        ];
    }

    static function testIndustryNameRequiredError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['industry_name']);
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'La Industria es requerida.',
            'code' => 404
        ];
    }

    static function testIndustryNameMinLengthError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['industry_name'] = 'Negocio';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'La Industria no puede tener menos de 10 caracteres.',
            'code' => 404
        ];
    }

    static function testIndustryNameMaxLengthError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['industry_name'] = 'Empresa productora de alimentos de consumo masivo dedicada la siembra, cosecha y distribucion de todo tipo de alimentos.';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'La Industria no puede tener más de 100 caracteres.',
            'code' => 404
        ];
    }

    static function testSocialMediaRequiredError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['social_media']);
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'Las Redes Sociales son requeridas.',
            'code' => 404
        ];
    }

    static function testSocialMediaLinkRequiredError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['social_media']['link']);
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El link de la Red Social es requerido.',
            'code' => 404
        ];
    }

    static function testSocialMediaLinkMinLengthError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['social_media']['link'] = 'Negocio';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El link de la Red Social no puede tener menos de 10 caracteres.',
            'code' => 404
        ];
    }

    static function testSocialMediaLinkMaxLengthError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['social_media']['link'] = 'Empresa productora de alimentos de consumo masivo dedicada la siembra, cosecha y distribucion de todo tipo de alimentos.';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El link de la Red Social no puede tener más de 100 caracteres.',
            'code' => 404
        ];
    }

    static function testSocialMediaNameValuesError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['social_media']['name'] = 'Ninguna';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El nombre del a Red Social solo puedes ser Facebook, Linkedin, Twitter, Youtube, Google o Pinterest.',
            'code' => 404
        ];
    }

    static function testImageGalleryRequiredError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['image_gallery']);
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'La Galeria de Imágenes es requerida.',
            'code' => 404
        ];
    }

    static function testIndustryIdRequiredError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['industry_id']);
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El Identificador de la Industria es requerido.',
            'code' => 404
        ];
    }

    static function testIndustryIdDataTypeError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['industry_id'] = '1a';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El Identificador de la Industria debe ser entero',
            'code' => 404
        ];
    }

    static function testProfileRequiredError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        unset($data['profile']);
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El Perfil Institucional es requerido.',
            'code' => 404
        ];
    }

    static function testProfileTitleMinLengthError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['profile']['title'] = 'Ne';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El Título del Perfil Institucional no puede tener menos de 3 caracteres.',
            'code' => 404
        ];
    }

    static function testProfileTitleMaxLengthError($data){
        $data['document_number'] = self::getNextDocumentNumber();
        $data['profile']['title'] = 'Empresa productora de alimentos de consumo masivo dedicada la siembra, cosecha y distribucion de todo tipo de alimentos.';
        return [
            'url' => self::getUrl(),
            'data' => $data,
            'message' => 'El Título del Perfil Institucional no puede tener más de 50 caracteres.',
            'code' => 404
        ];
    }

}